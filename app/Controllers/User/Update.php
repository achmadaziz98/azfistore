<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Update extends BaseController
{
    public function regenerateKey()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/masuk');
        }

        $userModel = new UserModel();

        // Generate Secure Keys
        $newApiId  = bin2hex(random_bytes(16));
        $newApiKey = bin2hex(random_bytes(32));

        $userModel->update(session('user_id'), [
            'api_id'  => $newApiId,
            'api_key' => $newApiKey
        ]);

        return redirect()->back()->with('success', 'API Key berhasil diperbarui.');
    }

    public function updateMerchant()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/masuk');
        }

        $userModel = new UserModel();

        $data = [
            'callback_url' => $this->request->getPost('callback_url'),
        ];

        $userModel->update(session('user_id'), $data);

        return redirect()->back()->with('success', 'Pengaturan merchant berhasil disimpan.');
    }

    public function updateProfil()
    {
        // === WAJIB LOGIN ===
        if (! session()->get('isLogin')) {
            return redirect()->to('/masuk');
        }

        $userId = session()->get('user_id');

        $userModel = new UserModel();
        $user      = $userModel->find($userId);

        if (! $user) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        // === AMBIL INPUT ===
        $nama         = trim($this->request->getPost('nama'));
        $whatsapp     = trim($this->request->getPost('whatsapp'));
        $whitelist_ip = trim($this->request->getPost('whitelist_ip'));

        // === VALIDASI SEDERHANA ===
        if ($nama === '') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Nama tidak boleh kosong');
        }

        if ($whatsapp && ! preg_match('/^[0-9+]+$/', $whatsapp)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Nomor WhatsApp tidak valid');
        }

        // === UPDATE DATA ===
        $userModel->update($userId, [
            'nama'         => $nama,
            'whatsapp'     => $whatsapp,
            'whitelist_ip' => $whitelist_ip,
            'date_update'  => date('Y-m-d H:i:s'),
        ]);

        // === UPDATE SESSION (BIAR LANGSUNG KEPAKAI) ===
        session()->set([
            'nama'     => $nama,
            'whatsapp' => $whatsapp,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    public function updatePassword()
    {
        // === WAJIB LOGIN ===
        if (! session()->get('isLogin')) {
            return redirect()->to('/masuk');
        }

        $userId = session()->get('user_id');

        $password        = (string) $this->request->getPost('password');
        $passwordConfirm = (string) $this->request->getPost('password_confirm');

        // === VALIDASI DASAR ===
        if ($password === '' || $passwordConfirm === '') {
            return redirect()->back()
                ->with('error', 'Password dan konfirmasi wajib diisi');
        }

        if ($password !== $passwordConfirm) {
            return redirect()->back()
                ->with('error', 'Konfirmasi password tidak cocok');
        }

        if (strlen($password) < 8) {
            return redirect()->back()
                ->with('error', 'Password minimal 8 karakter');
        }

        $userModel = new UserModel();
        $user      = $userModel->find($userId);

        if (! $user) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        // === UPDATE PASSWORD ===
        $userModel->update($userId, [
            'password'    => password_hash($password, PASSWORD_DEFAULT),
            'date_update' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Password berhasil diperbarui');
    }
}
