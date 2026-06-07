<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="max-w-3xl mx-auto space-y-8">
    <div class="flex items-center gap-4">
        <a href="<?= base_url('admin/user') ?>" class="p-2 text-surface-400 hover:text-surface-900 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left">
                <line x1="19" x2="5" y1="12" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-surface-900">Edit Pengguna</h1>
            <p class="text-surface-500 mt-1">Perbarui informasi profil dan hak akses user.</p>
        </div>
    </div>

    <form action="<?= base_url('admin/user/update/' . $user['id']) ?>" method="POST" class="bg-white p-8 rounded-[2.5rem] border border-surface-100 shadow-xl shadow-surface-200/30 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Nama Lengkap</label>
                <input type="text" name="nama" value="<?= $user['nama'] ?>" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Username</label>
                <input type="text" name="username" value="<?= $user['username'] ?>" readonly class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Email</label>
                <input type="email" name="email" value="<?= $user['email'] ?>" readonly class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">WhatsApp</label>
                <input type="text" name="whatsapp" value="<?= $user['whatsapp'] ?>" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Saldo (Rp)</label>
                <input type="number" name="balance" value="<?= number_format($user['balance'], 0, ',', '.') ?>" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-bold text-surface-900">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Role Access</label>
                <select name="role" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-bold text-surface-900">
                    <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            <div class="col-span-full space-y-2">
                <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Password Baru (Kosongkan jika tidak ingin diubah)</label>
                <input type="password" name="password" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
            </div>
        </div>
        <div class="pt-6">
            <button type="submit" class="w-full py-4 bg-primary-600 text-white rounded-2xl font-bold shadow-lg shadow-primary-600/20 hover:bg-primary-700 transition-all">Simpan Perubahan</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>