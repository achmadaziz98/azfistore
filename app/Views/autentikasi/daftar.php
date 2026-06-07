<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="flex min-h-screen w-full">
    <!-- Left Panel: Branding & Features -->
    <div class="hidden lg:flex lg:w-1/2 bg-primary-600 relative overflow-hidden flex-col justify-between p-12 text-white">
        <!-- Background Decorations -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-primary-500 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-primary-700 rounded-full blur-3xl opacity-50"></div>

        <!-- Logo -->
        <div class="relative z-10 flex items-center gap-3">

        </div>

        <!-- Main Content -->
        <div class="relative z-10 max-w-lg">
            <h1 class="text-4xl font-bold leading-tight mb-6">
                Mulai Perjalanan Bisnis Anda
            </h1>
            <p class="text-primary-100 text-lg mb-10 leading-relaxed">
                Bergabung dengan ribuan bisnis lainnya yang telah mengotomatisasi sistem pembayaran mereka dengan <?= $web['web_author'] ?>.
            </p>

            <div class="grid grid-cols-1 gap-6">
                <div class="flex gap-4">
                    <div class="flex-shrink-0 p-3 bg-primary-500/30 rounded-xl border border-primary-500/50 backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white text-lg">Setup Instan</h3>
                        <p class="text-primary-100 text-sm mt-1">Langsung aktif dan bisa digunakan dalam hitungan menit.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0 p-3 bg-primary-500/30 rounded-xl border border-primary-500/50 backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white text-lg">Keamanan Data Terjamin</h3>
                        <p class="text-primary-100 text-sm mt-1">Enkripsi tingkat tinggi untuk setiap transaksi Anda.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Small Text -->
        <div class="relative z-10 text-sm text-primary-200">
            &copy; 2026 <?= $web['web_author'] ?> Indonesia.
        </div>
    </div>

    <!-- Right Panel: Registration Form -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-6 sm:px-12 lg:px-16 xl:px-24 relative overflow-y-auto py-10"
         x-data="{ 
            showToast: <?= session()->getFlashdata('error') || session()->getFlashdata('success') ? 'true' : 'false' ?>,
            message: '<?= session()->getFlashdata('error') ?: session()->getFlashdata('success') ?>',
            type: '<?= session()->getFlashdata('error') ? 'error' : 'success' ?>'
         }"
         x-init="if(showToast) { setTimeout(() => showToast = false, 5000) }">

        <!-- Notification Toast -->
        <template x-if="showToast">
            <div x-show="showToast" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform translate-y-2"
                 class="fixed top-6 right-6 z-50 max-w-sm w-full bg-white rounded-2xl shadow-2xl border-l-4 overflow-hidden"
                 :class="type === 'error' ? 'border-red-500' : 'border-green-500'">
                <div class="p-4 flex items-center gap-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center"
                         :class="type === 'error' ? 'bg-red-50 text-red-500' : 'bg-green-50 text-green-500'">
                        <template x-if="type === 'error'">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </template>
                        <template x-if="type === 'success'">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </template>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-bold text-slate-900" x-text="type === 'error' ? 'Ada Masalah!' : 'Berhasil!'"></p>
                        <p class="text-xs text-slate-500" x-text="message"></p>
                    </div>
                    <button @click="showToast = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="h-1 bg-slate-100 w-full overflow-hidden">
                    <div class="h-full animate-progress"
                         :class="type === 'error' ? 'bg-red-500' : 'bg-green-500'"></div>
                </div>
            </div>
        </template>
        <div class="w-full max-w-lg mx-auto py-6">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-slate-900 mb-2">Buat Akun Baru 🚀</h2>
                <p class="text-slate-500">Lengkapi data di bawah ini untuk mendaftar.</p>
            </div>

            <form action="<?= base_url('daftar/validasi') ?>" method="POST" class="space-y-5">
                <?= csrf_field() ?>

                <!-- Row: Nama & Whatsapp -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <label for="nama" class="text-sm font-medium text-slate-700">Nama Lengkap</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" id="nama" name="nama" class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-sm" placeholder="John Doe" required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="whatsapp" class="text-sm font-medium text-slate-700">No. WhatsApp</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <input type="tel" id="whatsapp" name="whatsapp" class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-sm" placeholder="0812..." required>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label for="email" class="text-sm font-medium text-slate-700">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-sm" placeholder="name@company.com" required>
                    </div>
                </div>

                <!-- Username -->
                <div class="space-y-2">
                    <label for="username" class="text-sm font-medium text-slate-700">Username</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <input type="text" id="username" name="username" class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-sm" placeholder="User Name" required>
                    </div>
                </div>

                <!-- Row: Password & Confirm -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <label for="password" class="text-sm font-medium text-slate-700">Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-sm" placeholder="Min. 8 karakter" required minlength="8">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="password_confirm" class="text-sm font-medium text-slate-700">Ulangi Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <input type="password" id="password_confirm" name="password_confirm" class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-sm" placeholder="Ulangi password" required>
                        </div>
                    </div>
                </div>

                <!-- Agreement -->
                <!-- Agreement (UI only) -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input
                            id="terms"
                            type="checkbox"
                            required
                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-slate-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="font-medium text-slate-600">
                            Saya setuju dengan
                            <a href="#" class="text-primary-600 hover:text-primary-700 hover:underline">
                                Syarat & Ketentuan
                            </a>
                            serta
                            <a href="#" class="text-primary-600 hover:text-primary-700 hover:underline">
                                Kebijakan Privasi
                            </a>.
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-primary-600/20 text-sm font-bold text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all hover:-translate-y-0.5">
                    Buat Akun Gratis
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>
            </form>

            <!-- Footer / Login Link -->
            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <p class="text-sm text-slate-600 mb-4">Sudah punya akun?</p>
                <a href="<?= base_url('masuk') ?>" class="inline-flex items-center justify-center w-full px-4 py-3 border border-slate-200 rounded-xl text-sm font-semibold text-slate-700 bg-white hover:bg-slate-50 hover:border-slate-300 transition-all">
                    Masuk Disini
                </a>
            </div>

        </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>