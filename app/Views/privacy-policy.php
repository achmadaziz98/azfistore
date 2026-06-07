<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="bg-white rounded-[2.5rem] shadow-xl shadow-surface-200/50 border border-surface-200 p-8 md:p-16 overflow-hidden relative py-8"">
    <div class=" mb-12 border-b border-surface-100 pb-8 relative z-10">
    <div class="flex items-center space-x-2 text-primary-600 font-bold mb-4 uppercase tracking-wider text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-4 h-4" aria-hidden="true">
            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
        </svg><span>Data Protection &amp; Privacy</span></div>
    <h1
        class="text-4xl md:text-6xl font-black mb-6 tracking-tight text-surface-900 leading-tight">Kebijakan <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-blue-600">Privasi Data</span></h1>
    <p class="text-lg text-surface-500 leading-relaxed font-medium max-w-2xl">Kepercayaan Anda adalah aset terbesar kami. Dokumen ini menjelaskan transparansi penuh tentang bagaimana kami mengelola, mengenkripsi, dan melindungi data sensitif Anda.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
    <div class="p-6 bg-surface-50 rounded-3xl border border-surface-100 hover:shadow-lg transition-all">
        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center mb-4 text-primary-600 border border-surface-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock w-5 h-5" aria-hidden="true">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg></div>
        <h4
            class="font-bold text-surface-900 mb-2">AES-256 Encryption</h4>
        <p class="text-xs text-surface-500 leading-relaxed">Seluruh data sensitif (API Key, Token) dienkripsi dengan standar militer/perbankan saat transit maupun rest.</p>
    </div>
    <div class="p-6 bg-surface-50 rounded-3xl border border-surface-100 hover:shadow-lg transition-all">
        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center mb-4 text-blue-600 border border-surface-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-5 h-5" aria-hidden="true">
                <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg></div>
        <h4
            class="font-bold text-surface-900 mb-2">Strict Access</h4>
        <p class="text-xs text-surface-500 leading-relaxed">Kami hanya membaca email dari bank resmi. Sistem kami buta terhadap email pribadi Anda lainnya.</p>
    </div>
    <div class="p-6 bg-surface-50 rounded-3xl border border-surface-100 hover:shadow-lg transition-all">
        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center mb-4 text-green-600 border border-surface-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-server w-5 h-5" aria-hidden="true">
                <rect width="20" height="8" x="2" y="2" rx="2" ry="2"></rect>
                <rect width="20" height="8" x="2" y="14" rx="2" ry="2"></rect>
                <line x1="6" x2="6.01" y1="6" y2="6"></line>
                <line x1="6" x2="6.01" y1="18" y2="18"></line>
            </svg></div>
        <h4
            class="font-bold text-surface-900 mb-2">Data Sovereignty</h4>
        <p class="text-xs text-surface-500 leading-relaxed">Server kami berlokasi di Indonesia, mematuhi regulasi UU PDP (Pelindungan Data Pribadi).</p>
    </div>
