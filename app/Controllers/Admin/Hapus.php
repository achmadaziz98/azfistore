<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\MetodeModel;
use App\Models\ProviderModel;
use App\Models\DisbursementModel;
use App\Models\TransaksiModel;
use App\Models\TagihanModel;
use App\Controllers\BaseController;

class Hapus extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }


    public function hapusMetode($id)
    {
        if (! session()->get('isLogin')) {
            return redirect()->to('/masuk');
        }

        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $model = new MetodeModel();
        $model->delete($id);
        return redirect()->to('admin/metode')->with('success', 'Metode berhasil dihapus.');
    }

    public function hapusUser($id)
    {
        if (! session()->get('isLogin')) {
            return redirect()->to('/masuk');
        }

        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('admin/user')->with('success', 'User berhasil dihapus.');
    }

    public function hapusDisbursement($id)
    {
        if (! session()->get('isLogin')) {
            return redirect()->to('/masuk');
        }

        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $model = new DisbursementModel();
        $model->delete($id);
        return redirect()->to('admin/disbursement')->with('success', 'Penarikan dana berhasil dihapus.');
    }

    public function hapusProvider($id)
    {
        if (! session()->get('isLogin')) {
            return redirect()->to('/masuk');
        }

        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $model = new ProviderModel();
        $model->delete($id);
        return redirect()->to('admin/provider')->with('success', 'Provider berhasil dihapus.');
    }


    public function hapustransactions($id)
    {
        if (! session()->get('isLogin')) {
            return redirect()->to('/masuk');
        }

        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $model = new TransaksiModel();
        $model->delete($id);
        return redirect()->to('admin/transactions')->with('success', 'Transaksi berhasil dihapus.');
    }


    public function hapusTagihan($id)
    {
        if (! session()->get('isLogin')) {
            return redirect()->to('/masuk');
        }

        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $model = new TagihanModel();
        $model->delete($id);
        return redirect()->to('admin/tagihan')->with('success', 'Tagihan berhasil dihapus.');
    }
}
