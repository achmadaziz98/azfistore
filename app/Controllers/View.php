<?php

namespace App\Controllers;

use App\Models\TagihanModel;
use App\Models\UserModel;
use App\Models\MetodeModel;

class View extends BaseController
{
    public function index()
    {
        return $this->renderView('index');
    }

    public function termsOfService()
    {
        return $this->renderView('terms-of-service');
    }

    public function privacyPolicy()
    {
        return $this->renderView('privacy-policy');
    }

    public function tagihan(string $transactionId)
    {
        $tagihanModel = new TagihanModel();
        $userModel    = new UserModel();
        $metodeModel  = new MetodeModel();

        $tagihan = $tagihanModel
            ->where('transaction_id', $transactionId)
            ->first();

        if (! $tagihan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $merchant = $userModel->find($tagihan['user_id']);

        // ambil metode berdasarkan kode (payment_method)
        $metode = $metodeModel
            ->where('kode', $tagihan['payment_method'])
            ->first();

        return $this->renderView('invoice', [
            'web'              => $this->getSettingsData(),
            'tagihan'  => $tagihan,
            'merchant' => $merchant,
            'metode'   => $metode,
        ]);
    }
}
