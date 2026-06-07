<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto space-y-10">
    <div>
        <h1 class="text-3xl font-extrabold text-surface-900 tracking-tight">Pengaturan Website</h1>
        <p class="text-surface-500 mt-1 font-medium">Konfigurasi identitas dan kontak situs Anda.</p>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <span class="text-sm font-bold"><?= session()->getFlashdata('success') ?></span>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/website/update') ?>" method="POST" enctype="multipart/form-data" class="space-y-8">
        <!-- Identitas Web -->
        <div class="bg-white p-8 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/30 space-y-8">
            <div class="flex items-center gap-4 pb-6 border-b border-surface-50">
                <div class="p-3 bg-primary-50 text-primary-600 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                </div>
                <h2 class="text-xl font-bold text-surface-900">Identitas Situs</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Nama Website</label>
                    <input type="text" name="web_title" value="<?= $website['web_title'] ?>" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Author</label>
                    <input type="text" name="web_author" value="<?= $website['web_author'] ?>" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                </div>
                <div class="col-span-full space-y-2">
                    <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Keywords (SEO)</label>
                    <input type="text" name="web_keywords" value="<?= $website['web_keywords'] ?>" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                </div>
                <div class="col-span-full space-y-2">
                    <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Deskripsi Website</label>
                    <textarea name="web_description" rows="3" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900"><?= $website['web_description'] ?></textarea>
                </div>
            </div>
        </div>

        <!-- Kontak & Alamat -->
        <div class="bg-white p-8 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/30 space-y-8">
            <div class="flex items-center gap-4 pb-6 border-b border-surface-50">
                <div class="p-3 bg-emerald-50 text-emerald-600 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </div>
                <h2 class="text-xl font-bold text-surface-900">Kontak & Alamat</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">WhatsApp Admin</label>
                    <input type="text" name="whatsapp_admin" value="<?= $website['whatsapp_admin'] ?>" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">WhatsApp CS</label>
                    <input type="text" name="whatsapp_cs" value="<?= $website['whatsapp_cs'] ?>" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Email</label>
                    <input type="email" name="email" value="<?= $website['email'] ?>" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Alamat</label>
                    <input type="text" name="alamat" value="<?= $website['alamat'] ?>" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4">
            <button type="reset" class="px-8 py-4 bg-white border border-surface-200 text-surface-600 rounded-3xl font-bold hover:bg-surface-50 transition-all">Batalkan</button>
            <button type="submit" class="px-10 py-4 bg-primary-600 text-white rounded-3xl font-bold shadow-xl shadow-primary-600/30 hover:bg-primary-700 transition-all">Simpan Perubahan</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
