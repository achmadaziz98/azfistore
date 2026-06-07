<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<div class="relative space-y-6" x-data="{ 
    activeTab: 'payment',
    notifications: [],

    addNotification(message, type = 'success') {
        const id = Date.now();
        this.notifications.push({ id, message, type });
        setTimeout(() => this.removeNotification(id), 3000);
    },

    removeNotification(id) {
        this.notifications = this.notifications.filter(n => n.id !== id);
    },

    copy(btn) {
        const code = btn.closest('.group').querySelector('code').innerText;
        navigator.clipboard.writeText(code).then(() => {
            this.addNotification('Kode berhasil disalin!', 'success');
        });
    }
}">

    <!-- Toast Notifications -->
    <div class="fixed top-24 right-4 z-[100] flex flex-col gap-3 pointer-events-none">
        <template x-for="notif in notifications" :key="notif.id">
            <div
                x-show="true"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-x-8"
                x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 translate-x-8"
                class="pointer-events-auto flex items-center p-4 rounded-2xl shadow-xl border w-full max-w-sm"
                :class="{
                    'bg-white border-green-100 text-green-800': notif.type === 'success',
                    'bg-white border-red-100 text-red-800': notif.type === 'error'
                }">
                <div class="flex-shrink-0 w-10 h-10 rounded-xl flex items-center justify-center mr-3"
                    :class="notif.type === 'success' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600'">
                    <template x-if="notif.type === 'success'">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </template>
                </div>
                <div class="flex-1 mr-4">
                    <p class="text-sm font-bold">Berhasil</p>
                    <p class="text-xs opacity-80" x-text="notif.message"></p>
                </div>
                <button @click="removeNotification(notif.id)" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </template>
    </div>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="inline-flex items-center space-x-2 bg-primary-50 text-primary-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-6 border border-primary-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open w-3.5 h-3.5" aria-hidden="true">
                    <path d="M12 7v14"></path>
                    <path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path>
                </svg><span>Developer Hub</span></div>
            <h1 class="text-2xl font-bold text-slate-800">Dokumentasi API</h1>
            <p class="text-slate-500 mt-1">Panduan integrasi sistem pembayaran otomatis.</p>
        </div>

        <!-- Tabs -->
        <div class="bg-slate-100 p-1 rounded-lg inline-flex">
            <button @click="activeTab = 'payment'" :class="activeTab === 'payment' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500 hover:text-slate-700'" class="px-4 py-2 rounded-md text-sm font-medium transition-all">
                Payment Gateway
            </button>
            <button @click="activeTab = 'mutation'" :class="activeTab === 'mutation' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500 hover:text-slate-700'" class="px-4 py-2 rounded-md text-sm font-medium transition-all">
                Cek Mutasi
            </button>
        </div>
    </div>

    <!-- Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">

            <!-- Payment Gateway Content -->
            <div x-show="activeTab === 'payment'" class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                    <h2 class="text-lg font-bold text-slate-800 mb-4">Cara Kerja Gateway</h2>
                    <p class="text-slate-600 leading-relaxed text-sm">
                        API Gateway kami memungkinkan Anda menerima pembayaran otomatis dari berbagai metode pembayaran.
                        Sistem akan mengirimkan <strong>Callback (Webhook)</strong> ke server Anda ketika pembayaran berhasil diterima.
                    </p>

                    <div class="mt-6 space-y-4">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-sm shrink-0">1</div>
                            <div>
                                <h4 class="font-medium text-slate-800 text-sm">Buat Pesanan (Create Order)</h4>
                                <p class="text-slate-500 text-xs mt-1">Request ke API endpoint order untuk mendapatkan detail pembayaran.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-sm shrink-0">2</div>
                            <div>
                                <h4 class="font-medium text-slate-800 text-sm">Pelanggan Membayar</h4>
                                <p class="text-slate-500 text-xs mt-1">Pelanggan melakukan transfer sesuai nominal/instruksi.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-sm shrink-0">3</div>
                            <div>
                                <h4 class="font-medium text-slate-800 text-sm">Terima Callback</h4>
                                <p class="text-slate-500 text-xs mt-1">Server kami memberi notifikasi ke URL Callback Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                    <div class="flex gap-3 md:gap-6 relative">
                        <div class="flex flex-col items-center">
                            <div
                                class="w-12 h-12 rounded-2xl flex items-center justify-center shrink-0 border shadow-sm z-10 bg-purple-50 text-purple-600 border-purple-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-shield w-6 h-6" aria-hidden="true">
                                    <path
                                        d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z">
                                    </path>
                                </svg>
                            </div>
                            <div class="w-0.5 flex-1 bg-surface-200 my-2 last:hidden"></div>
                        </div>
                        <div class="pb-2 flex-1 min-w-0">
                            <h3 class="text-xl font-bold text-surface-900 mb-4 flex items-center">Informasi Akun</h3>
                            <div class="text-surface-600 leading-relaxed space-y-4">
                                <p>Kirim request POST untuk mendapatkan informasi akun.</p>
                                <div class="flex items-center space-x-3 mb-2 flex-wrap gap-y-2"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold border border-green-200">POST</span><code class="text-xs md:text-sm font-bold font-mono text-surface-900 break-all"><?= base_url('api/merchat') ?></code></div>
                                <div class="rounded-2xl overflow-hidden border border-surface-200 bg-surface-900 shadow-xl shadow-surface-900/10 my-6 group relative">
                                    <div class="flex justify-between items-center px-5 py-3 bg-surface-950/50 border-b border-surface-800/50"><span class="text-xs font-bold font-mono text-surface-400 flex items-center uppercase tracking-wider"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-code w-3.5 h-3.5 mr-2 text-primary-400" aria-hidden="true">
                                                <path d="m16 18 6-6-6-6"></path>
                                                <path d="m8 6-6 6 6 6"></path>
                                            </svg>Request Body</span>
                                        <button @click="copy($el)" class="text-surface-500 hover:text-white transition-colors bg-surface-800/50 hover:bg-surface-700 p-1.5 rounded-lg" title="Salin Kode"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy w-4 h-4" aria-hidden="true">
                                                <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                                <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                                            </svg></button>
                                    </div>
                                    <div class="p-5 overflow-x-auto custom-scrollbar">
                                        <pre class="text-sm font-mono text-surface-50 leading-relaxed font-medium"><code>{
    "api_id": "xxxxxxxxxxxx",
    "api_key": "xxxxxxxxxxxx",
    "signature": "xxxxxxxxxxxx"
}</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                    <div class="flex gap-3 md:gap-6 relative">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 rounded-2xl flex items-center justify-center shrink-0 border shadow-sm z-10 bg-blue-50 text-blue-600 border-blue-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-server w-6 h-6" aria-hidden="true">
                                    <rect width="20" height="8" x="2" y="2" rx="2" ry="2"></rect>
                                    <rect width="20" height="8" x="2" y="14" rx="2" ry="2"></rect>
                                    <line x1="6" x2="6.01" y1="6" y2="6"></line>
                                    <line x1="6" x2="6.01" y1="18" y2="18"></line>
                                </svg></div>
                            <div
                                class="w-0.5 flex-1 bg-surface-200 my-2 last:hidden"></div>
                        </div>
                        <div class="pb-2 flex-1 min-w-0">
                            <h3 class="text-xl font-bold text-surface-900 mb-4 flex items-center">Request Pembayaran</h3>
                            <div class="text-surface-600 leading-relaxed space-y-4">
                                <p>Kirim request POST untuk membuat link pembayaran baru.</p>
                                <div class="flex items-center space-x-3 mb-2 flex-wrap gap-y-2"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold border border-green-200">POST</span><code class="text-xs md:text-sm font-bold font-mono text-surface-900 break-all"><?= base_url('api/payment') ?></code></div>
                                <div
                                    class="rounded-2xl overflow-hidden border border-surface-200 bg-surface-900 shadow-xl shadow-surface-900/10 my-6 group relative">
                                    <div class="flex justify-between items-center px-5 py-3 bg-surface-950/50 border-b border-surface-800/50"><span class="text-xs font-bold font-mono text-surface-400 flex items-center uppercase tracking-wider"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-code w-3.5 h-3.5 mr-2 text-primary-400" aria-hidden="true">
                                                <path d="m16 18 6-6-6-6"></path>
                                                <path d="m8 6-6 6 6 6"></path>
                                            </svg>Request Body</span>
                                        <button
                                            @click="copy($el)"
                                            class="text-surface-500 hover:text-white transition-colors bg-surface-800/50 hover:bg-surface-700 p-1.5 rounded-lg" title="Salin Kode"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy w-4 h-4" aria-hidden="true">
                                                <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                                <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                                            </svg></button>
                                    </div>
                                    <div class="p-5 overflow-x-auto custom-scrollbar">
                                        <pre class="text-sm font-mono text-surface-50 leading-relaxed font-medium"><code>{
    "api_id": "xxxxxxxxx",
    "api_key": "xxxxxxxxxxxxx",
    "signature": "xxxxxxxxxxxx", // Berisi formula md5(API ID + API KEY + REFF ID) Anda
    "reference_id": "456745666", // ID unik dari sistem Anda
    "bank_code": "SP", // Kode metode pembayaran
    "amount": "1000",
    "customer_name": "jhon",
    "customer_email": "jhon@gmail.com",
    "customer_phone": "082387508540",
    "item_details": "pembelian produk kamera"
}
// QRIS
    
    - SP = qris
    
    
    //E-WALLET
    - DA = dana
    - OV = ovo
    - LA = linkaja 
    - SA = shopeepay 
    
    //BANK
    
    - BR = bri 
    - I1 = bni
    - M2 = mandiri
    - BT = Permata
    - VA = Maybank
    - DM = Danamon
    - B1 = CIMB Niaga
    - NC = NeoBank 
    - A1 = ATMBersama 
