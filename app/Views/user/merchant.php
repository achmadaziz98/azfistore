<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<div class="p-4 md:p-8 flex-1 w-full max-w-7xl mx-auto space-y-8" x-data="{
    showSecret: false,
    showRegenerateModal: false,
    copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert('Berhasil disalin ke clipboard!');
        }).catch(err => {
            console.error('Gagal menyalin: ', err);
        });
    }
}">
    <div class="max-w-4xl mx-auto space-y-6">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-surface-900 tracking-tight">Merchant Gateway</h2>
                <p class="text-surface-500">Integrasikan sistem pembayaran kami ke website Anda.</p>
            </div>
            <div class="p-3 bg-primary-50 rounded-xl"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-store w-8 h-8 text-primary-600"
                    aria-hidden="true">
                    <path d="M15 21v-5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v5"></path>
                    <path d="M17.774 10.31a1.12 1.12 0 0 0-1.549 0 2.5 2.5 0 0 1-3.451 0 1.12 1.12 0 0 0-1.548 0 2.5 2.5 0 0 1-3.452 0 1.12 1.12 0 0 0-1.549 0 2.5 2.5 0 0 1-3.77-3.248l2.889-4.184A2 2 0 0 1 7 2h10a2 2 0 0 1 1.653.873l2.895 4.192a2.5 2.5 0 0 1-3.774 3.244"></path>
                    <path d="M4 10.95V19a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8.05"></path>
                </svg></div>
        </div>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-2xl shadow-sm border border-surface-200 overflow-hidden">
            <div class="p-6 border-b border-surface-100 flex justify-between items-center">
                <h3 class="font-bold text-surface-900 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-key w-5 h-5 text-yellow-500"
                        aria-hidden="true">
                        <path d="m15.5 7.5 2.3 2.3a1 1 0 0 0 1.4 0l2.1-2.1a1 1 0 0 0 0-1.4L19 4"></path>
                        <path d="m21 2-9.6 9.6"></path>
                        <circle cx="7.5" cy="15.5" r="5.5"></circle>
                    </svg>API Credentials</h3>
            </div>
            <div class="p-6 space-y-6">
                <div><label class="block text-sm font-medium text-surface-700 mb-2">Api ID (Private)</label>
                    <div class="flex gap-2">
                        <code class="flex-1 bg-surface-50 border border-surface-200 px-4 py-3 rounded-xl font-mono text-surface-800 tracking-wide select-all"><?= esc($user['api_id']) ?></code>
                        <button @click="copyToClipboard('<?= esc($user['api_id']) ?>')" class="px-4 py-2 text-surface-500 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition border border-surface-200" title="Salin">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy w-4 h-4" aria-hidden="true">
                                <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-xs text-surface-500 mt-1">Gunakan ini sebagai Client ID atau identitas publik.</p>
                </div>
                <div><label class="block text-sm font-medium text-surface-700 mb-2">Api Key (Private)</label>
                    <div class="flex gap-2">
                        <div class="flex-1 relative">
                            <code class="block w-full bg-surface-50 border border-surface-200 px-4 py-3 rounded-xl font-mono text-surface-800 tracking-wide">
                                <span x-show="!showSecret">********************************</span>
                                <span x-show="showSecret"><?= esc($user['api_key']) ?></span>
                            </code>
                        </div>
                        <button @click="showSecret = !showSecret" class="px-4 py-2 text-surface-500 hover:text-surface-700 bg-surface-50 rounded-xl border border-surface-200" :title="showSecret ? 'Sembunyikan' : 'Tampilkan'">
                            <svg x-show="!showSecret" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4" aria-hidden="true">
                                <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg x-show="showSecret" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-off w-4 h-4">
                                <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24" />
                                <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68" />
                                <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61" />
                                <line x1="2" x2="22" y1="2" y2="22" />
                            </svg>
                        </button>
                        <button @click="copyToClipboard('<?= esc($user['api_key']) ?>')" class="px-4 py-2 text-surface-500 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition border border-surface-200" title="Salin">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy w-4 h-4" aria-hidden="true">
                                <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex justify-between mt-2">
                        <p class="text-xs text-red-500">JANGAN bagikan kunci ini. Gunakan hanya di server backend Anda.</p>
                        <button @click="showRegenerateModal = true" class="text-xs text-primary-600 hover:underline font-medium flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-cw w-3 h-3" aria-hidden="true">
                                <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
                                <path d="M21 3v5h-5"></path>
                                <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
                                <path d="M8 16H3v5"></path>
                            </svg>
                            Regenerate Key
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-surface-200" style="opacity: 1; transform: none;">
            <div class="p-6 border-b border-surface-100">
                <h3 class="font-bold text-surface-900 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe w-5 h-5 text-blue-500"
                        aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                        <path d="M2 12h20"></path>
                    </svg>Konfigurasi Url</h3>
            </div>
            <form action="<?= base_url('dashboard/merchant/update') ?>" method="post" class="p-6 space-y-4">

                <div>
                    <label class="block text-sm font-medium text-surface-700 mb-1">Callback URL (Webhook)</label><input placeholder="https://your-website.com/api/callback" class="w-full px-4 py-2 bg-white border border-surface-200 rounded-xl focus:ring-2 focus:ring-primary-500 transition"
                        type="url" name="callback_url" value="<?= esc($user['callback_url']) ?>">
                    <p class="text-xs text-surface-500 mt-1">Kami akan mengirimkan notifikasi POST ke URL ini saat pembayaran berhasil.</p>
                </div>

                <div class="pt-4 flex justify-end"><button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-xl font-bold hover:bg-primary-700 transition flex items-center gap-2 disabled:opacity-50"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save w-4 h-4" aria-hidden="true">
                            <path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                            <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"></path>
                            <path d="M7 3v4a1 1 0 0 0 1 1h7"></path>
                        </svg>Simpan Pengaturan</button></div>
            </form>
        </div>
        <div class="bg-surface-900 text-white rounded-2xl p-6 shadow-lg">
            <h3 class="font-bold flex items-center gap-2 mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-server w-5 h-5 text-green-400"
                    aria-hidden="true">
                    <rect width="20" height="8" x="2" y="2" rx="2" ry="2"></rect>
                    <rect width="20" height="8" x="2" y="14" rx="2" ry="2"></rect>
                    <line x1="6" x2="6.01" y1="6" y2="6"></line>
                    <line x1="6" x2="6.01" y1="18" y2="18"></line>
                </svg>Cara Integrasi (cURL)</h3>
            <div class="bg-black/30 rounded-xl p-4 overflow-x-auto font-mono text-xs leading-relaxed">
                <pre>curl --location '<?= base_url('api/payment') ?>' \
