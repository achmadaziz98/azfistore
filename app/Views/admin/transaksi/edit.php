<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="max-w-2xl mx-auto space-y-8">
    <div class="flex items-center gap-4">
        <a href="<?= base_url('admin/transactions') ?>" class="p-2 text-surface-400 hover:text-surface-900 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left">
                <line x1="19" x2="5" y1="12" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-surface-900">Edit Trx #<?= $transaksi['transaction_id'] ?></h1>
            <p class="text-surface-500 mt-1">Ubah status transaksi secara manual.</p>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/40 space-y-8">
        <div class="space-y-4">
            <div class="flex justify-between items-center p-4 bg-surface-50 rounded-2xl border border-surface-100">
                <span class="text-xs font-bold text-surface-400 uppercase tracking-widest">Metode</span>
                <span class="text-sm font-extrabold text-surface-900"><?= $transaksi['bank_name'] ?></span>
            </div>
            <div class="flex justify-between items-center p-4 bg-surface-50 rounded-2xl border border-surface-100">
                <span class="text-xs font-bold text-surface-400 uppercase tracking-widest">Nominal</span>
                <span class="text-sm font-extrabold text-primary-600">Rp<?= number_format($transaksi['amount'], 0, ',', '.') ?></span>
            </div>
            <div class="flex justify-between items-center p-4 bg-surface-50 rounded-2xl border border-surface-100">
                <span class="text-xs font-bold text-surface-400 uppercase tracking-widest">Waktu</span>
                <span class="text-sm font-bold text-surface-700"><?= date('d F Y, H:i', strtotime($transaksi['created_at'])) ?></span>
            </div>
        </div>

        <form action="<?= base_url('admin/transactions/update') ?>" method="POST" class="space-y-6 pt-6 border-t border-surface-50">
            <input type="hidden" name="id" value="<?= $transaksi['id'] ?>">
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Status</label>
                <select name="status" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-bold text-surface-900">
                    <option value="pending" <?= $transaksi['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="paid" <?= ($transaksi['status'] === 'paid') ? 'selected' : '' ?>>Paid</option>
                    <option value="gagal" <?= ($transaksi['status'] === 'gagal') ? 'selected' : '' ?>>Gagal</option>
                </select>
            </div>
            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-primary-600 text-white rounded-2xl font-bold shadow-lg shadow-primary-600/20 hover:bg-primary-700 transition-all">Simpan Perubahan Status</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>