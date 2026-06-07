<?= $this->extend('template') ?>
<?= $this->section('content') ?>


<div class="min-h-screen bg-[#F1F5F9] font-['Inter'] py-8 md:py-12 px-4 flex justify-center items-start md:items-center">
    <div class="w-full max-w-lg py-8" style="opacity: 1; transform: none;">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center gap-2 mb-2">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check w-5 h-5" aria-hidden="true">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg></div><span class="text-xl font-bold text-slate-900 tracking-tight"><?= $web['web_author'] ?></span>
            </div>
            <p class="text-slate-500 text-sm">Official Payment Gateway</p>
        </div>
        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 overflow-hidden border border-slate-100 relative">
            <div class="h-1.5 w-full <?= ($tagihan['status'] === 'paid' || $tagihan['status'] === 'success') ? 'bg-green-600' : 'bg-blue-600' ?>"></div>
            <div class="p-8">
                <div class="flex justify-center mb-6">
                    <?php if ($tagihan['status'] === 'paid' || $tagihan['status'] === 'success'): ?>
                        <div class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider flex items-center gap-2 bg-green-50 text-green-700 border border-green-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle w-3.5 h-3.5" aria-hidden="true">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>Pembayaran Berhasil
                        </div>
                    <?php else: ?>
                        <div class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider flex items-center gap-2 bg-blue-50 text-blue-700 border border-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-3.5 h-3.5" aria-hidden="true">
                                <path d="M12 6v6l4 2"></path>
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg>Menunggu Pembayaran
                        </div>
                    <?php endif; ?>
                </div>
                <div class="text-center mb-8">
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-wide mb-2">Total Tagihan</p>
                    <div class="flex items-center justify-center gap-1 text-slate-900"><span class="text-2xl font-medium text-slate-400 mt-1">Rp</span><span class="text-5xl font-bold tracking-tight"> <?= number_format($tagihan['total_bayar'], 0, ',', '.') ?></span></div>
                </div>
                <div class="flex items-center justify-between bg-slate-50 rounded-2xl p-5 mb-8 border border-slate-100 relative">
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 bg-white rounded-full border border-slate-200 flex items-center justify-center z-10 text-slate-300"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-4 h-4"
                            aria-hidden="true">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg></div>
                    <div class="w-[45%]">
                        <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Dari Merchant</p>
                        <p class="font-bold text-slate-800 text-sm truncate">
                            <?= $merchant['nama'] ?>
                        </p>
                    </div>
                    <div class="w-[45%] text-right">
                        <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Kepada Pelanggan</p>
                        <p class="font-bold text-slate-800 text-sm truncate">
                            <?= $tagihan['customer_name'] ?>
                        </p>
                    </div>
                </div>
                <div>
                    <div class="border border-slate-200 rounded-2xl overflow-hidden hover:border-blue-400 transition-colors duration-300 group">
                        <div class="bg-slate-50 px-5 py-3 border-b border-slate-100 flex justify-between items-center">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 bg-white rounded border border-slate-200 flex items-center justify-center font-bold text-[10px] text-slate-600">
                                    <?= $metode['nama'] ?>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-700">
                                        <?= $metode['keterangan'] ?>
                                    </p>
                                    <p class="text-[10px] text-slate-400">
                                        <?= $metode['nama'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 text-center bg-white cursor-pointer group">
                            <div>
                                <?php
                                $kategori = $tagihan['kategori'];
                                ?>
                                <?php if ($kategori === 'VA'): ?>
                                    <div class="font-mono text-3xl font-bold text-slate-800 tracking-wider mb-2 group-hover:text-blue-600 transition-colors">
                                        <?= $tagihan['payment_code'] ?>
                                    </div>
                                    <div class="text-xs font-medium transition-colors text-slate-400 group-hover:text-blue-400">Klik nomor untuk menyalin</div>
                                <?php elseif ($kategori === 'EWALLET'): ?>
                                <?php elseif ($kategori === 'QRIS'): ?>
                                    <div class="flex justify-center">
                                        <div class="font-mono text-3xl font-bold text-slate-800 tracking-wider mb-2 group-hover:text-blue-600 transition-colors">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&amp;data=<?= $tagihan['payment_code'] ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <?php if ($kategori === 'VA'): ?>
                        <button class="w-full mt-4 py-3.5 rounded-xl text-sm font-bold shadow-lg shadow-blue-100 transition-all duration-200 flex items-center justify-center gap-2 bg-blue-600 text-white hover:bg-blue-700 hover:shadow-blue-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy w-4 h-4" aria-hidden="true">
                                <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                            </svg>Salin Nomor Virtual Account</button>
                    <?php elseif ($kategori === 'EWALLET'): ?>
                        <a href="<?= $tagihan['payment_code'] ?>" class="block text-center w-full mt-4 py-3.5 rounded-xl text-sm font-bold shadow-lg shadow-green-100 transition-all duration-200 bg-green-600 text-white hover:bg-green-700">
                            Klik Bayar Sekarang
                        </a>
                    <?php elseif ($kategori === 'QRIS'): ?>
                        <?php if ($tagihan['status'] === 'paid'): ?>
                            <div class="block text-center w-full mt-4 py-3.5 rounded-xl text-sm font-bold bg-green-500 text-white shadow-lg shadow-green-100">
                                Pembayaran Anda Berhasil
                            </div>
                        <?php else: ?>
                            <div class="block text-center w-full mt-4 py-3.5 rounded-xl text-sm font-bold shadow-lg shadow-purple-100 transition-all duration-200 bg-purple-600 text-white hover:bg-purple-700">
                                Silahkan Scan QRIS diatas untuk membayar
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if ($tagihan['status'] === 'paid'): ?>
                        <div class="mt-6 flex items-center justify-center gap-2 text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle w-3.5 h-3.5" aria-hidden="true">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg><span class="text-xs font-bold">Terima kasih, pembayaran telah diterima!</span>
                        </div>
                    <?php else: ?>
                        <div class="mt-6 flex items-center justify-center gap-2 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-cw w-3.5 h-3.5 animate-spin" aria-hidden="true">
                                <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
                                <path d="M21 3v5h-5"></path>
                                <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
                                <path d="M8 16H3v5"></path>
                            </svg><span class="text-xs">Menunggu pembayaran otomatis...</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bg-slate-50 p-4 border-t border-slate-100 flex justify-between items-center text-[10px] text-slate-400"><span>ID: <?= $tagihan['transaction_id'] ?></span>
                <div class="flex items-center gap-1.5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check w-3.5 h-3.5"
                        aria-hidden="true">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg><span>Pembayaran Aman</span></div>
            </div>
        </div>
        <div class="text-center mt-8 space-y-2">
            <p class="text-slate-400 text-xs">Jika ada kendala, hubungi <span class="font-bold text-slate-600"><?= strtoupper($merchant['nama']) ?></span></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>