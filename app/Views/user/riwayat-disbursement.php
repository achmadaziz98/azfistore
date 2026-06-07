<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<div x-data="{ 
    modalOpen: false, 
    detail: {},
    loading: false,
    async viewDetail(trxId) {
        this.loading = true;
        this.modalOpen = true;
        try {
            const response = await fetch('<?= base_url('dashboard/riwayat-disbursement/detail') ?>/' + trxId);
            const result = await response.json();
            if (result.success) {
                this.detail = result.data;
            } else {
                alert(result.message);
                this.modalOpen = false;
            }
        } catch (error) {
            console.error(error);
            alert('Gagal mengambil data detail');
            this.modalOpen = false;
        } finally {
            this.loading = false;
        }
    }
}" class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Riwayat Disbursement</h1>
            <p class="text-slate-500 mt-1">Pantau semua aktivitas penarikan (disbursement) akun Anda.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Filters -->
        <form method="GET" action="<?= base_url('dashboard/riwayat-disbursement') ?>" class="p-4 border-b border-slate-100 flex flex-col lg:flex-row gap-4 justify-between items-center">
            <!-- Search -->
            <div class="relative w-full lg:w-64">
                <span class="absolute left-3 top-2.5 text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>
                <input type="text" name="search" value="<?= esc($filters['search'] ?? '') ?>" placeholder="Cari ID TRX atau Nama..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-500 text-sm transition-colors">
            </div>

            <div class="flex flex-col md:flex-row gap-3 w-full lg:w-auto">
                <!-- Status Filter -->
                <select name="status" onchange="this.form.submit()" class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-500 cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="sukses" <?= ($filters['status'] ?? '') == 'sukses' ? 'selected' : '' ?>>Sukses</option>
                    <option value="proses" <?= ($filters['status'] ?? '') == 'proses' ? 'selected' : '' ?>>Diproses</option>
                    <option value="gagal" <?= ($filters['status'] ?? '') == 'gagal' ? 'selected' : '' ?>>Gagal</option>
                </select>

                <!-- Date Range -->
                <div class="flex items-center gap-2 bg-slate-50 border border-slate-200 rounded-lg px-3 py-2">
                    <input type="date" name="start_date" value="<?= esc($filters['start_date'] ?? '') ?>" class="bg-transparent border-none text-sm text-slate-600 focus:ring-0 p-0">
                    <span class="text-slate-400">-</span>
                    <input type="date" name="end_date" value="<?= esc($filters['end_date'] ?? '') ?>" class="bg-transparent border-none text-sm text-slate-600 focus:ring-0 p-0">
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors text-sm font-medium">
                        Filter
                    </button>
                    <!-- Refresh Button -->
                    <a href="<?= base_url('dashboard/riwayat-disbursement') ?>" class="p-2 bg-slate-100 text-slate-600 rounded-lg hover:bg-slate-200 transition-colors flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </a>
                </div>
            </div>
        </form>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-600 text-sm border-b border-slate-100">
                        <th class="px-6 py-4 font-semibold">ID TRX</th>
                        <th class="px-6 py-4 font-semibold">Rekening</th>
                        <th class="px-6 py-4 font-semibold">Waktu</th>
                        <th class="px-6 py-4 font-semibold">Nominal</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-slate-700 divide-y divide-slate-100">

                    <?php if (empty($disbursements)): ?>
                        <!-- Empty State -->
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-12 h-12 text-slate-300 mb-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <p>Tidak ada riwayat penarikan ditemukan.</p>
                                </div>
                            </td>
                        </tr>

                    <?php else: ?>
                        <?php foreach ($disbursements as $row): ?>
                            <tr class="hover:bg-slate-50 transition">
                                <!-- ID TRX -->
                                <td class="px-6 py-4 font-medium uppercase">
                                    <?= $row['transaction_id'] ?>
                                </td>

                                <!-- Rekening -->
                                <td class="px-6 py-4">
                                    <div class="font-medium text-slate-800"><?= $row['nama_rekening'] ?? '-' ?></div>
                                    <div class="text-xs text-slate-500 uppercase"><?= $row['nomor_rekening'] ?? '-' ?></div>
                                    <div class="text-xs text-slate-500 uppercase"><?= $row['payment_method'] ?></div>
                                </td>

                                <!-- Waktu -->
                                <td class="px-6 py-4 text-slate-500">
                                    <?= date('d M Y H:i', strtotime($row['created_at'])) ?>
                                </td>

                                <!-- Nominal -->
                                <td class="px-6 py-4 font-semibold">
                                    Rp <?= number_format($row['amount'], 0, ',', '.') ?>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4">
                                    <?php
                                    $statusClass = match ($row['status']) {
                                        'sukses' => 'bg-green-100 text-green-700',
                                        'proses' => 'bg-blue-100 text-blue-700',
                                        'gagal'  => 'bg-red-100 text-red-700',
                                        default  => 'bg-slate-100 text-slate-600',
                                    };
                                    ?>
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold <?= $statusClass ?>">
                                        <?= strtoupper($row['status']) ?>
                                    </span>
                                </td>

                                <!-- Aksi -->
                                <td class="px-6 py-4 text-right">
                                    <button @click="viewDetail('<?= $row['transaction_id'] ?>')"
                                        class="text-primary-600 hover:text-primary-700 font-semibold text-sm">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-slate-100">
            <?= $pager->links('disbursement', 'tailwind_pagination') ?>
        </div>
    </div>

    <!-- Modal Detail Disbursement -->
    <template x-teleport="body">
        <div x-show="modalOpen"
            class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="modalOpen"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click="modalOpen = false"
                    class="fixed inset-0 bg-slate-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div x-show="modalOpen"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="flex justify-between items-center mb-4 pb-4 border-b">
                            <h3 class="text-lg font-bold text-slate-800" id="modal-title">
                                Detail Penarikan
                            </h3>
                            <button @click="modalOpen = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div x-show="loading" class="flex flex-col items-center py-8">
                            <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-primary-600"></div>
                            <p class="mt-4 text-slate-500 text-sm">Memuat data...</p>
                        </div>

                        <div x-show="!loading" class="space-y-4 max-h-[60vh] overflow-y-auto pr-2">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-xs text-slate-400 uppercase font-semibold">ID Transaksi</p>
                                    <p class="text-sm font-medium text-slate-800 uppercase" x-text="detail.transaction_id"></p>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400 uppercase font-semibold">Status</p>
                                    <template x-if="detail.status">
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase"
                                            :class="{
                                                  'bg-green-100 text-green-700': detail.status === 'sukses',
                                                  'bg-blue-100 text-blue-700': detail.status === 'proses',
                                                  'bg-red-100 text-red-700': detail.status === 'gagal'
                                              }"
                                            x-text="detail.status"></span>
                                    </template>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 border-t pt-4">
                                <div>
                                    <p class="text-xs text-slate-400 uppercase font-semibold">Nama Rekening</p>
                                    <p class="text-sm font-medium text-slate-800" x-text="detail.nama_rekening || '-'"></p>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400 uppercase font-semibold">Nomor Rekening</p>
                                    <p class="text-sm font-medium text-slate-800 uppercase" x-text="detail.nomor_rekening || '-'"></p>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4 border-t pt-4">
                                <div>
                                    <p class="text-xs text-slate-400 uppercase font-semibold">Nominal</p>
                                    <p class="text-sm font-bold text-slate-800">Rp <span x-text="new Intl.NumberFormat('id-ID').format(detail.amount || 0)"></span></p>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400 uppercase font-semibold">Fee</p>
                                    <p class="text-sm font-medium text-slate-800">Rp <span x-text="new Intl.NumberFormat('id-ID').format(detail.fee || 0)"></span></p>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400 uppercase font-semibold">Total Potong</p>
                                    <p class="text-sm font-medium text-primary-600 font-bold">Rp <span x-text="new Intl.NumberFormat('id-ID').format(detail.total || 0)"></span></p>
                                </div>
                            </div>

                            <div class="border-t pt-4">
                                <p class="text-xs text-slate-400 uppercase font-semibold mb-2">Dana Diterima</p>
                                <p class="text-lg font-bold text-green-600">Rp <span x-text="new Intl.NumberFormat('id-ID').format(detail.diterima || 0)"></span></p>
                            </div>

                            <div class="border-t pt-4">
                                <p class="text-xs text-slate-400 uppercase font-semibold mb-2">Waktu Permintaan</p>
                                <p class="text-sm font-medium text-slate-800" x-text="detail.created_at ? new Date(detail.created_at).toLocaleString('id-ID', {day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit'}) : '-'"></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button"
                            @click="modalOpen = false"
                            class="w-full inline-flex justify-center rounded-lg border border-slate-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>

<?= $this->endSection() ?>