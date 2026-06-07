<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<div class="p-4 md:p-8 flex-1 w-full mx-auto space-y-8" x-data="{ 
            showSuccess: <?= session('success') ? 'true' : 'false' ?>, 
            showError: <?= session('error') ? 'true' : 'false' ?> 
        }">
    <div class="font-sans mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-surface-900 tracking-tight">Pengaturan Akun</h1>
                <p class="text-surface-500 mt-1">Kelola informasi pribadi dan keamanan akun Anda.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <div class="shadow-surface-200/50 border border-surface-100 bg-white border border-surface-200 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-surface-100 bg-surface-50/50 flex items-center space-x-4">
                        <div class="w-12 h-12 bg-primary-100 rounded-2xl flex items-center justify-center text-primary-600 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-6 h-6">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-surface-900 text-lg">Informasi Profil</h2>
                            <p class="text-sm text-surface-500">Update data diri dan kontak Anda</p>
                        </div>
                    </div>
                    <form action="<?= base_url('dashboard/profile/update'); ?>" method="post" class="p-8 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-surface-700">Nama Lengkap</label>
                                <div class="relative group">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user absolute left-4 top-3.5 w-5 h-5 text-surface-400 group-focus-within:text-primary-500 transition-colors">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input name="nama" class="w-full pl-11 pr-4 py-3 bg-surface-50 border border-surface-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all text-surface-900 font-medium placeholder-surface-400 shadow-sm" type="text" value="<?= esc($user['nama']) ?>">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-surface-700">Email Address</label>
                                <div class="relative opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail absolute left-4 top-3.5 w-5 h-5 text-surface-400">
                                        <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                                        <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                    </svg>
                                    <input disabled class="w-full pl-11 pr-4 py-3 bg-surface-100 border border-surface-200 rounded-xl cursor-not-allowed text-surface-600 font-medium shadow-inner" type="email" value="<?= esc($user['email']) ?>">
                                    <div class="absolute right-3 top-3 text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check">
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                            <path d="m9 12 2 2 4-4" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-xs text-surface-400 font-medium ml-1">Email terverifikasi & tidak dapat diubah.</p>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-surface-700">WhatsApp</label>
                                <div class="relative group">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone absolute left-4 top-3.5 w-5 h-5 text-surface-400 group-focus-within:text-green-500 transition-colors">
                                        <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                    </svg>
                                    <input name="whatsapp" value="<?= esc($user['whatsapp']) ?>" placeholder="0812..." class="w-full pl-11 pr-4 py-3 bg-surface-50 border border-surface-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all text-surface-900 font-medium placeholder-surface-400 shadow-sm" type="text">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-surface-700">Whitelist IP</label>
                                <div class="relative group">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe absolute left-4 top-3.5 w-5 h-5 text-surface-400 group-focus-within:text-blue-500 transition-colors">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                        <path d="M2 12h20"></path>
                                    </svg>
                                    <input name="whitelist_ip" value="<?= esc($user['whitelist_ip'] ?? '') ?>" class="w-full pl-11 pr-4 py-3 bg-surface-50 border border-surface-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all text-surface-900 font-medium placeholder-surface-400 shadow-sm" placeholder="127.0.0.1" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-surface-100 flex justify-end">
                            <button type="submit" class="flex items-center space-x-2 bg-primary-600 text-white font-bold py-3.5 px-8 rounded-xl hover:bg-primary-700 hover:shadow-lg hover:shadow-primary-500/30 transition-all transform hover:-translate-y-0.5 bg-gradient-to-r from-primary-600 to-primary-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save w-5 h-5">
                                    <path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                                    <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"></path>
                                    <path d="M7 3v4a1 1 0 0 0 1 1h7"></path>
                                </svg>
                                <span>Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="space-y-8">
                <div class="bg-white border border-surface-200 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-surface-100 bg-surface-50/50 flex items-center space-x-4">
                        <div class="w-12 h-12 bg-amber-100 rounded-2xl flex items-center justify-center text-amber-600 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock w-6 h-6">
                                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-surface-900 text-lg">Keamanan</h2>
                            <p class="text-sm text-surface-500">Ubah password akun</p>
                        </div>
                    </div>
                    <form action="<?= base_url('dashboard/profile/update/password') ?>" method="post" class="p-8 space-y-5 flex-1 flex flex-col">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-surface-700">Password Baru</label>
                            <input name="password" class="w-full px-4 py-3 bg-surface-50 border border-surface-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all text-surface-900 font-medium placeholder-surface-400 shadow-sm" placeholder="••••••••" type="password">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-surface-700">Konfirmasi Password</label>
                            <input name="password_confirm" class="w-full px-4 py-3 bg-surface-50 border border-surface-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all text-surface-900 font-medium placeholder-surface-400 shadow-sm" placeholder="••••••••" type="password">
                        </div>
                        <div class="mt-auto pt-6">
                            <button type="submit" class="w-full flex items-center justify-center space-x-2 bg-surface-900 text-white font-bold py-3.5 px-6 rounded-xl hover:bg-surface-800 hover:shadow-lg hover:shadow-surface-900/20 transition-all transform hover:-translate-y-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock w-5 h-5">
                                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <span>Update Password</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sukses -->
    <div x-show="showSuccess"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-surface-900/60 backdrop-blur-sm"
        style="display: none;">
        <div class="bg-white rounded-3xl shadow-2xl max-w-sm w-full p-8 text-center animate-in fade-in zoom-in duration-300">
            <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check">
                    <path d="M20 6 9 17l-5-5" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-surface-900 mb-2">Berhasil!</h3>
            <p class="text-surface-600 mb-8"><?= session('success') ?></p>
            <button @click="showSuccess = false" class="w-full py-4 bg-surface-900 text-white font-bold rounded-2xl hover:bg-surface-800 transition-all shadow-lg active:scale-95">
                Tutup
            </button>
        </div>
    </div>

    <!-- Modal Gagal -->
    <div x-show="showError"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-surface-900/60 backdrop-blur-sm"
        style="display: none;">
        <div class="bg-white rounded-3xl shadow-2xl max-w-sm w-full p-8 text-center animate-in fade-in zoom-in duration-300">
            <div class="w-20 h-20 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-surface-900 mb-2">Gagal!</h3>
            <p class="text-surface-600 mb-8"><?= session('error') ?></p>
            <button @click="showError = false" class="w-full py-4 bg-red-600 text-white font-bold rounded-2xl hover:bg-red-700 transition-all shadow-lg active:scale-95">
                Coba Lagi
            </button>
        </div>
    </div>
</div>

<?= $this->endSection() ?>