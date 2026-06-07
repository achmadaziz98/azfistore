<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="max-w-2xl mx-auto space-y-8">
    <div class="flex items-center gap-4">
        <a href="<?= base_url('admin/tagihan') ?>" class="p-2 text-surface-400 hover:text-surface-900 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left">
                <line x1="19" x2="5" y1="12" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-surface-900">Detail Tagihan #<?= $tagihan['transaction_id'] ?></h1>
            <p class="text-surface-500 mt-1">Kelola dan update status tagihan pembayaran.</p>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/40 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col p-4 bg-surface-50 rounded-2xl border border-surface-100">
                <span class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest mb-1">Customer</span>
                <span class="text-sm font-bold text-surface-900"><?= $tagihan['customer_name'] ?></span>
                <span class="text-[10px] text-surface-500"><?= $tagihan['customer_whatsapp'] ?></span>
            </div>
            <div class="flex flex-col p-4 bg-surface-50 rounded-2xl border border-surface-100">
                <span class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest mb-1">Metode</span>
                <span class="text-sm font-bold text-surface-900 uppercase"><?= $tagihan['kategori'] ?></span>
                <span class="text-[10px] text-surface-500"><?= $tagihan['payment_method'] ?></span>
            </div>
            <div class="flex flex-col p-4 bg-surface-50 rounded-2xl border border-surface-100">
                <span class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest mb-1">Nominal</span>
                <span class="text-sm font-bold text-surface-900">Rp<?= number_format($tagihan['amount'], 0, ',', '.') ?></span>
            </div>
            <div class="flex flex-col p-4 bg-surface-50 rounded-2xl border border-surface-100">
                <span class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest mb-1">Fee / Total</span>
                <span class="text-sm font-bold text-primary-600">Rp<?= number_format($tagihan['fee'], 0, ',', '.') ?> / Rp<?= number_format($tagihan['total_bayar'], 0, ',', '.') ?></span>
            </div>
        </div>

        <form action="<?= base_url('admin/tagihan/update') ?>" method="POST" class="space-y-6 pt-6 border-t border-surface-50">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $tagihan['id'] ?>">
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Status Pembayaran</label>
                <select name="status" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-bold text-surface-900">
                    <option value="pending" <?= $tagihan['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="paid" <?= ($tagihan['status'] === 'paid') ? 'selected' : '' ?>>Piad</option>
                    <option value="gagal" <?= ($tagihan['status'] === 'gagal') ? 'selected' : '' ?>>Gagal</option>
                    <option value="expired" <?= $tagihan['status'] === 'expired' ? 'selected' : '' ?>>Kedaluwarsa (Expired)</option>
                </select>
            </div>
            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-primary-600 text-white rounded-2xl font-bold shadow-lg shadow-primary-600/20 hover:bg-primary-700 transition-all">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>