</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                    <div class="flex gap-3 md:gap-6 relative">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 rounded-2xl flex items-center justify-center shrink-0 border shadow-sm z-10 bg-green-50 text-green-600 border-green-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-6 h-6" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg></div>
                            <div
                                class="w-0.5 flex-1 bg-surface-200 my-2 last:hidden"></div>
                        </div>
                        <div class="pb-2 flex-1 min-w-0">
                            <h3 class="text-xl font-bold text-surface-900 mb-4 flex items-center">Terima URL Checkout</h3>
                            <div class="text-surface-600 leading-relaxed space-y-4">
                                <p>API akan merespon dengan <code>checkout_url</code>. Redirect user Anda ke URL ini.</p>
                                <div class="rounded-2xl overflow-hidden border border-surface-200 bg-surface-900 shadow-xl shadow-surface-900/10 my-6 group relative">
                                    <div class="flex justify-between items-center px-5 py-3 bg-surface-950/50 border-b border-surface-800/50"><span class="text-xs font-bold font-mono text-surface-400 flex items-center uppercase tracking-wider"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-code w-3.5 h-3.5 mr-2 text-primary-400" aria-hidden="true">
                                                <path d="m16 18 6-6-6-6"></path>
                                                <path d="m8 6-6 6 6 6"></path>
                                            </svg>Response Sukses</span>
                                        <button
                                            @click="copy($el)"
                                            class="text-surface-500 hover:text-white transition-colors bg-surface-800/50 hover:bg-surface-700 p-1.5 rounded-lg" title="Salin Kode"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy w-4 h-4" aria-hidden="true">
                                                <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                                <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                                            </svg></button>
                                    </div>
                                    <div class="p-5 overflow-x-auto custom-scrollbar">
                                        <pre class="text-sm font-mono text-surface-50 leading-relaxed font-medium"><code>{
    "api_id": "xxxxxxxxx",
    "api_key": "xxxxxxxxxxxxx",
    "signature": "xxxxxxxxxxxx",
    "reference_id": "456745666",
    "bank_code": "SP",
    "amount": "1000",
    "customer_name": "jhon",
    "customer_email": "jhon@gmail.com",
    "customer_phone": "082387508540",
    "item_details": "pembelian produk kamera"
}</code></pre>
                                    </div>
                                </div>
                                <div class="bg-yellow-50 p-4 rounded-xl border border-yellow-100 text-sm text-yellow-800 flex gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert w-5 h-5 shrink-0" aria-hidden="true">
                                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path>
                                        <path d="M12 9v4"></path>
                                        <path d="M12 17h.01"></path>
                                    </svg>
                                    <p>Simpan <code>reference_id</code> di database Anda untuk mencocokkan pembayaran nanti.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                    -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                    <div class="flex gap-3 md:gap-6 relative">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 rounded-2xl flex items-center justify-center shrink-0 border shadow-sm z-10 bg-primary-50 text-primary-600 border-primary-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-git-branch w-6 h-6" aria-hidden="true">
                                    <line x1="6" x2="6" y1="3" y2="15"></line>
                                    <circle cx="18" cy="6" r="3"></circle>
                                    <circle cx="6" cy="18" r="3"></circle>
                                    <path d="M18 9a9 9 0 0 1-9 9"></path>
                                </svg></div>
                            <div
                                class="w-0.5 flex-1 bg-surface-200 my-2 last:hidden"></div>
                        </div>
                        <div class="pb-2 flex-1 min-w-0">
                            <h3 class="text-xl font-bold text-surface-900 mb-4 flex items-center">Tangkap Webhook</h3>
                            <div class="text-surface-600 leading-relaxed space-y-4">
                                <p>Saat user sukses membayar, <?= $web['web_author'] ?> akan menembak URL Webhook yang Anda setting di dashboard.</p>
                                <div class="rounded-2xl overflow-hidden border border-surface-200 bg-surface-900 shadow-xl shadow-surface-900/10 my-6 group relative">
                                    <div class="flex justify-between items-center px-5 py-3 bg-surface-950/50 border-b border-surface-800/50"><span class="text-xs font-bold font-mono text-surface-400 flex items-center uppercase tracking-wider"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-code w-3.5 h-3.5 mr-2 text-primary-400" aria-hidden="true">
                                                <path d="m16 18 6-6-6-6"></path>
                                                <path d="m8 6-6 6 6 6"></path>
                                            </svg>Contoh Payload Webhook</span>
                                        <button
                                            @click="copy($el)"
                                            class="text-surface-500 hover:text-white transition-colors bg-surface-800/50 hover:bg-surface-700 p-1.5 rounded-lg" title="Salin Kode"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy w-4 h-4" aria-hidden="true">
                                                <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                                <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                                            </svg></button>
                                    </div>
                                    <div class="p-5 overflow-x-auto custom-scrollbar">
                                        <pre class="text-sm font-mono text-surface-50 leading-relaxed font-medium"><code>{
  "success": true,
  "message": "Callback Berhasil",
  "data": {
    "transaction_id": "TRX1768455260637",
    "reference_id": "123455555",
    "status": "paid",
    "amount": 1000,
    "total_payment": 1122,
    "bank_name": "QRIS",
    "paid_at": "2026-01-15 06:21:37"
  },
  "signature": "xxxxxxxxx" // md5(API ID + API KEY + REFF ID) Anda
}</code></pre>
                                    </div>
                                </div>
                                <p>Pastikan server Anda merespon dengan HTTP 200 OK.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mutation Content -->
            <div x-show="activeTab === 'mutation'" class="space-y-6" style="display: none;">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                    <h2 class="text-lg font-bold text-slate-800 mb-4">Cek Mutasi Bank Otomatis</h2>
                    <p class="text-slate-600 leading-relaxed text-sm">
                        Layanan ini memungkinkan Anda membaca mutasi rekening bank secara real-time tanpa perlu login manual ke internet banking.
                    </p>
                </div>
            </div>

        </div>

        <!-- Right Side Info -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-yellow-50 rounded-2xl p-6 border border-yellow-100">
                <div class="flex items-center gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    <h3 class="font-bold text-yellow-800">Sandbox Mode</h3>
                </div>
                <p class="text-sm text-yellow-700 leading-relaxed">
                    Gunakan mode Sandbox untuk pengujian tanpa menggunakan uang asli. API Key Sandbox dapat ditemukan di halaman Profil.
                </p>
            </div>

            <div class="bg-indigo-600 rounded-2xl p-6 text-white shadow-lg shadow-indigo-200">
                <h3 class="font-bold mb-2">Butuh Bantuan Integrasi?</h3>
                <p class="text-indigo-100 text-sm mb-4">Tim developer kami siap membantu Anda mengintegrasikan API.</p>
                <a href="https://wa.me/<?= $web['whatsapp_cs'] ?>" class="inline-block px-4 py-2 bg-white text-indigo-600 font-medium rounded-lg text-sm hover:bg-indigo-50 transition-colors">Hubungi Developer</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>