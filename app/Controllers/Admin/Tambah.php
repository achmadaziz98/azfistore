<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\MetodeModel;
use App\Models\ProviderModel;
use App\Controllers\BaseController;

class Tambah extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }


    public function tambahMetode()
    {
        if (! session()->get('isLogin')) {
            return redirect()->to('/masuk');
        }

        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        if ($this->request->getMethod() === 'post') {
            $model = new MetodeModel();
            $data = [
                'nama' => $this->request->getPost('nama'),
                'keterangan' => $this->request->getPost('keterangan'),
                'kode' => $this->request->getPost('kode'),
                'pajak_persen' => $this->request->getPost('pajak_persen'),
            ];

            $model->insert($data);
            return redirect()->to('admin/metode')->with('success', 'Metode pembayaran berhasil ditambahkan.');
        }
        return redirect()->to('admin/metode');
    }

    public function tambahUser()
    {
        if (! session()->get('isLogin')) {
            return redirect()->to('/masuk');
        }

        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $data = [
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'whatsapp' => $this->request->getPost('whatsapp'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role' => $this->request->getPost('role'),
                'balance' => $this->request->getPost('balance') ?? 0,
                'api_key' => bin2hex(random_bytes(16)),
            ];

            $model->insert($data);
            return redirect()->to('admin/user')->with('success', 'User berhasil ditambahkan.');
        }
        return redirect()->to('admin/user');
    }
}
