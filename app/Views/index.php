<?= $this->extend('template') ?>
<?= $this->section('content') ?>


<!-- Hero Section -->
<section class="pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden relative">
    <!-- Background Decoration -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full -z-10 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-blue-50 via-white to-white"></div>
    <div class="absolute top-20 right-0 -mr-20 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
    <div class="absolute top-20 left-0 -ml-20 w-96 h-96 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">

        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-primary-700 text-xs font-semibold mb-8 tracking-wide uppercase">
            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
            Payment GatewaySystem Live
        </div>

        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight text-slate-900 mb-6 w-full max-w-5xl mx-auto leading-tight">
            Satu Platform, <br class="hidden md:block" />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-indigo-600">Dua Solusi Bayar.</span>
        </h1>

        <p class="mt-4 text-lg md:text-xl text-slate-600 max-w-3xl mx-auto mb-10 leading-relaxed">
            Platform pembayaran hybrid pertama yang menggabungkan kemudahan <strong class="text-slate-800">Pembayaran Tagihan</strong> dan kecanggihan <strong class="text-slate-800">Payment Gateway</strong> QRIS, Ewallet dan VA dalam satu dashboard.
        </p>
         
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
             <?php if (! session()->get('isLogin')): ?>
            <a href="<?= base_url('daftar') ?>" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-full text-white bg-primary-600 hover:bg-primary-700 md:text-lg transition-all shadow-xl shadow-primary-600/30 hover:-translate-y-1">
                Mulai Sekarang Gratis
                <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
           <?php else: ?>
                <a href="<?= base_url('dashboard') ?>" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-full text-white bg-primary-600 hover:bg-primary-700 md:text-lg transition-all shadow-xl shadow-primary-600/30 hover:-translate-y-1">
                Masuk Dashboard
                <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
               <?php endif; ?>
            <a href="<?= base_url('dashboard/api-docs') ?>" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 border border-slate-200 text-base font-medium rounded-full text-slate-700 bg-white hover:bg-slate-50 md:text-lg transition-all hover:border-slate-300">
                <svg class="mr-2 -ml-1 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Baca Dokumentasi
            </a>
        </div>

        <!-- Trusted By / Stats (Optional placeholder) -->
        <div class="mt-16 pt-8 border-t border-slate-100">
            <p class="text-sm text-slate-500 font-medium mb-4">Didukung Bank & E-Wallet Terkemuka</p>
            <div class="flex justify-center gap-6 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                <!-- Placeholder logos with text for now -->
                <span class="font-bold text-xl text-blue-800">BCA</span>
                <span class="font-bold text-xl text-yellow-600">MANDIRI</span>
                <span class="font-bold text-xl text-orange-600">BNI</span>
                <span class="font-bold text-xl text-blue-600">BRI</span>
                <span class="font-bold text-xl text-red-600">QRIS</span>
            </div>
        </div>
    </div>
</section>

<!-- Features Comparison Section -->
<section id="fitur" class="py-20 bg-slate-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-base text-primary-600 font-semibold tracking-wide uppercase">Fleksibilitas Penuh</h2>
            <p class="mt-2 text-3xl leading-8 font-bold tracking-tight text-slate-900 sm:text-4xl">
                Pilih Metode Sesuai Kebutuhan
            </p>
            <p class="mt-4 max-w-2xl text-xl text-slate-500 mx-auto">
                Tidak perlu bingung memilih. <?= $web['web_author'] ?> menyediakan metode pembayaran yang lengkap.
            </p>
        </div>

        <div class="gap-8 lg:gap-12 items-start">

            <!-- Card 1: Cek Mutasi -->
             <!--
            <div class="relative group bg-white rounded-3xl shadow-xl shadow-slate-200/50 p-8 border border-slate-100 hover:border-primary-200 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-primary-50 rounded-full blur-2xl opacity-50"></div>

                <div class="flex items-center gap-4 mb-6">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900">Cek Mutasi Otomatis</h3>
                </div>

                <p class="text-slate-600 mb-8 leading-relaxed">
                    Sistem mendeteksi transfer masuk ke rekening pribadi Anda secara otomatis. Cocok untuk bisnis yang ingin terima uang bersih tanpa potongan besar.
                </p>

                <ul class="space-y-4 mb-8">
                    <li class="flex items-start">
                        <svg class="flex-shrink-0 h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-slate-600"><strong class="text-slate-900 font-semibold">Tanpa Biaya Admin</strong> per transaksi</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="flex-shrink-0 h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-slate-600">Uang <strong class="text-slate-900 font-semibold">langsung masuk</strong> rekening Anda</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="flex-shrink-0 h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-slate-600">Support BCA, Mandiri, BNI, BRI, E-Wallet</span>
                    </li>
                </ul>

                <a href="#" class="block w-full py-3 px-6 text-center rounded-xl bg-blue-50 text-primary-700 font-semibold hover:bg-blue-100 transition-colors">
                    Pelajari Cek Mutasi
                </a>
            </div>
-->
            <!-- Card 2: Payment Gateway -->
            <div class="relative group bg-slate-900 rounded-3xl shadow-2xl shadow-slate-900/20 p-8 border border-slate-800 hover:border-slate-700 transition-all duration-300 hover:-translate-y-1 text-white overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-indigo-500 rounded-full blur-3xl opacity-20"></div>

                <div class="flex items-center gap-4 mb-6">
                    <div class="p-3 bg-slate-800 text-indigo-400 rounded-xl border border-slate-700">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Payment Gateway</h3>
                </div>

                <p class="text-slate-400 mb-8 leading-relaxed">
                    Terima pembayaran instan dengan validasi otomatis 24 jam. Metode QRIS, Ewallet dan Virtual Account untuk pengalaman pelanggan terbaik.
                </p>

                <ul class="space-y-4 mb-8">
                    <li class="flex items-start">
                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-slate-300">Support <strong class="text-white font-semibold">QRIS, Ewallet & Virtual Account</strong></span>
                    </li>
                    <li class="flex items-start">
                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-slate-300">Verifikasi <strong class="text-white font-semibold">Real-time</strong> tanpa jeda</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-slate-300">Hosted Checkout Page Siap Pakai</span>
                    </li>
                </ul>

                <a href="#" class="block w-full py-3 px-6 text-center rounded-xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition-colors shadow-lg shadow-indigo-600/30">
                    Coba Payment Gateway
                </a>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection() ?>