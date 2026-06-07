<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
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
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        surface: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-surface-100 text-surface-900 antialiased">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-72 bg-surface-900 text-white transform transition-transform duration-300 ease-in-out border-r border-surface-800 lg:static lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

            <!-- Logo -->
            <div class="h-20 flex items-center px-8 border-b border-surface-800">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center shadow-lg shadow-primary-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check text-white">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight">Admin<span class="text-primary-400">Panel</span></span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2 scrollbar-hide">
                <?php $uri = uri_string(); ?>

                <p class="px-4 text-[10px] font-extrabold text-surface-500 uppercase tracking-[0.2em] mb-4">Main Menu</p>

                <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group <?= ($uri === 'admin/dashboard') ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/20' : 'text-surface-400 hover:bg-surface-800 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard group-hover:scale-110 transition-transform">
                        <rect width="7" height="9" x="3" y="3" rx="1" />
                        <rect width="7" height="5" x="14" y="3" rx="1" />
                        <rect width="7" height="9" x="14" y="12" rx="1" />
                        <rect width="7" height="5" x="3" y="16" rx="1" />
                    </svg>
                    <span class="font-semibold text-sm">Dashboard</span>
                </a>

                <a href="<?= base_url('admin/user') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group <?= (strpos($uri, 'admin/user') === 0) ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/20' : 'text-surface-400 hover:bg-surface-800 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users group-hover:scale-110 transition-transform">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <circle cx="19" cy="11" r="3" />
                    </svg>
                    <span class="font-semibold text-sm">Pengguna</span>
                </a>

                <a href="<?= base_url('admin/transactions') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group <?= (strpos($uri, 'admin/transactions') === 0) ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/20' : 'text-surface-400 hover:bg-surface-800 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left-right group-hover:scale-110 transition-transform">
                        <path d="M8 3 4 7l4 4" />
                        <path d="M4 7h16" />
                        <path d="m16 21 4-4-4-4" />
                        <path d="M20 17H4" />
                    </svg>
                    <span class="font-semibold text-sm">Transaksi</span>
                </a>

                <a href="<?= base_url('admin/tagihan') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group <?= (strpos($uri, 'admin/tagihan') === 0) ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/20' : 'text-surface-400 hover:bg-surface-800 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-receipt group-hover:scale-110 transition-transform">
                        <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1-2-1Z" />
                        <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                        <path d="M12 17.5V18" />
                        <path d="M12 7V6" />
                    </svg>
                    <span class="font-semibold text-sm">Tagihan</span>
                </a>

                <a href="<?= base_url('admin/disbursement') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group <?= (strpos($uri, 'admin/disbursement') === 0) ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/20' : 'text-surface-400 hover:bg-surface-800 hover:text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send group-hover:scale-110 transition-transform">
                        <path d="m22 2-7 20-4-9-9-4Z" />
                        <path d="M22 2 11 13" />
                    </svg>
                    <span class="font-semibold text-sm">Penarikan</span>
                </a>

                <div class="pt-6">
                    <p class="px-4 text-[10px] font-extrabold text-surface-500 uppercase tracking-[0.2em] mb-4">Sistem</p>

                    <a href="<?= base_url('admin/metode') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group <?= (strpos($uri, 'admin/metode') === 0) ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/20' : 'text-surface-400 hover:bg-surface-800 hover:text-white' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card group-hover:scale-110 transition-transform">
                            <rect width="20" height="14" x="2" y="5" rx="2" />
                            <line x1="2" x2="22" y1="10" y2="10" />
                        </svg>
                        <span class="font-semibold text-sm">Metode Pembayaran</span>
                    </a>

                    <a href="<?= base_url('admin/provider') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group <?= (strpos($uri, 'admin/provider') === 0) ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/20' : 'text-surface-400 hover:bg-surface-800 hover:text-white' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-server group-hover:scale-110 transition-transform">
                            <rect width="20" height="8" x="2" y="2" rx="2" ry="2" />
                            <rect width="20" height="8" x="2" y="14" rx="2" ry="2" />
                            <line x1="6" x2="6.01" y1="6" y2="6" />
                            <line x1="6" x2="6.01" y1="18" y2="18" />
                        </svg>
                        <span class="font-semibold text-sm">Provider</span>
                    </a>

                    <a href="<?= base_url('admin/website') ?>" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all group <?= (strpos($uri, 'admin/website') === 0) ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/20' : 'text-surface-400 hover:bg-surface-800 hover:text-white' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings group-hover:scale-110 transition-transform">
                            <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                        <span class="font-semibold text-sm">Pengaturan Web</span>
                    </a>
                </div>
            </nav>

            <!-- Logout Section -->
            <div class="p-6 border-t border-surface-800">
                <a href="<?= base_url('logout') ?>" class="flex items-center justify-center gap-2 w-full py-4 bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white rounded-2xl font-bold text-sm transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                    Keluar Panel
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0">

            <!-- Top Header -->
            <header class="h-20 bg-white border-b border-surface-200 flex items-center justify-between px-8 z-30">
                <div class="flex items-center gap-6">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2.5 rounded-xl bg-surface-50 text-surface-600 hover:bg-surface-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu">
                            <line x1="4" x2="20" y1="12" y2="12" />
                            <line x1="4" x2="20" y1="6" y2="6" />
                            <line x1="4" x2="20" y1="18" y2="18" />
                        </svg>
                    </button>
                    <div class="hidden md:flex items-center bg-surface-50 px-4 py-2.5 rounded-2xl w-80 border border-surface-200/50 focus-within:border-primary-500 focus-within:bg-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search text-surface-400">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" x2="16.65" y1="21" y2="16.65" />
                        </svg>
                        <input type="text" placeholder="Cari di dashboard..." class="bg-transparent border-none focus:outline-none text-sm ml-3 w-full text-surface-600 font-medium">
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <button class="relative p-2.5 rounded-xl bg-surface-50 text-surface-500 hover:text-primary-600 hover:bg-primary-50 transition-all border border-transparent hover:border-primary-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell">
                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                        </svg>
                        <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white ring-1 ring-red-500/20"></span>
                    </button>

                    <div class="h-10 w-px bg-surface-200 ml-2 hidden sm:block"></div>

                    <div x-data="{ userMenu: false }" class="relative">
                        <button @click="userMenu = !userMenu" class="flex items-center gap-3 p-1.5 rounded-2xl hover:bg-surface-50 transition-all focus:outline-none border border-transparent hover:border-surface-200">
                            <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-primary-600 to-indigo-600 text-white flex items-center justify-center font-bold shadow-md shadow-primary-600/20">
                                A
                            </div>
                            <div class="hidden sm:block text-left pr-2">
                                <p class="text-xs font-bold text-surface-900 leading-none mb-1">Administrator</p>
                                <p class="text-[10px] font-bold text-primary-600 uppercase tracking-wider">Admin</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down text-surface-400 transition-transform duration-300" :class="userMenu ? 'rotate-180' : ''">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>

                        <div x-show="userMenu" @click.outside="userMenu = false" x-cloak
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl shadow-surface-900/10 py-2 z-50 border border-surface-100 ring-1 ring-surface-900/5">
                            <div class="px-4 py-3 border-b border-surface-50 block sm:hidden">
                                <p class="text-xs font-bold text-surface-900 leading-none mb-1">Administrator</p>
                                <p class="text-[10px] font-bold text-primary-600 uppercase tracking-wider">Admin</p>
                            </div>
                            <a href="<?= base_url('admin/website') ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-surface-600 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings">
                                    <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Pengaturan Situs
                            </a>
                            <div class="border-t border-surface-50 my-2"></div>
                            <a href="<?= base_url('logout') ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm font-bold text-red-500 hover:bg-red-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7" />
                                    <line x1="21" x2="9" y1="12" y2="12" />
                                </svg>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-8 scrollbar-hide bg-surface-50/50">
                <?= $this->renderSection('content') ?>

                <!-- Footer -->
                <footer class="mt-12 py-8 border-t border-surface-200 text-center">
                    <p class="text-xs font-bold text-surface-400 uppercase tracking-[0.3em]">&copy; 2026 Admin Panel &bull; Pay System</p>
                </footer>
            </main>

        </div>

        <!-- Overlay for mobile sidebar -->
        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-40 bg-surface-900/60 backdrop-blur-sm lg:hidden"></div>
    </div>

</body>

</html>