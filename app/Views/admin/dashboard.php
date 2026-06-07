<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="space-y-10">
    <!-- Welcome Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-100 text-primary-700 text-[10px] font-bold uppercase tracking-wider mb-3 border border-primary-200">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-600"></span>
                </span>
                System Live
            </div>
            <h1 class="text-3xl font-extrabold text-surface-900 tracking-tight">Halo, Admin 👋</h1>
            <p class="text-surface-500 mt-1 font-medium">Selamat datang kembali. Berikut ringkasan sistem hari ini.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-5 py-3 bg-white border border-surface-200 rounded-2xl text-sm font-bold text-surface-600 hover:bg-surface-50 transition-all flex items-center gap-2 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download-cloud">
                    <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                    <path d="M12 12v9" />
                    <path d="m8 17 4 4 4-4" />
                </svg>
                Laporan Trx
            </button>

        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Users -->
        <div class="bg-white p-6 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/30 group hover:border-primary-200 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <circle cx="19" cy="11" r="3" />
                    </svg>
                </div>
                <div class="text-right">
                    <span class="text-[10px] font-extrabold text-blue-500 bg-blue-50 px-2 py-1 rounded-lg border border-blue-100 uppercase tracking-wider">+12%</span>
                </div>
            </div>
            <div>
                <p class="text-xs font-bold text-surface-400 uppercase tracking-widest mb-1">Total Pengguna</p>
                <h3 class="text-3xl font-extrabold text-surface-900"><?= number_format($total_users, 0, ',', '.') ?></h3>
            </div>
        </div>

        <!-- Total Transaksi -->
        <div class="bg-white p-6 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/30 group hover:border-indigo-200 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap">
                        <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                        <path d="M12 12v9" />
                        <path d="m8 17 4 4 4-4" />
                    </svg>
                </div>
                <div class="text-right">
                    <span class="text-[10px] font-extrabold text-indigo-500 bg-indigo-50 px-2 py-1 rounded-lg border border-indigo-100 uppercase tracking-wider">Live</span>
                </div>
            </div>
            <div>
                <p class="text-xs font-bold text-surface-400 uppercase tracking-widest mb-1">Total Transaksi</p>
                <h3 class="text-3xl font-extrabold text-surface-900"><?= number_format($total_transaksi, 0, ',', '.') ?></h3>
            </div>
        </div>

        <!-- Volume Transaksi -->
        <div class="bg-white p-6 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/30 group hover:border-emerald-200 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                        <path d="M16 7h6v6" />
                    </svg>
                </div>
                <div class="text-right text-emerald-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right">
                        <path d="M7 7h10v10" />
                        <path d="M7 17 17 7" />
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-xs font-bold text-surface-400 uppercase tracking-widest mb-1">Volume Trx (Paid)</p>
                <h3 class="text-3xl font-extrabold text-surface-900">Rp<?= number_format($total_volume, 0, ',', '.') ?></h3>
            </div>
        </div>

        <!-- Penarikan Dana -->
        <div class="bg-white p-6 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/30 group hover:border-rose-200 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wallet">
                        <path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1" />
                        <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4" />
                    </svg>
                </div>
                <div class="text-right text-rose-500">
                    <span class="text-[10px] font-extrabold text-rose-500 bg-rose-50 px-2 py-1 rounded-lg border border-rose-100 uppercase tracking-wider">Antrian</span>
                </div>
            </div>
            <div>
                <p class="text-xs font-bold text-surface-400 uppercase tracking-widest mb-1">Total Penarikan</p>
                <h3 class="text-3xl font-extrabold text-surface-900"><?= number_format($total_disbursement, 0, ',', '.') ?></h3>
            </div>
        </div>
    </div>

    <!-- Tables Grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <!-- Recent Transactions -->
        <div class="xl:col-span-2 bg-white rounded-[2.5rem] shadow-xl shadow-surface-200/30 border border-surface-100 overflow-hidden flex flex-col transition-all duration-300">
            <div class="p-8 border-b border-surface-50 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-extrabold text-surface-900 tracking-tight">Transaksi Terakhir</h3>
                    <p class="text-sm font-medium text-surface-400 mt-1">Daftar transaksi yang baru saja terjadi.</p>
                </div>
                <a href="<?= base_url('admin/transactions') ?>" class="p-3 bg-surface-50 text-surface-600 rounded-2xl hover:bg-surface-100 transition-colors border border-surface-200/50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link">
                        <path d="M15 3h6v6" />
                        <path d="M10 14 21 3" />
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                    </svg>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-surface-50/50 border-b border-surface-50">
                        <tr>
                            <th class="text-left px-8 py-4 text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">ID Trx</th>
                            <th class="text-left py-4 text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Waktu</th>
                            <th class="text-left py-4 text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Nominal</th>
                            <th class="text-right px-8 py-4 text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-50">
                        <?php if (empty($recent_transactions)): ?>
                            <tr>
                                <td colspan="4" class="px-8 py-12 text-center text-surface-400 font-medium italic">Belum ada transaksi terbaru.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recent_transactions as $row): ?>
                                <tr class="hover:bg-surface-50/50 transition-colors group">
                                    <td class="px-8 py-5">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-bold text-surface-900 group-hover:text-primary-600 transition-colors">#<?= $row['trx_id'] ?></span>
                                            <span class="text-[10px] font-bold text-surface-400"><?= $row['payment_method'] ?></span>
                                        </div>
                                    </td>
                                    <td class="py-5">
                                        <span class="text-xs font-semibold text-surface-600"><?= date('d/m H:i', strtotime($row['created_at'])) ?></span>
                                    </td>
                                    <td class="py-5">
                                        <span class="text-sm font-extrabold text-surface-900">Rp<?= number_format($row['amount'], 0, ',', '.') ?></span>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <?php
                                        $statusClass = match ($row['status']) {
                                            'paid', 'success' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                            'pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                                            'failed', 'gagal' => 'bg-rose-50 text-rose-600 border-rose-100',
                                            default => 'bg-surface-50 text-surface-600 border-surface-100',
                                        };
                                        ?>
                                        <span class="px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-widest border <?= $statusClass ?>">
                                            <?= $row['status'] ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- System Quick Links -->
        <div class="bg-surface-900 rounded-[2.5rem] p-8 text-white shadow-2xl shadow-surface-900/40 relative overflow-hidden flex flex-col justify-between">
            <div class="absolute top-0 right-0 w-48 h-48 bg-primary-600/10 rounded-full blur-3xl -mr-16 -mt-16"></div>

            <div>
                <h3 class="text-xl font-extrabold tracking-tight mb-6">Quick Actions</h3>
                <div class="space-y-4">
                    <a href="<?= base_url('admin/user') ?>" class="flex items-center justify-between p-4 bg-white/5 rounded-3xl border border-white/5 hover:bg-white/10 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary-600/20 text-primary-400 rounded-2xl flex items-center justify-center group-hover:bg-primary-600 group-hover:text-white transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <line x1="19" x2="19" y1="8" y2="14" />
                                    <line x1="22" x2="16" y1="11" y2="11" />
                                </svg>
                            </div>
                            <span class="text-sm font-bold">Kelola User</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right text-white/20 group-hover:text-white group-hover:translate-x-1 transition-all">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </a>

                    <a href="<?= base_url('admin/metode') ?>" class="flex items-center justify-between p-4 bg-white/5 rounded-3xl border border-white/5 hover:bg-white/10 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-indigo-600/20 text-indigo-400 rounded-2xl flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-banknote">
                                    <rect width="20" height="12" x="2" y="6" rx="2" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path d="M6 12h.01M18 12h.01" />
                                </svg>
                            </div>
                            <span class="text-sm font-bold">Atur Metode</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right text-white/20 group-hover:text-white group-hover:translate-x-1 transition-all">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </a>

                    <a href="<?= base_url('admin/website') ?>" class="flex items-center justify-between p-4 bg-white/5 rounded-3xl border border-white/5 hover:bg-white/10 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-emerald-600/20 text-emerald-400 rounded-2xl flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                                    <path d="M2 12h20" />
                                </svg>
                            </div>
                            <span class="text-sm font-bold">Setelan Web</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right text-white/20 group-hover:text-white group-hover:translate-x-1 transition-all">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </a>
                </div>
            </div>

          
        </div>
    </div>
</div>

<?= $this->endSection() ?>