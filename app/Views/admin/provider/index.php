<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="space-y-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-surface-900">Provider API</h1>
            <p class="text-surface-500 mt-1">Konfigurasi koneksi ke provider pembayaran.</p>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <span class="text-sm font-bold"><?= session()->getFlashdata('success') ?></span>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (empty($provider)): ?>
            <div class="col-span-full p-12 text-center bg-white rounded-3xl border border-surface-100 text-surface-400 italic">Belum ada provider terdaftar.</div>
        <?php else: ?>
            <?php foreach ($provider as $p): ?>
                <div class="bg-white p-8 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/30 group transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-12 h-12 bg-primary-50 text-primary-600 rounded-2xl flex items-center justify-center font-bold shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-server"><rect width="20" height="8" x="2" y="2" rx="2" ry="2"/><rect width="20" height="8" x="2" y="14" rx="2" ry="2"/><line x1="6" x2="6.01" y1="6" y2="6"/><line x1="6" x2="6.01" y1="18" y2="18"/></svg>
                        </div>
                       <?php if (false): ?>
<span class="px-2 py-1 rounded-lg text-[10px] font-extrabold uppercase tracking-widest <?= $p['is_active'] ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : 'bg-rose-50 text-rose-600 border border-rose-100' ?>">
<?= $p['is_active'] ? 'Active' : 'Inactive' ?>
</span>
<?php endif; ?>
                    </div>
                    <div class="mb-8">
                        <h3 class="text-xl font-extrabold text-surface-900"><?= $p['kode'] ?></h3>
                        <p class="text-xs font-medium text-surface-400 mt-1">API Key: <span class="text-surface-600"><?= substr($p['api_key'], 0, 8) ?>...</span></p>
                    </div>
                    <div class="flex items-center justify-between gap-3 pt-6 border-t border-surface-50">
                        <a href="<?= base_url('admin/provider/edit/' . $p['id']) ?>" class="flex-1 py-3 text-center text-sm font-bold text-primary-600 bg-primary-50 rounded-xl hover:bg-primary-600 hover:text-white transition-all">Konfigurasi</a>
                        <a href="<?= base_url('admin/provider/hapus/' . $p['id']) ?>" onclick="return confirm('Hapus provider ini?')" class="p-3 text-rose-600 bg-rose-50 rounded-xl hover:bg-rose-600 hover:text-white transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
