<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<!-- Content Wrapper -->
<div class="relative z-10 flex flex-col h-full"
    x-data="{ 
        showModal: <?= session()->getFlashdata('error') || session()->getFlashdata('success') ? 'true' : 'false' ?>,
        message: '<?= session()->getFlashdata('error') ?: session()->getFlashdata('success') ?>',
        type: '<?= session()->getFlashdata('error') ? 'error' : 'success' ?>'
     }">

    <!-- Header / Back Button -->
    <div class="max-w-md mx-auto w-full px-6 pt-8 pb-4">
        <a
            href="<?= base_url('masuk') ?>"
            class="inline-flex items-center text-primary-100 hover:text-white transition-colors text-sm font-medium group">
            <svg
                class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Login
        </a>
    </div>

    <!-- Modal Notification -->
    <template x-if="showModal">
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Backdrop -->
            <div x-show="showModal"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>

            <!-- Modal Content -->
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div x-show="showModal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative transform overflow-hidden rounded-3xl bg-white p-8 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-sm">

                    <div class="text-center">
                        <!-- Icon -->
                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl mb-6"
                            :class="type === 'error' ? 'bg-red-50 text-red-500' : 'bg-green-50 text-green-500'">
                            <template x-if="type === 'error'">
                                <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                            </template>
                            <template x-if="type === 'success'">
                                <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </template>
                        </div>

                        <!-- Text Content -->
                        <h3 class="text-xl font-bold text-slate-900 mb-2" id="modal-title"
                            x-text="type === 'error' ? 'Ada Masalah!' : 'Berhasil!'"></h3>
                        <p class="text-sm text-slate-500 mb-8" x-text="message"></p>

                        <!-- Close Button -->
                        <button @click="showModal = false" type="button"
                            class="w-full inline-flex justify-center rounded-xl px-4 py-3 text-sm font-bold text-white shadow-lg transition-all active:scale-95"
                            :class="type === 'error' ? 'bg-red-500 hover:bg-red-600 shadow-red-500/20' : 'bg-green-500 hover:bg-green-600 shadow-green-500/20'">
                            Mengerti
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- Main Card Container -->
    <div class="flex-1 flex items-center justify-center p-6">
        <div
            class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 w-full max-w-md p-8 md:p-10 border border-slate-100">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-primary-50 text-primary-600 mb-4">
                    <svg
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-slate-900 mb-2">
                    Reset Password
                </h1>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Silakan masukkan kata sandi baru Anda untuk mengamankan akun.
                </p>
            </div>

            <form action="<?= base_url('validasi-new-password') ?>" method="POST" class="space-y-6">
                <!-- New Password -->
                <div class="space-y-2">
                    <label for="password" class="text-sm font-medium text-slate-700">Kata Sandi Baru</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg
                                class="h-5 w-5 text-slate-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="block w-full pl-11 pr-4 py-3.5 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-sm"
                            placeholder="Kata sandi baru"
                            required />
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <label for="password_confirm" class="text-sm font-medium text-slate-700">Konfirmasi Kata Sandi</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg
                                class="h-5 w-5 text-slate-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <input
                            type="password"
                            id="password_confirm"
                            name="password_confirm"
                            class="block w-full pl-11 pr-4 py-3.5 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-sm"
                            placeholder="Konfirmasi kata sandi"
                            required />
                    </div>
                </div>

                <button
                    type="submit"
                    class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-primary-600/20 text-sm font-bold text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all hover:-translate-y-0.5">
                    Reset Password Sekarang
                    <svg
                        class="ml-2 -mr-1 w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <div class="p-6 text-center text-xs text-slate-400">
        &copy; 2026 <?= $web['web_author'] ?> Indonesia.
    </div>
</div>
<?= $this->endSection() ?>