--header 'Content-Type: application/json' \
--data-raw '{
    "api_id": "xxxxxxxxxxx",
    "api_key": "xxxxxxxxxxx",
    "signature": "xxxxxxxxxxx",
    "reference_id": "12345",
    "bank_code": "SP",
    "amount": "1000",
    "customer_name": "jhon",
    "customer_email": "jhon@gmail.com",
    "customer_phone": "082387508540",
    "item_details": "pembelian produk"
}'</pre>
            </div>
            <p class="text-sm text-surface-300 mt-4">Respon sukses akan berisi <code>pada berikut</code>.</p>
        </div>
    </div>

    <!-- Modal Regenerate Key -->
    <div x-show="showRegenerateModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true" @click="showRegenerateModal = false"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Regenerate Secret Key?</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Tindakan ini tidak dapat dibatalkan.
                            </p>
                            <p class="text-sm text-gray-500 mt-2 font-bold mb-2">
                                Peringatan: Secret Key lama Anda akan hangus.
                            </p>
                            <p class="text-sm text-gray-500">
                                Aplikasi atau website yang menggunakan key lama akan berhenti berfungsi sampai Anda mengantinya dengan key baru.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <form action="<?= base_url('dashboard/merchant/regenerate-key') ?>" method="post">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Ya, Generate Baru
                        </button>
                    </form>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                        @click="showRegenerateModal = false">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>