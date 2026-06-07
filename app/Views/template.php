<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $web['web_title'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
       <!-- Alpine.js for interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
   <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(229, 231, 235, 0.5);
        }

        .bg-surface-900 {
            --tw-bg-opacity: 1;
            background-color: rgb(15 23 42 / var(--tw-bg-opacity, 1));
        }
    </style>
</head>

<body class="font-sans antialiased text-slate-800 bg-white">

    <!-- Header -->
    <header x-data="{ mobileMenuOpen: false }" class="fixed w-full top-0 z-50 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                    <a href="<?= base_url('/') ?>" class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                        <span class="font-bold text-xl tracking-tight text-slate-900"><?= $web['web_author'] ?></span>
                    </a>
                </div>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#fitur" class="text-sm font-medium text-slate-600 hover:text-primary-600 transition-colors">Fitur</a>
                    <a href="#" class="text-sm font-medium text-slate-600 hover:text-primary-600 transition-colors">Cara Kerja</a>
                    <a href="<?= base_url('dashboard/api-docs') ?>" class="text-sm font-medium text-slate-600 hover:text-primary-600 transition-colors">Dokumentasi API</a>
                </nav>

                <!-- Auth Buttons -->
                <?php if (! session()->get('isLogin')): ?>
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="<?= base_url('masuk') ?>"
                            class="text-sm font-medium text-slate-600 hover:text-primary-600 transition-colors">
                            Masuk
                        </a>

                        <a href="<?= base_url('daftar') ?>" class="px-6 py-2.5 text-sm font-bold bg-primary-600 text-white rounded-xl hover:bg-primary-700 transition-all transform hover:-translate-y-0.5 shadow-lg shadow-primary-500/30 flex items-center">Daftar Gratis<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4 ml-2" aria-hidden="true">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg> </a>
                    </div>
                <?php endif; ?>
                <?php if (session()->get('isLogin')): ?>
                    <a href="<?= base_url('dashboard') ?>"
                        class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium rounded-full text-white bg-primary-600 hover:bg-primary-700">
                        Dashboard
                    </a>
                <?php endif; ?>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-500 hover:text-slate-700 focus:outline-none p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!mobileMenuOpen">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="mobileMenuOpen" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Container -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="md:hidden border-t border-slate-100 pb-6 pt-4"
                 style="display: none;">
                <nav class="flex flex-col space-y-4 px-2">
                    <a href="#fitur" @click="mobileMenuOpen = false" class="text-base font-medium text-slate-600 hover:text-primary-600 transition-colors px-2 py-1">Fitur</a>
                    <a href="#" @click="mobileMenuOpen = false" class="text-base font-medium text-slate-600 hover:text-primary-600 transition-colors px-2 py-1">Cara Kerja</a>
                    <a href="<?= base_url('dashboard/api-docs') ?>" @click="mobileMenuOpen = false" class="text-base font-medium text-slate-600 hover:text-primary-600 transition-colors px-2 py-1">Dokumentasi API</a>
                    
                    <?php if (!session()->get('isLogin')): ?>
                        <div class="pt-4 flex flex-col space-y-3">
                            <a href="<?= base_url('masuk') ?>" class="text-base font-medium text-slate-600 hover:text-primary-600 transition-colors px-2 py-1">Masuk</a>
                            <a href="<?= base_url('daftar') ?>" class="inline-flex items-center justify-center px-6 py-3 text-sm font-bold bg-primary-600 text-white rounded-xl hover:bg-primary-700 transition-all shadow-lg shadow-primary-500/30">
                                Daftar Gratis
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4 ml-2"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="pt-4">
                            <a href="<?= base_url('dashboard') ?>" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium rounded-xl text-white bg-primary-600 hover:bg-primary-700">
                                Dashboard
                            </a>
                        </div>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto pt-8">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 border-t border-slate-800 text-slate-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-8">
                <div class="col-span-2 md:col-span-1">
                    <div class="flex items-center gap-2 mb-4 text-white">

                        <span class="font-bold text-lg tracking-tight"><?= $web['web_author'] ?></span>
                    </div>
                    <p class="text-sm leading-relaxed mb-4">
                        Solusi pembayaran lengkap untuk bisnis online Anda.
                    </p>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4">Produk</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">Cek Mutasi</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Payment Gateway</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Plugin Wordpress</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4">Perusahaan</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Karir</a></li>
                        <li><a href="https://wa.me/<?= $web['whatsapp_cs'] ?>" class="hover:text-white transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="<?= base_url('terms-of-service') ?>" class="hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                        <li><a href="<?= base_url('privacy-policy') ?>" class="hover:text-white transition-colors">Kebijakan Privasi</a></li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-800 text-center md:text-left flex flex-col md:flex-row justify-between items-center text-xs">
                <p>&copy; 2026 <?= $web['web_author'] ?> Indonesia. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <!-- Social icons could go here -->
                </div>
            </div>
        </div>
    </footer>
</body>

</html>