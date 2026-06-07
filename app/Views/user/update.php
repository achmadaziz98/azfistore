<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="max-w-lg mx-auto bg-white p-8 rounded shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-6 text-blue-600 text-center">Edit Profil</h2>
    <?php if (isset($user) && $user): ?>
        <form action="" method="post" class="space-y-5">
            <div>
                <label for="nama" class="block text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" value="<?= esc($user['nama']) ?>" class="mt-1 w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="<?= esc($user['email']) ?>" class="mt-1 w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="whatsapp" class="block text-gray-700">WhatsApp</label>
                <input type="text" id="whatsapp" name="whatsapp" value="<?= esc($user['whatsapp']) ?>" class="mt-1 w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="callback_url" class="block text-gray-700">Callback URL</label>
                <input type="text" id="callback_url" name="callback_url" value="<?= esc($user['callback_url']) ?>" class="mt-1 w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="whitelist_ip" class="block text-gray-700">Whitelist IP</label>
                <input type="text" id="whitelist_ip" name="whitelist_ip" value="<?= esc($user['whitelist_ip']) ?>" class="mt-1 w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="password" class="block text-gray-700">Password Baru (opsional)</label>
                <input type="password" id="password" name="password" class="mt-1 w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Kosongkan jika tidak ingin mengubah">
            </div>
            <div class="flex items-center space-x-2">
                <input type="checkbox" id="regenerate_api" name="regenerate_api" value="1" class="h-4 w-4 text-blue-600">
                <label for="regenerate_api" class="text-gray-700">Regenerate API ID & Key</label>
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded hover:bg-blue-700 transition font-semibold">Simpan Perubahan</button>
        </form>
    <?php else: ?>
        <div class="text-red-500 text-center">User tidak ditemukan.</div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>