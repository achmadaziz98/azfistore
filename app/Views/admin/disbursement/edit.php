<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="max-w-2xl mx-auto space-y-8">
    <div class="flex items-center gap-4">
        <a href="<?= base_url('admin/disbursement') ?>" class="p-2 text-surface-400 hover:text-surface-900 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left">
                <line x1="19" x2="5" y1="12" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-surface-900">Proses Penarikan</h1>
            <p class="text-surface-500 mt-1">Konfirmasi atau tolak permintaan penarikan dana.</p>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/30 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 bg-surface-50 rounded-3xl border border-surface-100">
                <p class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest mb-1">Bank Tujuan</p>
                <p class="text-lg font-extrabold text-surface-900 uppercase"><?= $disbursement['payment_method'] ?></p>
            </div>
            <div class="p-6 bg-surface-50 rounded-3xl border border-surface-100">
                <p class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest mb-1">Nominal</p>
                <p class="text-lg font-extrabold text-primary-600">Rp<?= number_format($disbursement['amount'], 0, ',', '.') ?></p>
            </div>
            <div class="p-6 bg-surface-50 rounded-3xl border border-surface-100">
                <p class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest mb-1">Nomor Rekening</p>
                <p class="text-md font-bold text-surface-800"><?= $disbursement['nomor_rekening'] ?></p>
            </div>
            <div class="p-6 bg-surface-50 rounded-3xl border border-surface-100">
                <p class="text-[10px] font-extrabold text-surface-400 uppercase tracking-widest mb-1">Nama Pemilik</p>
                <p class="text-md font-bold text-surface-800"><?= $disbursement['nama_rekening'] ?></p>
            </div>
        </div>

        <form action="<?= base_url('admin/disbursement/update') ?>" method="POST" class="space-y-6 pt-6 border-t border-surface-50">
            <input type="hidden" name="id" value="<?= $disbursement['id'] ?>">
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Update Status</label>
                <select name="status" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-bold text-surface-900">
                    <option value="pending" <?= $disbursement['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="sukses" <?= $disbursement['status'] === 'sukses' ? 'selected' : '' ?>>Sukses</option>
                    <option value="gagal" <?= $disbursement['status'] === 'gagal' ? 'selected' : '' ?>>Gagal</option>
                    <option value="proses" <?= $disbursement['status'] === 'proses' ? 'selected' : '' ?>>Proses</option>
                </select>
            </div>
            <!--
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Keterangan / Alasan</label>
                <textarea name="keterangan" rows="3" placeholder="Sertakan bukti transfer atau alasan penolakan..." class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900"></textarea>
            </div>
-->
            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-surface-900 text-white rounded-2xl font-bold shadow-lg hover:bg-black transition-all">Update Status Penarikan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>