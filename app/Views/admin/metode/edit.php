<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="max-w-2xl mx-auto space-y-8">
    <div class="flex items-center gap-4">
        <a href="<?= base_url('admin/metode') ?>" class="p-2 text-surface-400 hover:text-surface-900 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left">
                <line x1="19" x2="5" y1="12" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-surface-900">Edit Metode</h1>
            <p class="text-surface-500 mt-1">Perbarui parameter metode pembayaran.</p>
        </div>
    </div>

    <form action="<?= base_url('admin/metode/update/' . $metode['id']) ?>" method="POST" class="bg-white p-8 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/30 space-y-6">
        <div class="space-y-2">
            <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Nama Metode</label>
            <input type="text" name="nama" value="<?= $metode['nama'] ?>" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Kode</label>
                <input type="text" name="kode" value="<?= $metode['kode'] ?>" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Pajak (%)</label>
                <input type="number" step="0.01" name="pajak_persen" value="<?= $metode['pajak_persen'] ?>" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Keterangan</label>
            <textarea name="keterangan" rows="3" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900"><?= $metode['keterangan'] ?></textarea>
        </div>
        <div class="pt-6">
            <button type="submit" class="w-full py-4 bg-primary-600 text-white rounded-2xl font-bold shadow-lg shadow-primary-600/20 hover:bg-primary-700 transition-all">Simpan Perubahan</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>