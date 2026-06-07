<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="space-y-8" x-data="{ showModal: false, selected: {}, search: '<?= $search ?? '' ?>' }">


    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-surface-900">Riwayat Transaksi</h1>
            <p class="text-surface-500 mt-1">Pantau semua aktivitas transaksi dalam sistem.</p>
        </div>
        
        <!-- Search Input -->
        <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-surface-400 group-focus-within:text-primary-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
            <input type="text" 
                   x-model="search" 
                   @keyup.enter="window.location.href = '<?= base_url('admin/transactions') ?>?search=' + search"
                   placeholder="Cari transaksi..." 
                   class="w-full md:w-80 pl-11 pr-4 py-3 bg-white border border-surface-200 rounded-2xl text-sm font-bold text-surface-700 focus:outline-none focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all shadow-sm">
        </div>
    </div>


    <?php if (session()->getFlashdata('success')): ?>
        <div class="p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                <polyline points="22 4 12 14.01 9 11.01" />
            </svg>
            <span class="text-sm font-bold"><?= session()->getFlashdata('success') ?></span>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-3xl border border-surface-100 shadow-xl shadow-surface-200/40 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-surface-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">ID Trx</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Waktu</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Metode</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Nominal</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-50">
                    <?php if (empty($transactions)): ?>
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-surface-400 italic">Belum ada transaksi recorded.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($transactions as $t): ?>
                            <tr class="hover:bg-surface-50/50 transition-colors">

                                <td class="px-6 py-4">
                                    <span class="text-sm font-bold text-surface-900 tracking-tight">#<?= $t['transaction_id'] ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-xs font-semibold text-surface-500"><?= date('d/m/Y H:i', strtotime($t['created_at'])) ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-xs font-bold text-surface-700 uppercase"><?= $t['bank_name'] ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-extrabold text-surface-900">Rp<?= number_format($t['amount'], 0, ',', '.') ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <?php
                                    $statusClass = match ($t['status']) {
                                        'paid' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                        'pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                                        'gagal' => 'bg-rose-50 text-rose-600 border-rose-100',
                                        default => 'bg-surface-50 text-surface-600 border-surface-100',
                                    };
                                    ?>
                                    <span class="px-2 py-1 rounded-lg text-[10px] font-extrabold uppercase tracking-widest border <?= $statusClass ?>">
                                        <?= $t['status'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button @click="selected = <?= htmlspecialchars(json_encode($t), ENT_QUOTES) ?>; showModal = true" class="p-2 text-emerald-600 bg-emerald-50 rounded-lg hover:bg-emerald-600 hover:text-white transition-all">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                        </button>
                                        <a href="<?= base_url('admin/transactions/edit/' . $t['id']) ?>" class="p-2 text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-600 hover:text-white transition-all">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                                            </svg>
                                        </a>
                                        <a href="<?= base_url('admin/transactions/hapus/' . $t['id']) ?>" onclick="return confirm('Hapus transaksi ini?')" class="p-2 text-rose-600 bg-rose-50 rounded-lg hover:bg-rose-600 hover:text-white transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                                <path d="M3 6h18" />
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                <line x1="10" x2="10" y1="11" y2="17" />
                                                <line x1="14" x2="14" y1="11" y2="17" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-surface-50">
            <?= $pager->links('transactions', 'tailwind_pagination') ?>
        </div>
    </div>


    <!-- Detail Modal -->
    <div x-show="showModal" 
         x-cloak 
         class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-surface-900/60 backdrop-blur-sm"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        
        <div @click.outside="showModal = false" 
             class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl overflow-hidden border border-surface-100"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0">
            
            <!-- Modal Header -->
            <div class="px-8 py-6 border-b border-surface-50 flex items-center justify-between bg-surface-50/50">
                <div>
                    <h3 class="text-xl font-bold text-surface-900">Detail Transaksi</h3>
                    <p class="text-sm text-surface-500 font-medium mt-0.5" x-text="'ID: #' + selected.transaction_id"></p>
                </div>
                <button @click="showModal = false" class="p-2 hover:bg-white rounded-xl text-surface-400 hover:text-surface-900 transition-all border border-transparent hover:border-surface-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>

            <!-- Modal Content -->
            <div class="p-8 max-h-[70vh] overflow-y-auto scrollbar-hide">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Basic Info -->
                    <div class="space-y-6">
                        <div>
                            <label class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest block mb-2">Informasi Pembayaran</label>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-surface-500">Metode</span>
                                    <span class="font-bold text-surface-900 uppercase" x-text="selected.bank_name"></span>
                                </div>
                        
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-surface-500">Nominal</span>
                                    <span class="font-extrabold text-surface-900" x-text="'Rp' + new Intl.NumberFormat('id-ID').format(selected.amount)"></span>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-surface-500">Status</span>
                                    <span class="px-2 py-0.5 rounded-lg text-[10px] font-extrabold uppercase tracking-widest border" 
                                          :class="{
                                              'bg-emerald-50 text-emerald-600 border-emerald-100': selected.status === 'paid',
                                              'bg-amber-50 text-amber-600 border-amber-100': selected.status === 'pending',
                                              'bg-rose-50 text-rose-600 border-rose-100': selected.status === 'gagal'
                                          }"
                                          x-text="selected.status"></span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest block mb-2">Informasi Sistem</label>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-surface-500">Ref ID</span>
                                    <span class="font-mono text-xs text-surface-700 font-bold" x-text="selected.reference_id || '-'"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-surface-500">User</span>
                                    <span class="font-bold text-surface-900" x-text="selected.username"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-surface-500">Waktu</span>
                                    <span class="font-semibold text-surface-700" x-text="selected.created_at"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Info -->
                    <div class="space-y-6">
                        <div>
                            <label class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest block mb-2">Data Pelanggan</label>
                            <div class="space-y-3 text-sm">
                                <div class="flex flex-col gap-1">
                                    <span class="text-surface-500">Nama</span>
                                    <span class="font-bold text-surface-900" x-text="selected.customer_name || '-'"></span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-surface-500">Email</span>
                                    <span class="font-semibold text-surface-700" x-text="selected.customer_email || '-'"></span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-surface-500">WhatsApp</span>
                                    <span class="font-semibold text-surface-700" x-text="selected.customer_phone || '-'"></span>
                                </div>
                            </div>
                        </div>

                        <div x-show="selected.item_details">
                            <label class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest block mb-2">Detail Item</label>
                            <div class="p-4 bg-surface-50 rounded-2xl border border-surface-100">
                                <p class="text-xs font-medium text-surface-600 leading-relaxed italic" x-text="selected.item_details"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-8 py-6 bg-surface-50 border-t border-surface-100 flex justify-end">
                <button @click="showModal = false" class="px-6 py-2.5 bg-white border border-surface-200 text-surface-600 font-bold text-sm rounded-xl hover:bg-surface-100 transition-all">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>






<?= $this->endSection() ?>