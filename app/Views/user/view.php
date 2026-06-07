<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="max-w-lg mx-auto bg-white p-8 rounded shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-6 text-blue-600 text-center">Profil User</h2>
    <?php if (isset($user) && $user): ?>
    <div class="space-y-4">
        <div><span class="font-semibold">Username:</span> <?= esc($user['username']) ?></div>
        <div><span class="font-semibold">Nama:</span> <?= esc($user['nama']) ?></div>
        <div><span class="font-semibold">Email:</span> <?= esc($user['email']) ?></div>
        <div><span class="font-semibold">WhatsApp:</span> <?= esc($user['whatsapp']) ?></div>
        <div><span class="font-semibold">API ID:</span> <span class="text-xs bg-gray-100 px-2 py-1 rounded"><?= esc($user['api_id']) ?></span></div>
        <div><span class="font-semibold">API Key:</span> <span class="text-xs bg-gray-100 px-2 py-1 rounded"><?= esc($user['api_key']) ?></span></div>
        <div><span class="font-semibold">Role:</span> <?= esc($user['role']) ?></div>
        <div><span class="font-semibold">Balance:</span> <?= esc($user['balance']) ?></div>
        <div><span class="font-semibold">Tanggal Daftar:</span> <?= esc($user['date_create']) ?></div>
    </div>
    <?php else: ?>
    <div class="text-red-500 text-center">User tidak ditemukan.</div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
