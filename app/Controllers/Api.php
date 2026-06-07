<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\ProviderModel;
use App\Models\TransaksiModel;
use App\Models\MetodeModel;

class Api extends BaseController
{
    use ResponseTrait;

    protected $userModel;
    protected $transaksiModel;
    protected $metodeModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->transaksiModel = new TransaksiModel();
        $this->metodeModel = new MetodeModel();
    }

    /**
     * POST /merchant
     * Informasi akun merchant (dengan autentikasi)
     */
    public function ApiMerchant()
    {
        $requestData = json_decode($this->request->getBody(), true) ?: $this->request->getPost();
        $apiId = $requestData['api_id'] ?? null;
        $apiKey = $requestData['api_key'] ?? null;
        $signature = $requestData['signature'] ?? null;
        $ipAddress = $this->request->getIPAddress();

        if (empty($apiId) || empty($apiKey)) {
            $response = [
                'status' => false,
                'msg'    => 'API ID atau API KEY tidak ditemukan',
            ];
            return $this->respond($response, 400);
        }

        $user = $this->userModel->findUserByApiKey($apiId, $apiKey);

        if (!$user) {
            $response = [
                'status' => false,
                'msg'    => 'Pengguna dengan kredensial API yang diberikan tidak ditemukan',
            ];
            return $this->respond($response, 401); // Unauthorized
        }

        $expectedSignature = md5($apiId . $user['api_key']);
        if ($signature !== $expectedSignature) {
            $response = [
                'status' => false,
                'msg'    => 'Signature Tidak Valid. Silakan periksa kredensial API Anda',
            ];
            return $this->respond($response, 401); // Unauthorized
        }

        if (!empty($user['whitelist_ip'])) {
            $whitelist = array_map('trim', explode(',', $user['whitelist_ip']));
            if (!in_array($ipAddress, $whitelist)) {
                $response = [
                    'status' => false,
                    'msg'    => "IP $ipAddress tidak ada dalam whitelist",
                ];
                return $this->respond($response, 403); // Forbidden
            }
        }

        return $this->respond([
            'status' => true,
            'msg'    => 'berhasil mendapatkan data merchat',
            'data'   => [
                'username' => $user['username'],
                'balance'  => $user['balance'],
            ],
        ]);
    }

    /**
     * POST /payment
     * Membuat transaksi deposit
     */

    public function ApiPayment()
    {
        $requestData = json_decode($this->request->getBody(), true) ?: $this->request->getPost();

        $apiId     = $requestData['api_id'] ?? null;
        $apiKey    = $requestData['api_key'] ?? null;
        $signature = $requestData['signature'] ?? null;
        $reffId    = $requestData['reference_id'] ?? null;
        $kodeBank  = $requestData['bank_code'] ?? null;
        $nominal   = (int) ($requestData['amount'] ?? 0);
        $customerName  = $requestData['customer_name'] ?? null;
        $customerEmail = $requestData['customer_email'] ?? null;
        $customerPhone = $requestData['customer_phone'] ?? null;
        $description   = $requestData['item_details'] ?? null;

        /* ======================================================
     * 1. VALIDASI INPUT
     * ====================================================== */
        if (!$apiId || !$apiKey || !$reffId || !$kodeBank || $nominal < 1000) {
            return $this->respond([
                'success' => false,
                'msg' => 'Parameter atau data tidak lengkap. Pastikan api_id, api_key, reference_id, bank_code, dan amount (min 1000) diisi.'
            ], 400);
        }

        /* ======================================================
     * 2. VALIDASI MERCHANT
     * ====================================================== */
        $user = $this->userModel->findUserByApiKey($apiId, $apiKey);
        if (!$user) {
            return $this->respond([
                'success' => false,
                'msg' => 'API credential tidak valid'
            ], 401);
        }

        /* ======================================================
     * 3. VALIDASI SIGNATURE MERCHANT
     * md5(API_ID + API_KEY + REFF_ID)
     * ====================================================== */
        $expectedSignature = md5($apiId . $user['api_key'] . $reffId);
        if ($signature !== $expectedSignature) {
            return $this->respond([
                'success' => false,
                'msg' => 'Signature tidak valid'
            ], 401);
        }

        /* ======================================================
     * 4. VALIDASI METODE PEMBAYARAN
     * ====================================================== */
        $metode = $this->metodeModel->where('kode', $kodeBank)->first();
        if (!$metode) {
            return $this->respond([
                'success' => false,
                'msg' => 'Metode pembayaran tidak ditemukan'
            ], 404);
        }

        /* ======================================================
     * 5. HITUNG MARKUP (PAJAK_PERCENT)
     * ====================================================== */
        $pajakPersen  = (float) ($metode['pajak_persen'] ?? 0);
        $feeMarkup    = (int) ceil($nominal * $pajakPersen / 100);


        // ✅ NOMINAL YANG DIKIRIM KE TOPUPKU
        $nominalKeTopupku = $nominal + $feeMarkup;

        /* ======================================================
     * 6. AMBIL PROVIDER TOPUPKU
     * ====================================================== */
        $provider = (new \App\Models\ProviderModel())
            ->where('kode', 'topupku')
            ->first();

        if (!$provider) {
            return $this->respond([
                'success' => false,
                'msg' => 'Provider Topupku tidak tersedia'
            ], 500);
        }

        /* ======================================================
     * 7. SIGNATURE TOPUPKU
     * md5(API_ID + API_KEY + REFF_ID)
     * ====================================================== */
        $providerSignature = md5(
            $provider['api_id'] .
                $provider['api_key'] .
                $reffId
        );

        /* ======================================================
     * REFERENCE ID UNIK
     * ====================================================== */
        $trxId = 'TRX' . time() . rand(100, 999);

        /* ======================================================
     * 8. CALL TOPUPKU API
     * ====================================================== */
        $payload = [
            'api_id'    => $provider['api_id'],
            'api_key'   => $provider['api_key'],
            'reff_id'   => $reffId,
            'kode_bank' => $kodeBank,
            'nominal'   => $nominalKeTopupku,
            'signature' => $providerSignature,
        ];

        $ch = curl_init('https://topupku.com/api/payment');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($payload),
            CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
            CURLOPT_TIMEOUT        => 30,
        ]);

        $result = curl_exec($ch);
        curl_close($ch);

        $topupku = json_decode($result, true);

        if (!$topupku || !isset($topupku['success']) || !$topupku['success']) {
            return $this->respond([
                'success' => false,
                'msg' => 'Gagal membuat pembayaran ke provider',
                'raw' => $topupku
            ], 502);
        }

        /* ======================================================
     * 9. DATA DARI PROVIDER
     * ====================================================== */
        $totalBayar = (int) ($topupku['data']['total_bayar']);

        /* ======================================================
     * 10. SIMPAN TRANSAKSI (PENDING)
     * ====================================================== */
        $this->transaksiModel->insert([
            'transaction_id'  => $trxId,
            'trx_id'       => $topupku['data']['trx_id'],
            'user_id'      => $user['id'],
            'username'     => $user['username'],
            'reference_id' => $reffId,
            'amount'       => $nominal,
            'fee'          => $feeMarkup,
            'nominal_to_topupku' => $nominalKeTopupku,
            'total'        => $totalBayar,
            'diterima'     => $topupku['data']['total_diterima'],
            'payment_method' => $kodeBank,
            'payment_code'   => $topupku['data']['kode_pembayaran'],
            'kategori'       => $metode['kategori'],
            'bank_name'      => $metode['nama'],
            'customer_name'  => $customerName,
            'customer_email' => $customerEmail,
            'customer_phone' => $customerPhone,
            'item_details'   => $description,
            'payment_guide'  => $metode['payment_guide'],
            'status'         => 'pending',
        ]);

        /* ======================================================
     * 11. RETURN RESPONSE KE CLIENT
     * ====================================================== */
        return $this->respond([
            'success' => true,
            'msg' => 'Transaksi berhasil dibuat',
            'data' => [
                'reference_id'   => $reffId,
                'transaction_id'  => $trxId,
                'amount'         => $nominal,
                'fee'            => $feeMarkup,
                'total_payment'  => $totalBayar,
                'payment_method' => $kodeBank,
                'payment_code'  => $topupku['data']['kode_pembayaran'],
                'status'        => 'pending',
            ]
        ]);
    }


    /**
     * POST /status
     * Cek Status Transaksi
     */
    public function ApiStatus()
    {
        $requestData = json_decode($this->request->getBody(), true) ?: $this->request->getPost();
        $apiId     = $requestData['api_id'] ?? null;
        $apiKey    = $requestData['api_key'] ?? null;
        $signature = $requestData['signature'] ?? null;
        $trxId     = $requestData['reference_id'] ?? null;

        if (empty($apiId) || empty($apiKey) || empty($trxId)) {
            return $this->respond([
                'success' => false,
                'msg'     => 'Parameter tidak lengkap: api_id, api_key, reference_id wajib diisi.',
                'data'    => null
            ], 400);
        }

        $user = $this->userModel->findUserByApiKey($apiId, $apiKey);
        if (!$user) {
            return $this->respond([
                'success' => false,
                'msg'     => 'Kredensial API tidak valid.',
                'data'    => null
            ], 401);
        }

        $expectedSignature = md5($apiId . $user['api_key'] . $trxId);
        if ($signature !== $expectedSignature) {
            return $this->respond([
                'success' => false,
                'msg'     => 'Signature tidak valid.',
                'data'    => null
            ], 401);
        }

        $transaksi = $this->transaksiModel->where('reference_id', $trxId)->where('user_id', $user['id'])->first();
        if (!$transaksi) {
            return $this->respond([
                'success' => false,
                'msg'     => 'Transaksi tidak ditemukan',
                'data'    => null
            ], 404);
        }

        return $this->respond([
            'success' => true,
            'msg'     => 'Detail Transaksi Berhasil Ditemukan.',
            'data'    => [
                'transaction_id'     => $transaksi['transaction_id'],
                'reference_id'    => $transaksi['reference_id'],
                'status'     => $transaksi['status'],
                'amount'     => $transaksi['amount'],
                'created_at' => $transaksi['created_at'],
            ]
        ]);
    }
}
