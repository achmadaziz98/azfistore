<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="bg-white rounded-[2.5rem] shadow-xl shadow-surface-200/50 border border-surface-200 p-8 md:p-16 overflow-hidden relative py-8">
    <div class="mb-12 border-b border-surface-100 pb-8 relative z-10">
        <div class="flex items-center space-x-2 text-primary-600 font-bold mb-4 uppercase tracking-wider text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4" aria-hidden="true">
                <path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"></path>
                <path d="M14 2v5a1 1 0 0 0 1 1h5"></path>
                <path d="M10 9H8"></path>
                <path d="M16 13H8"></path>
                <path d="M16 17H8"></path>
            </svg><span>Legal Documents</span></div>
        <h1
            class="text-4xl md:text-6xl font-black mb-6 tracking-tight text-surface-900 leading-tight">Syarat &amp; <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-blue-600">Ketentuan Layanan</span></h1>
        <div class="flex items-center text-surface-500 text-sm font-medium bg-surface-50 w-fit px-4 py-2 rounded-full border border-surface-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-4 h-4 mr-2" aria-hidden="true">
                <path d="M8 2v4"></path>
                <path d="M16 2v4"></path>
                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                <path d="M3 10h18"></path>
            </svg><span>Terakhir Diperbarui: 4 Januari 2026</span></div>
    </div>
    <div class="bg-red-50 border-2 border-red-100 p-8 rounded-3xl mb-16 relative overflow-hidden">
        <div class="absolute top-0 right-0 p-8 opacity-5 pointer-events-none"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-alert w-48 h-48 text-red-600" aria-hidden="true">
                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                <path d="M12 8v4"></path>
                <path d="M12 16h.01"></path>
            </svg></div>
        <div
            class="relative z-10">
            <h3 class="text-2xl font-black text-red-700 mb-4 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert w-8 h-8 mr-3 animate-pulse"
                    aria-hidden="true">
                    <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path>
                    <path d="M12 9v4"></path>
                    <path d="M12 17h.01"></path>
                </svg>PERINGATAN KERAS: ZERO TOLERANCE POLICY</h3>
            <p class="text-red-900/80 text-lg font-medium leading-relaxed mb-6">PT <?= $web['web_author'] ?> Karya Indonesia memiliki kebijakan <strong>Toleransi Nol</strong> terhadap segala bentuk transaksi ilegal. Kami bekerja sama erat dengan PPATK dan Kepolisian Republik Indonesia.</p>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <li class="flex items-center bg-white/60 p-3 rounded-xl text-red-800 font-bold text-sm border border-red-100/50"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban w-5 h-5 mr-2 text-red-600" aria-hidden="true">
                        <path d="M4.929 4.929 19.07 19.071"></path>
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg> Judi Online (Judol)</li>
                <li class="flex items-center bg-white/60 p-3 rounded-xl text-red-800 font-bold text-sm border border-red-100/50"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban w-5 h-5 mr-2 text-red-600" aria-hidden="true">
                        <path d="M4.929 4.929 19.07 19.071"></path>
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg> Pencucian Uang</li>
                <li class="flex items-center bg-white/60 p-3 rounded-xl text-red-800 font-bold text-sm border border-red-100/50"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban w-5 h-5 mr-2 text-red-600" aria-hidden="true">
                        <path d="M4.929 4.929 19.07 19.071"></path>
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg> Narkoba &amp; Obat Terlarang</li>
                <li class="flex items-center bg-white/60 p-3 rounded-xl text-red-800 font-bold text-sm border border-red-100/50"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban w-5 h-5 mr-2 text-red-600" aria-hidden="true">
                        <path d="M4.929 4.929 19.07 19.071"></path>
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg> Penipuan / Fraud</li>
                <li class="flex items-center bg-white/60 p-3 rounded-xl text-red-800 font-bold text-sm border border-red-100/50"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban w-5 h-5 mr-2 text-red-600" aria-hidden="true">
                        <path d="M4.929 4.929 19.07 19.071"></path>
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg> Pendanaan Terorisme</li>
                <li class="flex items-center bg-white/60 p-3 rounded-xl text-red-800 font-bold text-sm border border-red-100/50"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban w-5 h-5 mr-2 text-red-600" aria-hidden="true">
                        <path d="M4.929 4.929 19.07 19.071"></path>
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg> Investasi Bodong</li>
            </ul>
        </div>
    </div>
    <div class="prose prose-lg prose-slate max-w-none text-surface-600">
        <p class="lead text-xl text-surface-500 mb-12 font-medium">Selamat datang di <?= $web['web_author'] ?>. Harap baca Syarat dan Ketentuan ini dengan saksama sebelum menggunakan layanan kami. Penggunaan layanan kami berarti Anda menyetujui seluruh poin di bawah ini tanpa terkecuali.</p>
        <div class="space-y-16">
            <section>
                <h3 class="text-2xl font-black mb-6 text-surface-900 flex items-center"><span class="bg-surface-100 text-surface-900 w-10 h-10 rounded-xl flex items-center justify-center text-lg mr-4 border border-surface-200">1</span>Larangan Transaksi Ilegal</h3>
                <p class="mb-6 leading-relaxed">Pengguna DILARANG KERAS menggunakan layanan <?= $web['web_author'] ?> (baik Mutasi Bank maupun Payment Gateway) untuk memfasilitasi pembayaran yang berkaitan dengan aktivitas melanggar hukum di Indonesia.</p>
                <div class="bg-surface-50 p-6 rounded-2xl border border-surface-200">
                    <h5 class="font-bold text-surface-900 mb-2 flex items-center text-base"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gavel w-5 h-5 mr-2 text-surface-400"
                            aria-hidden="true">
                            <path d="m14 13-8.381 8.38a1 1 0 0 1-3.001-3l8.384-8.381"></path>
                            <path d="m16 16 6-6"></path>
                            <path d="m21.5 10.5-8-8"></path>
                            <path d="m8 8 6-6"></path>
                            <path d="m8.5 7.5 8 8"></path>
                        </svg> Konsekuensi Pelanggaran</h5>
                    <p
                        class="text-sm">Jika sistem kami atau pihak berwenang mendeteksi indikasi transaksi ilegal pada akun Anda, maka:</p>
                    <ul class="list-decimal pl-5 mt-3 space-y-2 text-sm font-bold text-surface-700">
                        <li>Akun Anda akan di-banned secara permanen (Permanent Ban).</li>
                        <li class="text-red-600">Seluruh dana yang ada di dalam saldo Gateway/Akun akan DITAHAN SELAMANYA (Frozen Funds) dan tidak dapat dicairkan dengan alasan apapun.</li>
                        <li>Data Anda akan diserahkan kepada pihak kepolisian dan PPATK untuk proses hukum lebih lanjut.</li>
                    </ul>
                </div>
            </section>
            <section>
                <h3 class="text-2xl font-black mb-6 text-surface-900 flex items-center"><span class="bg-surface-100 text-surface-900 w-10 h-10 rounded-xl flex items-center justify-center text-lg mr-4 border border-surface-200">2</span>Penerimaan Syarat</h3>
                <p class="leading-relaxed">Dengan mendaftar, mengakses, atau menggunakan layanan PT <?= $web['web_author'] ?> Karya Indonesia ("Layanan"), Anda menyatakan bahwa Anda telah membaca, memahami, dan setuju untuk terikat oleh Syarat dan Ketentuan ini ("Syarat"). Jika Anda tidak setuju dengan
                    Syarat ini, Anda tidak diperkenankan menggunakan Layanan kami.</p>
            </section>
            <section>
                <h3 class="text-2xl font-black mb-6 text-surface-900 flex items-center"><span class="bg-surface-100 text-surface-900 w-10 h-10 rounded-xl flex items-center justify-center text-lg mr-4 border border-surface-200">3</span>Deskripsi Layanan</h3>
                <p class="leading-relaxed mb-4"><?= $web['web_author'] ?> menyediakan layanan otomasisasi verifikasi mutasi bank dan payment gateway.</p>
                <div class="bg-blue-50 border border-blue-100 p-6 rounded-2xl">
                    <p class="text-sm text-blue-800 font-medium leading-relaxed"><strong>Disclaimer:</strong> Untuk layanan "Cek Mutasi", kami hanya bertindak sebagai pembaca notifikasi (reader). Kami tidak memegang kendali atas rekening bank pribadi Anda. Segala penyalahgunaan rekening pribadi untuk kegiatan ilegal
                        adalah tanggung jawab penuh pemilik rekening.</p>
                </div>
            </section>
            <section>
                <h3 class="text-2xl font-black mb-6 text-surface-900 flex items-center"><span class="bg-surface-100 text-surface-900 w-10 h-10 rounded-xl flex items-center justify-center text-lg mr-4 border border-surface-200">4</span>Pembayaran &amp; Refund</h3>
                <p class="leading-relaxed">Layanan kami menggunakan sistem kredit koin (Prepaid). Koin yang sudah dibeli <span class="font-bold underline">tidak dapat diuangkan kembali (non-refundable)</span> kecuali disebabkan oleh kesalahan sistem fatal dari pihak kami yang menyebabkan
                    layanan tidak dapat digunakan sama sekali selama &gt; 24 jam.</p>
            </section>
            <section>
                <h3 class="text-2xl font-black mb-6 text-surface-900 flex items-center"><span class="bg-surface-100 text-surface-900 w-10 h-10 rounded-xl flex items-center justify-center text-lg mr-4 border border-surface-200">5</span>Hukum yang Berlaku</h3>
                <p class="leading-relaxed mb-4">Syarat dan Ketentuan ini diatur oleh dan ditafsirkan sesuai dengan hukum Republik Indonesia. Setiap sengketa yang timbul akan diselesaikan melalui yurisdiksi pengadilan di wilayah Republik Indonesia.</p>
                <div class="flex items-center text-xs font-bold text-surface-400 bg-surface-50 p-2 rounded-lg w-fit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scale w-4 h-4 mr-2" aria-hidden="true">
                        <path d="M12 3v18"></path>
                        <path d="m19 8 3 8a5 5 0 0 1-6 0zV7"></path>
                        <path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"></path>
                        <path d="m5 8 3 8a5 5 0 0 1-6 0zV7"></path>
                        <path d="M7 21h10"></path>
                    </svg><span>Yurisdiksi: Pengadilan Negeri Cibinong</span></div>
            </section>
        </div>
        <div class="mt-20 p-8 bg-surface-900 rounded-[2rem] text-white relative overflow-hidden">
            <div class="relative z-10">
                <h4 class="text-xl font-bold mb-4">Kontak Legal &amp; Kepatuhan</h4>
                <p class="text-surface-300 mb-6 text-sm leading-relaxed max-w-lg">Jika Anda menemukan indikasi penyalahgunaan layanan kami oleh merchant/pengguna lain, harap segera laporkan kepada kami. Identitas pelapor akan kami rahasiakan.</p>
                <div class="flex flex-col space-y-1 text-sm font-mono text-primary-300">
                    <p>PT <?= $web['web_author'] ?> Karya Indonesia</p>
                    <p>legal@<?= $web['web_author'] ?>.id</p>
                    <p class="text-primary-300">+<?= $web['whatsapp_admin'] ?> (WhatsApp)</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>