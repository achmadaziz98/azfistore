<?= $this->extend('template') ?>
<?= $this->section('content') ?>


<!-- Content Wrapper -->
<div class="relative z-10 flex flex-col h-full" x-data="{ 
    loading: false, 
    showModal: <?= session()->getFlashdata('error') || session()->getFlashdata('success') ? 'true' : 'false' ?>,
    modalType: '<?= session()->getFlashdata('success') ? 'success' : 'error' ?>',
    modalTitle: '<?= session()->getFlashdata('success') ? 'Berhasil' : 'Opps!' ?>',
    modalMessage: '<?= session()->getFlashdata('success') ?: session()->getFlashdata('error') ?>'
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
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-slate-900 mb-2">
                    Lupa Password?
                </h1>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Masukkan alamat email yang terdaftar untuk menerima kode OTP
                    verifikasi reset password.
                </p>
            </div>

            <form action="<?= base_url('validasi-reset-password') ?>" method="POST" class="space-y-6" @submit="loading = true">
                <?= csrf_field() ?>

                <div class="space-y-2">
                    <label for="email" class="text-sm font-medium text-slate-700">Email Address</label>
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
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="block w-full pl-11 pr-4 py-3.5 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all font-medium text-sm"
                            placeholder="nama@email.com"
                            required />
                    </div>
                </div>

                <button
                    type="submit"
                    :disabled="loading"
                    class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-primary-600/20 text-sm font-bold text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all hover:-translate-y-0.5 disabled:opacity-70 disabled:cursor-not-allowed">
                    <template x-if="!loading">
                        <div class="flex items-center">
                            Kirim Kode OTP
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
                        </div>
                    </template>
                    <template x-if="loading">
                        <div class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Memproses...
                        </div>
                    </template>
                </button>

            </form>
        </div>
    </div>

    <div class="p-6 text-center text-xs text-slate-400">
        &copy; 2026 <?= $web['web_author'] ?> Indonesia.
    </div>

    <!-- Special Modal -->
    <div
        x-show="showModal"
        class="fixed inset-0 z-[100] overflow-y-auto"
        x-cloak>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay -->
            <div
                x-show="showModal"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-slate-900/60 backdrop-blur-sm"
                @click="showModal = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Modal Content -->
            <div
                x-show="showModal"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-sm p-8 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-2xl rounded-3xl sm:align-middle border border-slate-100">
                
                <div class="text-center">
                    <!-- Success Icon -->
                    <template x-if="modalType === 'success'">
                        <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-50 mb-6">
                            <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center">
                                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                    </template>

                    <!-- Error Icon -->
                    <template x-if="modalType === 'error'">
                        <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-red-50 mb-6">
                            <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center">
                                <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                        </div>
                    </template>

                    <h3 class="text-xl font-bold text-slate-900 mb-2" x-text="modalTitle"></h3>
                    <p class="text-sm text-slate-500 mb-8 leading-relaxed" x-text="modalMessage"></p>

                    <button
                        @click="showModal = false"
                        class="w-full inline-flex justify-center px-6 py-3 text-sm font-bold text-white transition-all rounded-xl shadow-lg ring-1 shadow-primary-600/20 focus:outline-none focus:ring-2 focus:ring-offset-2 hover:-translate-y-0.5"
                        :class="modalType === 'success' ? 'bg-green-600 hover:bg-green-700 ring-green-500/30' : 'bg-primary-600 hover:bg-primary-700 ring-primary-500/30'">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>