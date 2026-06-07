<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
<div x-data="{ 
    showPenarikan: false, 
    showBuatTagihan: false, 
    selectedBank: null, 
    selectedBankName: '',
    showConfirmPenarikan: false,
    showConfirmTagihan: false,
    showCopySuccess: false,
    withdrawData: { bank: '', noRek: '', nama: '', jumlah: '' },
    tagihanData: { nama: '', wa: '', jumlah: '' },
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
    }
}" class="relative p-4 md:p-8 flex-1 w-full max-w-7xl mx-auto space-y-8">

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
    <div class="max-w-7xl mx-auto font-sans animate-fade-in space-y-6">
        <div class="bg-gradient-to-br from-surface-900 to-surface-800 rounded-2xl p-6 text-white shadow-xl shadow-surface-900/10 relative overflow-hidden">
            <div class="absolute -top-10 -right-10 opacity-5 rotate-12"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wallet w-64 h-64" aria-hidden="true">
                    <path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"></path>
                    <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path>
                </svg></div>
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="text-center md:text-left">
                    <p class="text-surface-300 text-sm font-medium mb-1 flex items-center justify-center md:justify-start gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wallet w-4 h-4" aria-hidden="true">
                            <path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"></path>
                            <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path>
                        </svg> Saldo Dompet Aktif</p>
                    <h1 class="text-4xl font-extrabold tracking-tight"><?= number_format($user['balance'], 0, ',', '.') ?></h1>
                </div>
                <div class="flex gap-3">
                    <button @click="showPenarikan = true; showBuatTagihan = false" type="button" class="bg-white/10 backdrop-blur-md border border-white/20 text-white px-5 py-2.5 rounded-xl font-bold text-sm flex items-center gap-2 hover:bg-white/20 transition-all active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right w-4 h-4" aria-hidden="true">
                            <path d="M7 7h10v10"></path>
                            <path d="M7 17 17 7"></path>
                        </svg>
                        Tarik Dana
                    </button>
                    <button @click="showBuatTagihan = true; showPenarikan = false" type="button" class="bg-white text-black px-5 py-2.5 rounded-xl font-bold text-sm flex items-center gap-2 hover:bg-surface-50 transition-all shadow-lg shadow-white/10 active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4" aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="M12 5v14"></path>
                        </svg>
                        Buat Tagihan
                    </button>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            <div class="xl:col-span-2 space-y-6">
                <!--penarikan-->
                <div x-cloak x-show="showPenarikan" x-transition class="bg-white border border-surface-200 rounded-2xl shadow-lg shadow-surface-200/20 overflow-hidden" style="opacity: 1; height: auto;">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-lg flex items-center gap-2 text-surface-900">
                                <div class="p-1.5 bg-red-50 rounded-lg text-red-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right w-4 h-4" aria-hidden="true">
                                        <path d="M7 7h10v10"></path>
                                        <path d="M7 17 17 7"></path>
                                    </svg></div>Penarikan Dana
                            </h3>
                            <button @click="showPenarikan = false" class="text-surface-400 hover:text-surface-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-5 h-5" aria-hidden="true">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg></button>
                        </div>

                        <form id="formPenarikan" action="<?= site_url('dashboard/disbursement/create/withdraw') ?>" method="post" class="space-y-5" @submit.prevent="showConfirmPenarikan = true">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- <div class="space-y-1"><label class="text-xs font-bold text-surface-600 uppercase">Nama Bank</label><input required="" name="bank" x-model="withdrawData.bank" class="w-full p-2.5 bg-surface-50 border border-surface-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all font-medium" placeholder="Contoh: BCA" type="text" value=""></div>-->
                                <div class="space-y-1">
                                    <label class="text-xs font-bold text-surface-600 uppercase">Nama Bank</label>
                                    <select
                                        required
                                        name="bank"
                                        x-model="withdrawData.bank"
                                        class="w-full p-2.5 bg-surface-50 border border-surface-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all font-medium">
                                        <option value="">-- Pilih Bank --</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BRI">BRI</option>
                                        <option value="MANDIRI">MANDIRI</option>
                                        <option value="BNI">BNI</option>
                                        <option value="DANA">DANA</option>
                                        <option value="OVO">OVO</option>
                                        <option value="GOPAY">GOPAY</option>
                                        <option value="SHOPEEPAY">SHOPEEPAY</option>
                                        <option value="LINKAJA">LINKAJA</option>
                                    </select>
                                </div>
                                <div class="space-y-1"><label class="text-xs font-bold text-surface-600 uppercase">Nomor Rekening</label><input required="" name="nomor_rekening" x-model="withdrawData.noRek" class="w-full p-2.5 bg-surface-50 border border-surface-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all font-medium" placeholder="Nomor Rekening Tujuan" type="number" value=""></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="space-y-1"><label class="text-xs font-bold text-surface-600 uppercase">Atas Nama</label><input required="" name="nama_rekening" x-model="withdrawData.nama" class="w-full p-2.5 bg-surface-50 border border-surface-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all font-medium" placeholder="Nama Pemilik Rekening" type="text" value=""></div>
                                <div class="space-y-1"><label class="text-xs font-bold text-surface-600 uppercase">Jumlah Min 50000</label>
                                    <div class="relative"><span class="absolute left-3 top-1/2 -translate-y-1/2 font-bold text-surface-400 text-sm">Rp</span><input required="" name="amount" x-model="withdrawData.jumlah" min="50000" class="w-full p-2.5 pl-9 bg-surface-50 border border-surface-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all font-bold" placeholder="50000" type="number" value=""></div>
                                </div>
                            </div>
                            <div class="flex justify-end pt-2"><button type="submit" class="bg-surface-900 text-white px-6 py-2 rounded-lg font-bold text-sm hover:bg-surface-800 transition-all shadow-lg shadow-surface-900/10 active:scale-95">Kirim Permintaan</button></div>
                        </form>
                    </div>
                </div>
                <!--end penarikan-->
                <!--buat tagihan-->
                <form id="formTagihan" x-cloak x-show="showBuatTagihan" x-transition class="bg-white border border-surface-200 rounded-2xl shadow-lg shadow-surface-200/20 overflow-hidden" style="opacity: 1; height: auto;" action="<?= site_url('dashboard/tagihan/create') ?>" method="post" @submit.prevent="showConfirmTagihan = true">
                    <div class="p-6">
                        <?= csrf_field() ?>
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-lg flex items-center gap-2 text-surface-900">
                                <div class="p-1.5 bg-blue-50 rounded-lg text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card w-4 h-4" aria-hidden="true">
                                        <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                                        <line x1="2" x2="22" y1="10" y2="10"></line>
                                    </svg></div>Buat Tagihan (Invoice)
                            </h3>
                            <button @click="showBuatTagihan = false" class="text-surface-400 hover:text-surface-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-5 h-5" aria-hidden="true">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg></button>
                        </div>
                        <div class="mb-6"><label class="block text-xs font-bold text-surface-600 uppercase mb-2">Pilih Bank</label>
                            <div class="grid grid-cols-4 md:grid-cols-4 gap-2">
                                <?php foreach ($metode as $m): ?>
                                    <button
                                        type="button"
                                        @click="selectedBank = '<?= $m['kode'] ?>'; selectedBankName = '<?= esc($m['nama']) ?>'"
                                        :class="selectedBank === '<?= $m['kode'] ?>'
                ? 'relative p-2 rounded-xl border transition-all flex flex-col items-center justify-center gap-1 h-16 border-primary-300 bg-primary-50 text-primary-700'
                : 'relative p-2 rounded-xl border transition-all flex flex-col items-center justify-center gap-1 h-16 border-surface-200 hover:border-surface-300 hover:bg-surface-50 bg-white'">

                                        <div class="h-6 flex items-center justify-center w-full"></div>
                                        <span class="text-[10px] font-bold text-surface-400">
                                            <?= esc($m['nama']) ?>
                                        </span>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div class="space-y-1"><label class="text-xs font-bold text-surface-600 uppercase">Nama Pelanggan</label><input name="customer_name" x-model="tagihanData.nama" placeholder="Contoh: Budi Santoso" class="w-full p-2.5 bg-surface-50 border border-surface-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all font-medium" type="text" value="" required></div>
                            <div class="space-y-1"><label class="text-xs font-bold text-surface-600 uppercase">WhatsApp Pelanggan</label><input name="customer_whatsapp" x-model="tagihanData.wa" placeholder="08123xxxx" class="w-full p-2.5 bg-surface-50 border border-surface-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all font-medium" type="number" value="" required></div>
                            <div class="space-y-1"><label class="text-xs font-bold text-surface-600 uppercase">Nominal</label>
                                <div class="relative"><span class="absolute left-3 top-1/2 -translate-y-1/2 font-bold text-surface-400 text-sm">Rp</span><input name="amount" x-model="tagihanData.jumlah" min="1000" placeholder="0" class="w-full p-2.5 pl-9 bg-surface-50 border border-surface-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all font-bold" type="number" value="" required></div>
                            </div>
                        </div>
                        <input type="hidden" name="payment_method" :value="selectedBank">
                        <div class="flex justify-end gap-3 pt-2"><button type="submit" :disabled="!selectedBank" :class="!selectedBank ? 'bg-primary-300 text-white px-6 py-2 rounded-lg font-bold text-sm transition-all shadow-none cursor-not-allowed' : 'bg-primary-600 text-white px-6 py-2 rounded-lg font-bold text-sm hover:bg-primary-700 transition-all shadow-lg shadow-primary-500/20 active:scale-95'">Buat Tagihan</button></div>
                    </div>
                </form>
                <!--end buat tagihan-->
                <div class="bg-white border border-surface-200 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-surface-100 bg-surface-50/50 flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-sm text-black uppercase tracking-wide">Tagihan Aktif</h3>
                            <p class="text-slate-600 text-xs mt-0.5">Daftar invoice yang belum dibayar.</p>
                        </div>
                        <span class="bg-surface-200 text-surface-600 text-[10px] font-bold px-2 py-1 rounded-full">
                            <?= count($tagihanAktif) ?>
                        </span>
                    </div>
                    <?php if (!empty($tagihanAktif)): ?>
                        <div class="divide-y divide-surface-100">
                            <?php foreach ($tagihanAktif as $t): ?>
                                <div class="group p-4 flex flex-col sm:flex-row justify-between items-center gap-3 hover:bg-surface-50 transition-all relative">
                                    <div class="absolute left-0 top-0 bottom-0 w-0.5 <?= ($t['status'] === 'paid') ? 'bg-green-500' : 'bg-yellow-400' ?>"></div>
                                    <div class="flex items-center gap-3 w-full sm:w-auto">
                                        <div class="w-10 h-10 rounded-lg border border-surface-100 bg-white flex items-center justify-center p-1.5 shrink-0">
                                            <div class="w-8 h-8 flex items-center justify-center font-bold text-[10px] text-slate-600">
                                                <?= $metode[$t['payment_method']]['nama'] ?> </div>
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-2"><span class="font-bold text-surface-800 text-sm"> <?= $metode[$t['payment_method']]['nama'] ?></span><span class="text-[10px] font-bold px-1.5 py-0.5 rounded-md bg-surface-100 text-surface-600 uppercase"><?= $t['customer_name'] ?></span></div>
                                            <div class="flex items-center gap-1">
                                                <p class="font-mono text-xs text-surface-400 animate-pulse pt-0.5">Invoice #<?= $t['transaction_id'] ?></p>
                                            </div>
                                            <div class="flex items-center gap-2 mt-1 text-[10px] text-surface-400 font-medium"><span> <?= date('d M Y H:i', strtotime($t['created_at'])) ?></span><span class="text-surface-900 font-bold"> Rp <?= number_format($t['amount'], 0, ',', '.') ?></span></div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 w-full sm:w-auto justify-end">
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide border 
                                            <?= ($t['status'] === 'paid')
                                                ? 'bg-green-50 text-green-700 border-green-100'
                                                : 'bg-yellow-50 text-yellow-700 border-yellow-100' ?>">
                                            <?= $t['status'] ?>
                                        </span>
                                        <div class="flex gap-1">
                                            <a href="<?= base_url('invoice/' . $t['transaction_id']) ?>" target="_blank" class="p-2 text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition" title="Lihat Invoice">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send w-3.5 h-3.5" aria-hidden="true">
                                                    <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path>
                                                    <path d="m21.854 2.147-10.94 10.939"></path>
                                                </svg>
                                            </a>
                                            <button
                                                @click="navigator.clipboard.writeText('<?= base_url('invoice/' . $t['transaction_id']) ?>'); showCopySuccess = true; setTimeout(() => showCopySuccess = false, 2000)"
                                                class="p-2 text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-100 transition" title="Salin Link Pembayaran">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card w-3.5 h-3.5" aria-hidden="true">
                                                    <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                                                    <line x1="2" x2="22" y1="10" y2="10"></line>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="flex flex-col items-center justify-center py-10 text-surface-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="w-8 h-8 mb-2 opacity-20">
                                <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                                <line x1="2" x2="22" y1="10" y2="10"></line>
                            </svg>
                            <p class="font-medium text-slate-600 text-sm">
                                Belum ada tagihan aktif.
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <div class="bg-white border border-surface-200 rounded-2xl p-5 shadow-sm h-full flex flex-col">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="font-bold text-sm flex items-center gap-2 text-surface-900 uppercase tracking-wide"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history w-4 h-4 text-surface-400" aria-hidden="true">
                                <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                                <path d="M3 3v5h5"></path>
                                <path d="M12 7v5l4 2"></path>
                            </svg> Riwayat</h3><span class="text-[10px] font-bold text-slate-600 bg-surface-50 px-2 py-1 rounded">5 Terakhir</span>
                    </div>
                    <div class="space-y-4 flex-1">
                        <?php if (empty($disbursement)): ?>
                            <!-- EMPTY STATE -->
                            <div class="text-center py-8">
                                <div class="w-10 h-10 bg-surface-50 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-history w-5 h-5 text-surface-300">
                                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                                        <path d="M3 3v5h5"></path>
                                        <path d="M12 7v5l4 2"></path>
                                    </svg>
                                </div>
                                <p class="text-slate-600 text-xs font-medium">Belum ada transaksi.</p>
                            </div>
                        <?php else: ?>
                            <!-- LIST DISBURSEMENT -->
                            <?php foreach ($disbursement as $d): ?>
                                <div class="flex items-center justify-between p-4 bg-white border border-surface-200 rounded-xl">
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">
                                            <?= $d['type'] ?> Rp<?= number_format($d['amount'], 0, ',', '.') ?>
                                        </p>
                                        <p class="text-xs text-slate-500">
                                            <?= $d['nama_rekening'] ?> • <?= $d['nomor_rekening'] ?>
                                        </p>
                                        <p class="text-[10px] text-slate-400 mt-0.5">
                                            <?= date('d M Y H:i', strtotime($d['created_at'])) ?>
                                        </p>
                                    </div>

                                    <div class="text-right">
                                        <span class="text-xs font-bold px-2 py-1 rounded-full
                        <?php if ($d['status'] === 'gagal'): ?>
                            bg-yellow-100 text-yellow-700
                        <?php elseif ($d['status'] === 'sukses'): ?>
                            bg-green-100 text-green-700
                        <?php elseif ($d['status'] === 'proses'): ?>
                            bg-blue-50 text-blue-700
                        <?php else: ?>
                            bg-slate-100 text-slate-600
                        <?php endif; ?>
                    ">
                                            <?= strtoupper($d['status']) ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="mt-6 pt-4 border-t border-surface-100">
                        <a href="<?= base_url('dashboard/riwayat-disbursement') ?>" class="w-full py-2.5 rounded-lg border border-dashed border-surface-200 text-slate-600 font-bold text-xs hover:border-primary-300 hover:text-primary-600 hover:bg-primary-50 transition-all flex items-center justify-center gap-1.5">
                            Lihat Semua
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-3.5 h-3.5" aria-hidden="true">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Konfirmasi Penarikan -->
        <div x-cloak x-show="showConfirmPenarikan" class="fixed inset-0 z-[999] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showConfirmPenarikan" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-surface-900/60 backdrop-blur-sm transition-opacity" @click="showConfirmPenarikan = false" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div x-show="showConfirmPenarikan" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-surface-200">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-primary-50 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-bold text-surface-900" id="modal-title">Konfirmasi Penarikan</h3>
                                <div class="mt-4 bg-surface-50 rounded-xl p-4 space-y-3">
                                    <div class="flex justify-between border-b border-dashed border-surface-200 pb-2">
                                        <span class="text-xs text-surface-500 uppercase font-bold tracking-wider">Bank</span>
                                        <span class="text-sm font-bold text-surface-900" x-text="withdrawData.bank"></span>
                                    </div>
                                    <div class="flex justify-between border-b border-dashed border-surface-200 pb-2">
                                        <span class="text-xs text-surface-500 uppercase font-bold tracking-wider">No. Rekening</span>
                                        <span class="text-sm font-bold text-surface-900" x-text="withdrawData.noRek"></span>
                                    </div>
                                    <div class="flex justify-between border-b border-dashed border-surface-200 pb-2">
                                        <span class="text-xs text-surface-500 uppercase font-bold tracking-wider">Atas Nama</span>
                                        <span class="text-sm font-bold text-surface-900" x-text="withdrawData.nama"></span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-xs text-surface-500 uppercase font-bold tracking-wider">Nominal</span>
                                        <span class="text-sm font-extrabold text-primary-600">Rp <span x-text="parseInt(withdrawData.jumlah || 0).toLocaleString('id-ID')"></span></span>
                                    </div>
                                </div>
                                <p class="mt-4 text-xs text-surface-500 italic">Pastikan data di atas sudah benar sebelum melanjutkan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-surface-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                        <button type="button" @click="document.getElementById('formPenarikan').submit()" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2.5 bg-primary-600 text-base font-bold text-white hover:bg-primary-700 focus:outline-none transition-all sm:ml-3 sm:w-auto sm:text-sm active:scale-95">Ya, Lanjutkan</button>
                        <button type="button" @click="showConfirmPenarikan = false" class="mt-3 w-full inline-flex justify-center rounded-xl border border-surface-200 shadow-sm px-4 py-2.5 bg-white text-base font-bold text-surface-700 hover:bg-surface-50 focus:outline-none transition-all sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm active:scale-95">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Konfirmasi Tagihan -->
        <div x-cloak x-show="showConfirmTagihan" class="fixed inset-0 z-[999] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showConfirmTagihan" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-surface-900/60 backdrop-blur-sm transition-opacity" @click="showConfirmTagihan = false" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div x-show="showConfirmTagihan" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-surface-200">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-50 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-bold text-surface-900" id="modal-title">Konfirmasi Buat Tagihan</h3>
                                <div class="mt-4 bg-surface-50 rounded-xl p-4 space-y-3">
                                    <div class="flex justify-between border-b border-dashed border-surface-200 pb-2">
                                        <span class="text-xs text-surface-500 uppercase font-bold tracking-wider">Bank</span>
                                        <span class="text-sm font-bold text-surface-900" x-text="selectedBankName || '-'"></span>
                                    </div>
                                    <div class="flex justify-between border-b border-dashed border-surface-200 pb-2">
                                        <span class="text-xs text-surface-500 uppercase font-bold tracking-wider">Pelanggan</span>
                                        <span class="text-sm font-bold text-surface-900" x-text="tagihanData.nama"></span>
                                    </div>
                                    <div class="flex justify-between border-b border-dashed border-surface-200 pb-2">
                                        <span class="text-xs text-surface-500 uppercase font-bold tracking-wider">WhatsApp</span>
                                        <span class="text-sm font-bold text-surface-900" x-text="tagihanData.wa"></span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-xs text-surface-500 uppercase font-bold tracking-wider">Nominal</span>
                                        <span class="text-sm font-extrabold text-blue-600">Rp <span x-text="parseInt(tagihanData.jumlah || 0).toLocaleString('id-ID')"></span></span>
                                    </div>
                                </div>
                                <p class="mt-4 text-xs text-surface-500 italic">Invoice akan dibuat berdasarkan data di atas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-surface-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                        <button type="button" @click="document.getElementById('formTagihan').submit()" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2.5 bg-blue-600 text-base font-bold text-white hover:bg-blue-700 focus:outline-none transition-all sm:ml-3 sm:w-auto sm:text-sm active:scale-95">Ya, Buat Tagihan</button>
                        <button type="button" @click="showConfirmTagihan = false" class="mt-3 w-full inline-flex justify-center rounded-xl border border-surface-200 shadow-sm px-4 py-2.5 bg-white text-base font-bold text-surface-700 hover:bg-surface-50 focus:outline-none transition-all sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm active:scale-95">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Toast for Copy -->
        <template x-teleport="body">
            <div x-show="showCopySuccess"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-4"
                class="fixed bottom-5 right-5 z-[9999] flex items-center bg-green-600 text-white px-6 py-3 rounded-2xl shadow-2xl space-x-3">
                <div class="bg-white/20 p-1 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-sm">Sukses!</h4>
                    <p class="text-[11px] opacity-90">Link Pembayaran berhasil disalin!</p>
                </div>
            </div>
        </template>
    </div>

    <?= $this->endSection() ?>