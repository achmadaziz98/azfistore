<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<div class="space-y-8" x-data="{ showAddModal: false, search: '<?= $search ?? '' ?>' }">

    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-surface-900">Kelola Pengguna</h1>
            <p class="text-surface-500 mt-1">Daftar semua pengguna yang terdaftar di sistem.</p>
        </div>
        
        <div class="flex flex-col md:flex-row items-stretch md:items-center gap-4">
            <!-- Search Input -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-surface-400 group-focus-within:text-primary-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                </div>
                <input type="text" 
                       x-model="search" 
                       @keyup.enter="window.location.href = '<?= base_url('admin/user') ?>?search=' + search"
                       placeholder="Cari user (nama, username, email)..." 
                       class="w-full md:w-80 pl-11 pr-4 py-2.5 bg-white border border-surface-200 rounded-2xl text-sm font-bold text-surface-700 focus:outline-none focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all shadow-sm">
            </div>

            <button @click="showAddModal = true" class="px-5 py-2.5 bg-primary-600 text-white rounded-xl text-sm font-bold hover:bg-primary-700 transition-all shadow-lg shadow-primary-600/20 flex items-center justify-center gap-2 whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                Tambah User
            </button>
        </div>
    </div>


    <?php if (session()->getFlashdata('success')): ?>
        <div class="p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <span class="text-sm font-bold"><?= session()->getFlashdata('success') ?></span>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-3xl border border-surface-100 shadow-xl shadow-surface-200/40 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-surface-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">User</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Kontak</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Saldo</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest">Role</th>
                        <th class="px-6 py-4 text-left text-[10px] font-extrabold text-surface-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-50">
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-surface-400 italic">Belum ada pengguna.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($users as $u): ?>
                            <tr class="hover:bg-surface-50/50 transition-colors">

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-indigo-600 text-white rounded-xl flex items-center justify-center font-bold text-sm shadow-md shadow-primary-500/20">
                                            <?= strtoupper(substr($u['nama'], 0, 1)) ?>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-bold text-surface-900"><?= $u['nama'] ?></span>
                                            <span class="text-[10px] font-medium text-surface-400">@<?= $u['username'] ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-xs font-bold text-surface-700"><?= $u['email'] ?></span>
                                        <span class="text-[10px] font-medium text-surface-400"><?= $u['whatsapp'] ?></span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-extrabold text-surface-900">Rp<?= number_format($u['balance'], 0, ',', '.') ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-lg text-[10px] font-extrabold uppercase tracking-widest <?= $u['role'] === 'admin' ? 'bg-indigo-50 text-indigo-600 border border-indigo-100' : 'bg-surface-100 text-surface-600 border border-surface-200' ?>">
                                        <?= $u['role'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="<?= base_url('admin/user/edit/' . $u['id']) ?>" class="p-2 text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-600 hover:text-white transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/></svg>
                                        </a>
                                        <a href="<?= base_url('admin/user/hapus/' . $u['id']) ?>" onclick="return confirm('Hapus user ini?')" class="p-2 text-rose-600 bg-rose-50 rounded-lg hover:bg-rose-600 hover:text-white transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
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
            <?= $pager->links('user', 'tailwind_pagination') ?>
        </div>
    </div>

    <!-- Add Modal -->
    <div x-show="showAddModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-surface-900/60 backdrop-blur-sm">
        <div @click.outside="showAddModal = false" class="bg-white rounded-[2.5rem] shadow-2xl w-full max-w-xl overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="p-8 border-b border-surface-50 flex items-center justify-between">
                <h3 class="text-xl font-bold text-surface-900">Tambah Pengguna Baru</h3>
                <button @click="showAddModal = false" class="text-surface-400 hover:text-surface-900 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
            <form action="<?= base_url('admin/user/tambah') ?>" method="POST" class="p-8 space-y-6">
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Nama Lengkap</label>
                        <input type="text" name="nama" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Username</label>
                        <input type="text" name="username" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Email</label>
                        <input type="email" name="email" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">WhatsApp</label>
                        <input type="text" name="whatsapp" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Password</label>
                        <input type="password" name="password" required class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-surface-900">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-surface-400 uppercase tracking-widest pl-1">Role</label>
                        <select name="role" class="w-full px-5 py-3.5 bg-surface-50 border border-surface-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-bold text-surface-900">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit" class="w-full py-4 bg-primary-600 text-white rounded-2xl font-bold shadow-lg shadow-primary-600/20 hover:bg-primary-700 transition-all">Daftarkan User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
