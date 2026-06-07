<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
            <p class="text-slate-500 mt-1">Selamat datang kembali, <span class="font-semibold text-slate-800"><?= $user['nama'] ?></span>! 👋</p>
        </div>
        <div class="flex gap-3">

            <a href="<?= base_url('dashboard/api-docs') ?>" class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-medium transition-colors shadow-sm shadow-primary-200">
                Integrasi API
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Main Stats & Content (Left 2/3) -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Saldo Card -->
                <div class="bg-gradient-to-br from-primary-600 to-primary-700 rounded-[2rem] p-8 text-white relative overflow-hidden shadow-2xl shadow-primary-500/30 group" style="transform: none;">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-16 -mt-32 blur-3xl group-hover:bg-white/15 transition-all duration-700"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-primary-500/30 rounded-full -ml-10 -mb-10 blur-2xl"></div>
                    <div class="relative z-10 flex flex-col h-full justify-between min-h-[200px]">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="p-3 bg-white/20 rounded-2xl backdrop-blur-md shadow-inner border border-white/10"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wallet w-6 h-6 text-white" aria-hidden="true">
                                        <path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"></path>
                                        <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path>
                                    </svg></div>
                                <span
                                    class="font-bold text-primary-50 text-sm tracking-wide uppercase">Saldo Anda</span>
                            </div>
                            <div class="px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-bold border border-white/10 text-primary-50 shadow-sm">Active</div>
                        </div>
                        <div class="mt-8">
                            <h2 class="text-5xl font-extrabold tracking-tight mb-2 drop-shadow-sm"> <?= number_format($user['balance'], 0, ',', '.') ?></h2>
                            <div class="flex items-center text-primary-100 text-sm font-medium"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-4 h-4 mr-2" aria-hidden="true">
                                    <path d="M16 7h6v6"></path>
                                    <path d="m22 7-8.5 8.5-5-5L2 17"></path>
                                </svg><span>Siap digunakan untuk transaksi</span></div>
                        </div>
                        <div class="mt-8 pt-6 border-t border-white/10 flex items-center justify-between">
                            <!--<span class="text-xs text-primary-100 font-bold bg-primary-800/30 px-3 py-1.5 rounded-lg border border-white/5">Estimasi: 4 transaksi</span>-->
                            <a href="<?= base_url('dashboard/transactions') ?>" class="bg-white text-primary-600 px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-primary-50 transition-colors shadow-lg shadow-black/5 flex items-center inline-flex">
                                Riwayat
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-3 h-3 ml-1.5" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Status Card -->
                <div class="bg-white rounded-[2rem] p-8 border border-surface-100 flex flex-col justify-between shadow-xl shadow-surface-200/40 relative overflow-hidden" style="transform: none;">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-50 rounded-full -mr-10 -mt-10 blur-2xl opacity-50"></div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-start mb-8">
                            <div class="p-3 bg-green-50 rounded-2xl border border-green-100 text-green-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-6 h-6" aria-hidden="true">
                                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                </svg></div>
                            <span
                                class="bg-green-100 text-green-700 text-[10px] font-extrabold px-3 py-1.5 rounded-full uppercase tracking-wide border border-green-200">Terverifikasi</span>
                        </div>
                        <div class="mb-4">
                            <h3 class="text-xl font-bold text-surface-900 mb-3">Status Akun</h3>
                            <p class="text-sm text-surface-500 leading-relaxed font-medium">Akun Anda dalam kondisi prima. Semua fitur pembayaran aktif dan siap menerima dana.</p>
                        </div>
                    </div>
                    <div class="bg-surface-50 rounded-2xl p-4 border border-surface-100 mt-auto flex items-center justify-between group cursor-pointer hover:bg-surface-100 transition-colors">
                        <div class="flex items-center overflow-hidden"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-4 h-4 text-green-500 mr-3 shrink-0"
                                aria-hidden="true">
                                <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                <path d="m9 11 3 3L22 4"></path>
                            </svg><span class="text-xs font-bold text-surface-700 truncate mr-2">Email: <?= $user['email'] ?></span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-3.5 h-3.5 text-surface-400 group-hover:translate-x-1 transition-transform shrink-0"
                            aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-[2rem] p-8 border border-surface-100 shadow-xl shadow-surface-200/40">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-surface-50 rounded-2xl border border-surface-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-activity w-6 h-6 text-primary-600" aria-hidden="true">
                                <path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"></path>
                            </svg></div>
                        <div>
                            <h3 class="text-xl font-bold text-surface-900 leading-none">Aktivitas Terbaru</h3>

                        </div>
                    </div><a class="text-sm font-bold text-primary-600 hover:text-primary-700 hover:bg-primary-50 px-5 py-2.5 rounded-xl transition-colors flex items-center group" href="/dashboard/transactions" data-discover="true">Lihat Semua<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg></a>
                </div>
                <div class="overflow-hidden rounded-2xl border border-surface-100">
                    <table class="w-full border-collapse">
                        <thead class="bg-surface-50/80">
                            <tr>
                                <th class="text-left py-4 pl-6 text-[11px] font-bold text-surface-500 uppercase tracking-wider">
                                    Aktivitas
                                </th>
                                <th class="text-left py-4 text-[11px] font-bold text-surface-500 uppercase tracking-wider">
                                    Waktu
                                </th>
                                <th class="text-left py-4 text-[11px] font-bold text-surface-500 uppercase tracking-wider">
                                    Nominal
                                </th>
                                <th class="text-right py-4 pr-6 text-[11px] font-bold text-surface-500 uppercase tracking-wider">
                                    Status
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-surface-100 bg-white">
                            <?php if (empty($transaksiHariIni)): ?>
                                <tr>
                                    <td colspan="4" class="py-16 text-center">
                                        <div class="flex flex-col items-center justify-center text-surface-400">
                                            <div class="w-16 h-16 bg-surface-50 rounded-full flex items-center justify-center mb-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-surface-300" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2" />
                                                </svg>
                                            </div>
                                            <p class="font-bold text-surface-900">Belum ada aktivitas</p>
                                            <p class="text-sm mt-1">Transaksi Anda akan muncul di sini.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($transaksiHariIni as $row): ?>
                                    <tr class="hover:bg-slate-50 transition">
                                        <!-- Aktivitas -->
                                        <td class="py-4 pl-6">
                                            <p class="font-semibold text-slate-800">
                                                <?= esc($row['transaction_id']) ?>
                                            </p>
                                            <p class="text-sm text-slate-500">
                                                <?= esc($row['bank_name']) ?>
                                            </p>
                                        </td>

                                        <!-- Waktu -->
                                        <td class="py-4 text-slate-500 text-sm">
                                            <?= date('H:i', strtotime($row['created_at'])) ?>
                                        </td>

                                        <!-- Nominal -->
                                        <td class="py-4 font-bold text-slate-800">
                                            Rp <?= number_format($row['amount'], 0, ',', '.') ?>
                                        </td>

                                        <!-- Status -->
                                        <td class="py-4 pr-6 text-right">
                                            <?php
                                            $statusClass = match ($row['status']) {
                                                'paid'  => 'text-green-600',
                                                'pending' => 'text-yellow-600',
                                                'proses'  => 'text-blue-600',
                                                'gagal'   => 'text-red-600',
                                                default   => 'text-slate-500',
                                            };
                                            ?>
                                            <span class="text-xs font-semibold <?= $statusClass ?>">
                                                <?= strtoupper($row['status']) ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Start (Right 1/3) -->
        <!--
        <div class="lg:col-span-1">
            <div class="bg-slate-900 rounded-2xl p-6 text-white shadow-xl">
                <h3 class="font-bold text-lg mb-4">Mulai Cepat</h3>
                <div class="space-y-6 relative">
                
                    <div class="absolute left-[15px] top-2 bottom-0 w-0.5 bg-slate-700"></div>

                  
                    <div class="relative flex gap-4">
                        <div class="relative z-10 w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-slate-900 font-bold text-sm shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">Daftar Akun</h4>
                            <p class="text-slate-400 text-xs mt-1">Akun Anda telah berhasil dibuat.</p>
                        </div>
                    </div>

                    <div class="relative flex gap-4">
                        <div class="relative z-10 w-8 h-8 rounded-full bg-slate-700 border-2 border-slate-600 flex items-center justify-center font-bold text-sm shrink-0">
                            2
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-200">Isi Saldo Koin</h4>
                            <p class="text-slate-400 text-xs mt-1">Lakukan deposit koin pertama Anda untuk mulai bertransaksi.</p>
                            <a href="<?= base_url('user/deposit') ?>" class="inline-block mt-2 text-xs text-primary-400 hover:text-primary-300">Deposit Sekarang &rarr;</a>
                        </div>
                    </div>

                  
                    <div class="relative flex gap-4">
                        <div class="relative z-10 w-8 h-8 rounded-full bg-slate-700 border-2 border-slate-600 flex items-center justify-center font-bold text-sm shrink-0">
                            3
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-200">Integrasi API</h4>
                            <p class="text-slate-400 text-xs mt-1">Hubungkan aplikasi Anda menggunakan API ID & Key.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
                    -->
    </div>
</div>
<?= $this->endSection() ?>