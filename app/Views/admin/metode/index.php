<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="space-y-8" x-data="{ showAddModal: false }">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-surface-900">Metode Pembayaran</h1>
            <p class="text-surface-500 mt-1">Kelola metode pembayaran yang tersedia di sistem.</p>
        </div>
        <button @click="showAddModal = true" class="px-5 py-2.5 bg-primary-600 text-white rounded-xl text-sm font-bold hover:bg-primary-700 transition-all shadow-lg shadow-primary-600/20 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
                <path d="M5 12h14" />
                <path d="M12 5v14" />
            </svg>
            Tambah Metode
        </button>
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
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Metode</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Kode</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Pajak (%)</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-50">
                    <?php if (empty($metode)): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-surface-400 italic">Belum ada metode pembayaran.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($metode as $m): ?>
                            <tr class="hover:bg-surface-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-surface-100 rounded-lg flex items-center justify-center font-bold text-surface-400 uppercase text-xs">
                                            <?= substr($m['nama'], 0, 2) ?>
                                        </div>
                                        <span class="text-sm font-bold text-surface-900"><?= $m['nama'] ?></span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <code class="text-xs font-bold px-2 py-1 bg-surface-100 text-surface-600 rounded-md"><?= $m['kode'] ?></code>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-bold text-surface-900"><?= $m['pajak_persen'] ?>%</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="<?= base_url('admin/metode/edit/' . $m['id']) ?>" class="p-2 text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-600 hover:text-white transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                                            </svg>
                                        </a>
                                        <a href="<?= base_url('admin/metode/hapus/' . $m['id']) ?>" onclick="return confirm('Hapus metode ini?')" class="p-2 text-rose-600 bg-rose-50 rounded-lg hover:bg-rose-600 hover:text-white transition-all">
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
    </div>

    <!-- Add Modal -->
    <div x-show="showAddModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-surface-900/60 backdrop-blur-sm">
        <div @click.outside="showAddModal = false" class="bg-white rounded-[2.5rem] shadow-2xl w-full max-w-lg overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="p-8 border-b border-surface-50 flex items-center justify-between">
                <h3 class="text-xl font-bold text-surface-900">Tambah Metode Pembayaran</h3>
                <button @click="showAddModal = false" class="text-surface-400 hover:text-surface-900 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
            <form action="<?= base_url('admin/metode/tambah') ?>" method="POST" class="p-8 space-y-6">
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Nama Metode</label>
                    <input type="text" name="nama" required placeholder="Contoh: QRIS" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Kode</label>
                        <input type="text" name="kode" required placeholder="QRIS" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Pajak (%)</label>
                        <input type="number" step="0.01" name="pajak_persen" required placeholder="0.75" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Keterangan</label>
                    <textarea name="keterangan" rows="3" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900" placeholder="Keterangan singkat..."></textarea>
                </div>
                <div class="pt-4">
                    <button type="submit" class="w-full py-4 bg-primary-600 text-white rounded-2xl font-bold shadow-lg shadow-primary-600/20 hover:bg-primary-700 transition-all">Simpan Metode</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>