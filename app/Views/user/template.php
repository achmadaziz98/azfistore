<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $web['web_title'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Alpine.js for interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('modal', {
                logout: false,
                openLogout() {
                    this.logout = true
                },
                closeLogout() {
                    this.logout = false
                }
            })
        })
    </script>
    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-surface-900 {
            --tw-bg-opacity: 1;
            background-color: rgb(15 23 42 / var(--tw-bg-opacity));
        }

        .from-surface-900 {
            --tw-gradient-from: #0f172a var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(0 0 0 / 0%) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), rgb(0 0 0 / 85%);
        }

        .text-slate-600 {
            --tw-text-opacity: 1;
            color: rgb(71 85 105 / var(--tw-text-opacity, 1));
        }

        .text-surface-600 {
            --tw-text-opacity: 1;
            color: rgb(71 85 105 / var(--tw-text-opacity, 1));
        }

        .text-surface-400 {
            --tw-text-opacity: 1;
            color: rgb(71 85 105 / var(--tw-text-opacity, 1));
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        },
                        surface: {
                            50: '#f8fafc',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-surface-50 text-slate-800">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">

        <!-- Logout Confirmation Modal -->
        <div x-show="$store.modal.logout"
            class="fixed inset-0 z-[100] overflow-y-auto"
            x-cloak>

            <!-- Backdrop -->
            <div x-show="$store.modal.logout"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"
                @click="$store.modal.closeLogout()"></div>

            <!-- Modal Content -->
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div x-show="$store.modal.logout"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-100">

                    <div class="bg-white px-8 pb-8 pt-10">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-2xl bg-rose-50 sm:mx-0 sm:h-14 sm:w-14">
                                <svg class="h-8 w-8 text-rose-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                </svg>
                            </div>
                            <div class="mt-4 text-center sm:ml-6 sm:mt-0 sm:text-left">
                                <h3 class="text-xl font-bold leading-6 text-slate-900" id="modal-title">Konfirmasi Logout</h3>
                                <div class="mt-3">
                                    <p class="text-sm text-slate-500 leading-relaxed">Apakah Anda yakin ingin keluar dari sistem? Anda harus masuk kembali untuk mengakses dashboard Anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50/50 px-8 py-6 sm:flex sm:flex-row-reverse sm:gap-3 border-t border-slate-100">
                        <a href="<?= base_url('logout') ?>"
                            class="inline-flex w-full justify-center rounded-2xl bg-rose-600 px-8 py-3.5 text-sm font-bold text-white shadow-lg shadow-rose-600/20 hover:bg-rose-700 transition-all sm:w-auto">
                            Ya, Keluar
                        </a>
                        <button type="button"
                            @click="$store.modal.closeLogout()"
                            class="mt-3 inline-flex w-full justify-center rounded-2xl bg-white px-8 py-3.5 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-inset ring-slate-200 hover:bg-slate-50 transition-all sm:mt-0 sm:w-auto">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Sidebar -->
        <aside class="flex flex-col flex-shrink-0 w-72 h-full bg-surface-900 border-r border-white/5 lg:static fixed z-[60] transform transition-all duration-300 ease-in-out shadow-2xl"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

            <!-- Logo -->
            <div class="flex items-center justify-between px-8 h-20 border-b border-white/5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary-600 rounded-2xl flex items-center justify-center shadow-lg shadow-primary-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check text-white">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-extrabold text-white tracking-tight"><?= $web['web_author'] ?></span>
                </div>
                <!-- Mobile Close -->
                <button @click="sidebarOpen = false" class="lg:hidden p-2 text-surface-400 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>



            <!-- Navigation Menu -->
            <nav class="flex-1 overflow-y-auto px-6 py-4 space-y-2 pb-8 scrollbar-hide">
                <?php $uri = uri_string(); ?>

                <p class="px-4 text-[10px] font-extrabold text-white/30 uppercase tracking-[0.2em] mb-4">Main Menu</p>

                <a href="<?= base_url('dashboard') ?>" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all group <?= ($uri === 'dashboard' || $uri === '') ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/20' : 'text-white/40 hover:bg-white/5 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                        <rect width="7" height="9" x="3" y="3" rx="1" />
                        <rect width="7" height="5" x="14" y="3" rx="1" />
                        <rect width="7" height="9" x="14" y="12" rx="1" />
                        <rect width="7" height="5" x="3" y="16" rx="1" />
                    </svg>
                    <span class="font-bold text-sm tracking-wide">Dashboard</span>
                </a>

                <a href="<?= base_url('dashboard/disbursement') ?>" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all group <?= (strpos($uri, 'dashboard/disbursement') === 0) ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/20' : 'text-white/40 hover:bg-white/5 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                        <path d="M22 2 11 13" />
                        <path d="m22 2-7 20-4-9-9-4Z" />
                    </svg>
                    <span class="font-bold text-sm tracking-wide">Kirim Uang</span>
                </a>

                <a href="<?= base_url('dashboard/transactions') ?>" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all group <?= (strpos($uri, 'dashboard/transactions') === 0) ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/20' : 'text-white/40 hover:bg-white/5 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                        <path d="M3 12h18" />
                        <path d="m15 18 6-6-6-6" />
                        <path d="m9 6-6 6 6 6" />
                    </svg>
                    <span class="font-bold text-sm tracking-wide">Riwayat Transaksi</span>
                </a>

                <a href="<?= base_url('dashboard/riwayat-disbursement') ?>" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all group <?= (strpos($uri, 'dashboard/riwayat-disbursement') === 0) ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/20' : 'text-white/40 hover:bg-white/5 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                        <path d="M3 12h18" />
                        <path d="m15 18 6-6-6-6" />
                        <path d="m9 6-6 6 6 6" />
                    </svg>
                    <span class="font-bold text-sm tracking-wide">Riwayat Disbursement</span>
                </a>

                <a href="<?= base_url('dashboard/wallet') ?>" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all group <?= (strpos($uri, 'dashboard/wallet') === 0) ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/20' : 'text-white/40 hover:bg-white/5 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                        <rect width="20" height="14" x="2" y="5" rx="2" />
                        <line x1="2" x2="22" y1="10" y2="10" />
                    </svg>
                    <span class="font-bold text-sm tracking-wide">Dompet Saya</span>
                </a>

                <p class="px-4 text-[10px] font-extrabold text-white/30 uppercase tracking-[0.2em] mb-4 mt-8">Integration</p>

                <a href="<?= base_url('dashboard/api-docs') ?>" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all group <?= (strpos($uri, 'dashboard/api-docs') === 0) ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/20' : 'text-white/40 hover:bg-white/5 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                        <path d="m18 16 4-4-4-4" />
                        <path d="m6 8-4 4 4 4" />
                        <path d="m14.5 4-5 16" />
                    </svg>
                    <span class="font-bold text-sm tracking-wide">Dokumentasi API</span>
                </a>

                <a href="<?= base_url('dashboard/merchant') ?>" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all group <?= (strpos($uri, 'dashboard/merchant') === 0) ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/20' : 'text-white/40 hover:bg-white/5 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                        <rect width="18" height="12" x="3" y="10" rx="2" />
                        <path d="M3 10V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v4" />
                        <line x1="7" x2="7" y1="10" y2="22" />
                        <line x1="17" x2="17" y1="10" y2="22" />
                    </svg>
                    <span class="font-bold text-sm tracking-wide">Kelola Merchant</span>
                </a>

                <a href="<?= base_url('dashboard/profile') ?>" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all group <?= (strpos($uri, 'dashboard/profile') === 0) ? 'bg-primary-600 text-white shadow-xl shadow-primary-600/20' : 'text-white/40 hover:bg-white/5 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    <span class="font-bold text-sm tracking-wide">Pengaturan Akun</span>
                </a>
            </nav>

            <!-- Bottom Section -->
            <div class="px-6 py-8 border-t border-white/5">
                <button @click="$store.modal.openLogout()" class="flex items-center justify-center gap-3 w-full py-4 bg-rose-500/10 text-rose-500 hover:bg-rose-500 hover:text-white rounded-[1.5rem] text-sm font-extrabold transition-all group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:-translate-x-1 transition-transform rotate-180">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                    Logout
                </button>
            </div>
        </aside>

        <!-- Overlay for mobile -->
        <div class="fixed inset-0 bg-black bg-opacity-50 z-10 lg:hidden"
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"></div>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-hidden bg-surface-50">
            <!-- Header -->
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 lg:px-8">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-slate-500 hover:text-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                    <!-- Search Bar -->
                    <div class="hidden md:flex items-center bg-slate-100 px-3 py-2 rounded-lg w-64">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        <input type="text" placeholder="Cari transaksi..." class="bg-transparent border-none focus:outline-none text-sm ml-2 w-full text-slate-600">
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Notification -->
                    <button class="relative p-2 text-slate-400 hover:text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

                    <!-- Profile Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center gap-3 focus:outline-none">
                            <div class="h-9 w-9 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-sm">
                                <?= substr(session('username') ?? 'U', 0, 1) ?>
                            </div>
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-medium text-slate-700"><?= esc(session('username') ?? 'User') ?></p>
                                <p class="text-xs text-slate-500">Member</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-slate-400">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 z-50 border border-slate-100" x-cloak>
                            <a href="<?= base_url('dashboard/profile') ?>" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Profil Saya</a>
                            <div class="border-t border-slate-100 my-1"></div>
                            <button @click="$store.modal.openLogout()" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Logout</button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Render Section Content -->
            <div class="flex-1 overflow-auto p-4 lg:p-8">
                <?= $this->renderSection('content') ?>
            </div>

        </main>
    </div>



</body>

</html>