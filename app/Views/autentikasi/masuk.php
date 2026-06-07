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
                Otomatisasi Keuangan Bisnis Anda
            </h1>
            <p class="text-primary-100 text-lg mb-10 leading-relaxed">
                Kelola pembayaran masuk, QRIS, Ewallet dan VA dalam satu dashboard terintegrasi.
            </p>

            <ul class="space-y-4">
                <li class="flex items-center gap-3">
                    <div class="p-1 rounded-full bg-primary-500/50 border border-primary-400">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Real-time Notification Settlement</span>
                </li>
                <li class="flex items-center gap-3">
                    <div class="p-1 rounded-full bg-primary-500/50 border border-primary-400">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Unlimited Cek Mutasi Bank</span>
                </li>
                <li class="flex items-center gap-3">
                    <div class="p-1 rounded-full bg-primary-500/50 border border-primary-400">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Support API Webhook Integration</span>
                </li>
            </ul>
        </div>

        <!-- Footer Small Text -->
        <div class="relative z-10 text-sm text-primary-200">
            &copy; 2026 <?= $web['web_author'] ?> Indonesia.
        </div>
    </div>

    <!-- Right Panel: Login Form -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 sm:px-12 lg:px-24 xl:px-32 relative" 
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

        <div class="w-full max-w-md mx-auto">
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-slate-900 mb-2">Selamat Datang! 👋</h2>
                <p class="text-slate-500">Silakan masuk ke akun dashboard Anda.</p>
            </div>

            <form action="<?= base_url('masuk/validasi'); ?>" method="POST" class="space-y-6">
                <?= csrf_field() ?>
                <!-- Email -->
                <div class="space-y-2">
                    <label class="text-sm font-bold text-surface-700">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" class="block w-full pl-11 pr-4 py-3.5 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-sm" placeholder="name@company.com" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <label for="password" class="text-sm font-medium text-slate-700 cursor-pointer">Password</label>
                        <a href="<?= base_url('reset-password') ?>" class="text-sm font-semibold text-primary-600 hover:text-primary-700">Lupa Password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" class="block w-full pl-11 pr-4 py-3.5 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-sm" placeholder="••••••••" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-primary-600/20 text-sm font-bold text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all hover:-translate-y-0.5">
                    Masuk Dashboard
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
            </form>

            <!-- Footer / Register -->
            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <p class="text-sm text-slate-600 mb-4">Belum punya akun?</p>
                <a href="<?= base_url('daftar') ?>" class="inline-flex items-center justify-center w-full px-4 py-3 border border-slate-200 rounded-xl text-sm font-semibold text-slate-700 bg-white hover:bg-slate-50 hover:border-slate-300 transition-all">
                    Daftar Gratis Sekarang
                </a>
            </div>

            <div class="mt-10 text-center text-xs text-slate-400">
                <p>Protected by reCAPTCHA and subject to Google <a href="#" class="underline hover:text-slate-500">Privacy Policy</a>.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>