</div>
<div class="prose prose-lg prose-slate max-w-none text-surface-600">
    <div class="space-y-12">
        <section>
            <h3 class="text-2xl font-black mb-4 text-surface-900 flex items-center group"><span class="bg-surface-100 text-surface-900 w-8 h-8 rounded-lg flex items-center justify-center text-sm mr-4 border border-surface-200 group-hover:bg-primary-600 group-hover:text-white transition-colors">1</span>Data yang Kami Kumpulkan</h3>
            <p
                class="leading-relaxed mb-4">Untuk menjalankan layanan verifikasi pembayaran otomatis (Mutasi &amp; Gateway), kami mengumpulkan data terbatas berikut:</p>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 list-none pl-0">
                <li class="bg-white border border-surface-200 p-4 rounded-2xl text-sm">
                    <div class="font-bold text-surface-900 mb-1 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-check w-4 h-4 mr-2 text-primary-500"
                            aria-hidden="true">
                            <path d="m16 11 2 2 4-4"></path>
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                        </svg> Identitas Dasar</div>Nama, Email, Nomor Telepon (WA) untuk notifikasi
                    sistem.
                </li>
                <li class="bg-white border border-surface-200 p-4 rounded-2xl text-sm">
                    <div class="font-bold text-surface-900 mb-1 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-key w-4 h-4 mr-2 text-primary-500"
                            aria-hidden="true">
                            <path d="M10.65 22H18a2 2 0 0 0 2-2V8a2.4 2.4 0 0 0-.706-1.706l-3.588-3.588A2.4 2.4 0 0 0 14 2H6a2 2 0 0 0-2 2v10.1"></path>
                            <path d="M14 2v5a1 1 0 0 0 1 1h5"></path>
                            <path d="m10 15 1 1"></path>
                            <path d="m11 14-4.586 4.586"></path>
                            <circle cx="5" cy="20" r="2"></circle>
                        </svg> Data Transaksi</div>Nominal, Berita Transfer, Tanggal Transaksi (dari notifikasi Bank).
                </li>
            </ul>
        </section>
        <section>
            <h3 class="text-2xl font-black mb-4 text-surface-900 flex items-center group"><span class="bg-surface-100 text-surface-900 w-8 h-8 rounded-lg flex items-center justify-center text-sm mr-4 border border-surface-200 group-hover:bg-primary-600 group-hover:text-white transition-colors">2</span>Kepatuhan Google API (Limited
                Use)</h3>
            <p class="leading-relaxed bg-blue-50 p-6 rounded-2xl border border-blue-100 text-blue-900 text-sm">Penggunaan informasi yang diterima dari API Google oleh <?= $web['web_author'] ?> mematuhi <a href="https://developers.google.com/terms/api-services-user-data-policy" target="_blank" class="font-bold underline hover:text-blue-600">Google API Services User Data Policy</a>,
                termasuk persyaratan penggunaan terbatas (Limited Use).</p>
            <p class="mt-4 text-sm font-medium">Akses Gmail kami dibatasi secara ketat hanya untuk:</p>
            <ul class="list-disc pl-5 space-y-2 mt-2 text-sm">
                <li>Memfilter pesan dari <strong>sender resmi bank</strong> (cth: klikbca/mandiri).</li>
                <li>Mengekstrak <strong>hanya angka nominal &amp; deskripsi</strong> untuk pencocokan invoice.</li>
                <li>Kami <strong>TIDAK DAN TIDAK AKAN PERNAH</strong> membaca email pribadi komunikasi Anda.</li>
            </ul>
        </section>
        <section>
            <h3 class="text-2xl font-black mb-4 text-surface-900 flex items-center group"><span class="bg-surface-100 text-surface-900 w-8 h-8 rounded-lg flex items-center justify-center text-sm mr-4 border border-surface-200 group-hover:bg-primary-600 group-hover:text-white transition-colors">3</span>Penggunaan &amp; Pembagian
                Data</h3>
            <p class="leading-relaxed">Kami memegang teguh prinsip <strong>NO DATA SELLING</strong>. Data transaksi Anda adalah milik Anda. Kami menggunakannya hanya untuk melayani request API Anda (cek status pembayaran). Kami tidak membagikan data data finansial Anda ke pihak
                ketiga manapun untuk tujuan pemasaran.</p>
        </section>
        <section>
            <h3 class="text-2xl font-black mb-4 text-surface-900 flex items-center group"><span class="bg-surface-100 text-surface-900 w-8 h-8 rounded-lg flex items-center justify-center text-sm mr-4 border border-surface-200 group-hover:bg-primary-600 group-hover:text-white transition-colors">4</span>Hak Anda (UU PDP)</h3>
            <p
                class="leading-relaxed mb-4">Sesuai regulasi di Indonesia, Anda berhak untuk:</p>
            <ul class="list-disc pl-5 space-y-2 text-sm leading-relaxed">
                <li><strong>Right to Access:</strong> Meminta salinan seluruh data yang kami simpan.</li>
                <li><strong>Right to Erasure:</strong> Meminta penghapusan permanen akun dan data (Right to be Forgotten).</li>
                <li><strong>Right to Rectification:</strong> Mengoreksi data yang salah.</li>
            </ul>
        </section>
        <div class="mt-12 p-8 bg-surface-900 rounded-[2rem] text-white relative overflow-hidden group">
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h4 class="text-xl font-bold mb-2 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact w-5 h-5 mr-2" aria-hidden="true">
                            <path d="M16 2v2"></path>
                            <path d="M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"></path>
                            <path d="M8 2v2"></path>
                            <circle cx="12" cy="11" r="3"></circle>
                            <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                        </svg> Data Privacy Officer</h4>
                    <p class="text-surface-300 text-sm leading-relaxed max-w-md">Jika Anda memiliki kekhawatiran tentang privasi Anda atau ingin menggunakan hak penghapusan data, hubungi kami langsung.</p>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-black text-white">+<?= $web['whatsapp_admin'] ?></p>
                    <p class="text-surface-400 font-mono text-sm">privacy@<?= $web['web_author'] ?>.id</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>