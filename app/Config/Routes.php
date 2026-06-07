<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->post('callback', 'Callback::heandle');

// User routes
$routes->group('dashboard', ['namespace' => 'App\Controllers\User'], function ($routes) {
    $routes->get('/', 'View::dashboard');
    $routes->get('profile', 'View::Profile');
    $routes->get('disbursement', 'View::disbursement');
    $routes->get('riwayat-disbursement', 'View::riwayatDisbursement');
    $routes->get('riwayat-disbursement/detail/(:any)', 'View::disbursementDetail/$1');
    $routes->get('transactions', 'View::transactions');
    $routes->get('transactions/detail/(:any)', 'View::transactionDetail/$1');
    $routes->get('api-docs', 'View::dokumentasi');
    $routes->get('wallet', 'View::dompet');
    $routes->get('merchant', 'View::merchant');
    $routes->post('profile/update', 'Update::updateProfil');
    $routes->post('resend-callback', 'View::resendCallback');
    $routes->post('profile/update/password', 'Update::updatePassword');
    $routes->post('tagihan/create', 'View::createTagihan');
    $routes->post('disbursement/create', 'View::createDisbursement');
    $routes->post('disbursement/create/withdraw', 'View::createWithdraw');
    $routes->post('merchant/regenerate-key', 'Update::regenerateKey');
    $routes->post('merchant/update', 'Update::updateMerchant');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    // Views
    $routes->get('dashboard', 'View::dashboard');
    $routes->get('metode', 'View::metode');
    $routes->get('provider', 'View::provider');
    $routes->get('website', 'View::website');
    $routes->get('user', 'View::user');
    $routes->get('disbursement', 'View::disbursement');
    $routes->get('tagihan', 'View::tagihan');
    $routes->get('transactions', 'View::transactions');
    $routes->get('user/edit/(:any)', 'View::editUser/$1');
    $routes->get('metode/edit/(:any)', 'View::editMetode/$1');
    $routes->get('provider/edit/(:any)', 'View::editProvider/$1');
    $routes->get('disbursement/edit/(:any)', 'View::editDisbursement/$1');
    $routes->get('tagihan/edit/(:any)', 'View::editTagihan/$1');
    $routes->get('transactions/edit/(:any)', 'View::editTransaksi/$1');

    $routes->get('/transactions/getData', 'View::getTransaksiData');
    $routes->get('/transactions/detail/(:any)', 'View::detail/$1');


    // Update
    $routes->post('disbursement/update', 'Update::updateDisbursement');
    $routes->post('tagihan/update', 'Update::updateTagihan');
    $routes->post('transactions/update', 'Update::updatetransactions');
    $routes->post('website/update', 'Update::updateWebsite');
    $routes->post('provider/update/(:num)', 'Update::updateProvider/$1');
    $routes->post('metode/update/(:num)', 'Update::updateMetode/$1');
    $routes->post('user/update/(:num)', 'Update::updateUser/$1');


    // Hapus
    $routes->get('metode/hapus/(:segment)', 'Hapus::hapusMetode/$1');
    $routes->get('user/hapus/(:segment)', 'Hapus::hapusUser/$1');
    $routes->get('disbursement/hapus/(:segment)', 'Hapus::hapusDisbursement/$1');
    $routes->get('tagihan/hapus/(:segment)', 'Hapus::hapusTagihan/$1');
    $routes->get('provider/hapus/(:segment)', 'Hapus::hapusProvider/$1');
    $routes->get('transactions/hapus/(:segment)', 'Hapus::hapustransactions/$1');


    // Tambah
    $routes->post('metode/tambah', 'Tambah::tambahMetode');
    $routes->post('user/tambah', 'Tambah::tambahUser');
});

$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    // Views
    $routes->get('/', 'View::index');
    $routes->get('invoice/(:any)', 'View::tagihan/$1');
    $routes->get('terms-of-service', 'View::termsOfService');
    $routes->get('privacy-policy', 'View::privacyPolicy');
});

$routes->group('', ['namespace' => 'App\Controllers\Autentikasi'], function ($routes) {
    $routes->get('masuk', 'Autentikasi::getLogin');
    $routes->post('masuk/validasi', 'Autentikasi::masuk');
    $routes->get('daftar', 'Autentikasi::getDaftar');
    $routes->post('daftar/validasi', 'Autentikasi::daftar');
    $routes->get('reset-password', 'Autentikasi::resetPassword');
    $routes->post('validasi-reset-password', 'Autentikasi::validasiResetPassword');
    $routes->get('verifikasi-otp', 'Autentikasi::otp');
    $routes->post('validasi-otp', 'Autentikasi::validasiOtp');
    $routes->get('new-password', 'Autentikasi::newPassword');
    $routes->post('validasi-new-password', 'Autentikasi::validasiNewPassword');
    $routes->get('logout', 'Autentikasi::logout');
});

/*
$routes->group('api', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('order', 'Api::ApiOrder');
    $routes->add('merchant', 'Api::ApiMerchant');
    $routes->add('disbursement', 'Api::ApiDisbursement');
}); 
*/
$routes->group('api', function ($routes) {
    $routes->post('payment', 'Api::ApiPayment');
    $routes->post('merchant', 'Api::ApiMerchant');
    $routes->post('disbursement', 'Api::ApiDisbursement');
    $routes->post('status', 'Api::ApiStatus');
});

$routes->group('sistem', ['namespace' => 'App\Controllers\Sistem'], function ($routes) {
    // GET
    $routes->get('payment-queue', 'Sistem::processQueue');
    $routes->get('cek-disbursement', 'Sistem::cekStatusTopupku');
});
