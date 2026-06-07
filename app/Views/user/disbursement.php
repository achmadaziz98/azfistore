<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<div class="relative space-y-6" x-data="{
    bank: '',
    nama_rekening: '',
    nomor_rekening: '',
    amount: '',
    showModal: false,
    notifications: [],

    init() {
        <?php if (session()->getFlashdata('success')): ?>
            this.addNotification('<?= session()->getFlashdata('success') ?>', 'success');
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')): ?>
            this.addNotification('<?= session()->getFlashdata('error') ?>', 'error');
        <?php endif; ?>
    },

    addNotification(message, type = 'success') {
        const id = Date.now();
        this.notifications.push({ id, message, type });
        setTimeout(() => this.removeNotification(id), 5000);
    },

    removeNotification(id) {
        this.notifications = this.notifications.filter(n => n.id !== id);
    },

    formatRupiah(angka) {
         if (!angka) return 'Rp 0';
         return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(angka);
    },
    confirmTransfer() {
        if (!this.bank || !this.nama_rekening || !this.nomor_rekening || !this.amount) {
            this.addNotification('Mohon lengkapi semua data transfer', 'error');
            return;
        }
        if (this.amount < 50000) {
            this.addNotification('Minimal transfer Rp 50.000', 'error');
            return;
        }
        this.showModal = true;
    },
    submitForm() {
        this.$refs.transferForm.submit();
    }
}">

    <!-- Toast Notifications -->
    <div class="fixed top-24 right-4 z-[100] flex flex-col gap-3 pointer-events-none">
        <template x-for="notif in notifications" :key="notif.id">
            <div 
                x-show="true"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-x-8"
                x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 translate-x-8"
                class="pointer-events-auto flex items-center p-4 rounded-2xl shadow-xl border w-full max-w-sm"
                :class="{
                    'bg-white border-green-100 text-green-800': notif.type === 'success',
                    'bg-white border-red-100 text-red-800': notif.type === 'error'
                }"
            >
                <div class="flex-shrink-0 w-10 h-10 rounded-xl flex items-center justify-center mr-3"
                     :class="notif.type === 'success' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600'">
                    <template x-if="notif.type === 'success'">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </template>
                    <template x-if="notif.type === 'error'">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                    </template>
                </div>
                <div class="flex-1 mr-4">
                    <p class="text-sm font-bold" x-text="notif.type === 'success' ? 'Berhasil' : 'Pesan Kesalahan'"></p>
                    <p class="text-xs opacity-80" x-text="notif.message"></p>
                </div>
                <button @click="removeNotification(notif.id)" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </template>
    </div>

    <div class="p-4 md:p-8 flex-1 w-full max-w-7xl mx-auto space-y-8">
        <!-- Transfer Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                <h2 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                    Kirim Uang
                </h2>

                <form x-ref="transferForm" action="<?= site_url('dashboard/disbursement/create') ?>" method="post" class="space-y-5">
                    <!-- Bank Selection -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Pilih Bank Tujuan</label>
                        <select x-model="bank" name="bank" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-500 transition-colors">
                            <option value="">-- Pilih Bank --</option>
                            <option value="BCA">BCA</option>
                            <option value="BRI">BRI</option>
                            <option value="MANDIRI">Mandiri</option>
                            <option value="BNI">BNI</option>
                            <option value="DANA">DANA</option>
                            <option value="OVO">OVO</option>
                            <option value="GOPAY">GOPAY</option>
                            <option value="SHOPEEPAY">SHOPEEPAY</option>
                            <option value="LINKAJA">LINKAJA</option>
                        </select>
                    </div>

                    <!-- Name Rekening -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nama Rekening</label>
                        <input type="text" x-model="nama_rekening" name="nama_rekening" placeholder="Nama Rekening" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-500 transition-colors">
                    </div>


                    <!-- Account Number -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nomor Rekening</label>
                        <input type="number" x-model="nomor_rekening" name="nomor_rekening" placeholder="Contoh: 1234567890" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-500 transition-colors">
                    </div>

                    <!-- Amount -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nominal Transfer</label>
                        <div class="relative">
                            <span class="absolute left-4 top-2 text-slate-500 font-medium">Rp</span>
                            <input type="number" x-model="amount" name="amount" placeholder="50000" class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-500 transition-colors">
                        </div>
                    </div>

                    <div class="flex justify-between mt-2 text-xs text-surface-500"><span> Saldo: Rp <?= number_format($user['balance'], 0, ',', '.') ?></span><span>Admin Fee: 10%</span></div>

                    <!-- Action Button -->
                    <div class="pt-2">
                        <button type="button" @click="confirmTransfer()" class="w-full py-3 bg-primary-600 text-white rounded-xl hover:bg-primary-700 transition font-medium flex items-center justify-center gap-2 mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle w-4 h-4" aria-hidden="true">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            Konfirmasi
                        </button>
                    </div>
                </form>
            </div>

            <!-- Info Card -->
            <!--
            <div class="mt-6 lg:mt-8">
                <div class="bg-primary-50 rounded-2xl p-6 border border-primary-100">
                    <h3 class="font-bold text-primary-800 mb-4">Informasi Transaksi</h3>

                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between items-center text-slate-600">
                            <span>Saldo Anda</span>
                            <span class="font-bold text-slate-800">Rp 0</span>
                        </div>
                        <div class="flex justify-between items-center text-slate-600">
                            <span>Biaya Admin</span>
                            <span class="font-bold text-slate-800">Rp 7.500</span>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-primary-100 text-xs text-primary-600 leading-relaxed">
                        <p class="mb-2"><strong>Catatan:</strong></p>
                        <ul class="list-disc pl-4 space-y-1">
                            <li>Pastikan nomor rekening tujuan benar.</li>
                            <li>Proses transfer diproses secara otomatis 24 jam.</li>
                        </ul>
                    </div>
                </div>
            </div>
-->
        </div>
    </div>


    <!-- Modal Konfirmasi using Alpine.js -->
    <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true" @click="showModal = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Modal panel -->
            <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div>
                    <div class="flex items-center justify-center w-12 h-12 mx-auto bg-primary-100 rounded-full">
                        <svg class="w-6 h-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Konfirmasi Transfer</h3>
                        <div class="mt-2 text-left space-y-3 bg-gray-50 p-4 rounded-lg">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Bank Tujuan</span>
                                <span class="text-sm font-semibold text-gray-900" x-text="bank.toUpperCase()"></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Nomor Rekening</span>
                                <span class="text-sm font-semibold text-gray-900" x-text="nomor_rekening"></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Nama Penerima</span>
                                <span class="text-sm font-semibold text-gray-900" x-text="nama_rekening"></span>
                            </div>
                            <div class="pt-2 border-t border-gray-200 flex justify-between">
                                <span class="text-sm text-gray-500">Total Nominal</span>
                                <span class="text-sm font-bold text-primary-600" x-text="formatRupiah(amount)"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3">
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-primary-600 border border-transparent rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:text-sm" @click="submitForm()">
                        Ya, Kirim
                    </button>
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:text-sm" @click="showModal = false">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>