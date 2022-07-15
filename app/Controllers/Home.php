<?php

namespace App\Controllers;

use App\Models\Perpustakaan;

class Home extends BaseController
{
    function __construct()
    {
        $this->perpustakaan = new Perpustakaan();    
    }

    public function index()
    {
        return view('home');
    }


    public function member()
    {
        $getPerpus = $this->perpustakaan->findAll();

        $data = [
            'members'   => $getPerpus,
        ];

        return view('member', $data);
    }

    public function daftar_baru()
    {
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $hp = $this->request->getPost('hp');
        $alamat = $this->request->getPost('alamat');
        $status_member = $this->request->getPost('status_member');

        $data = [
            'nama_lengkap'  => $nama_lengkap,
            'hp'            => $hp,
            'alamat'        => $alamat,
            'status_member' => $status_member,
        ];

        $this->perpustakaan->insert($data);

        session()->setFlashdata('message', 'Data berhasil ditambahkan.');
        return redirect()->to('/member');
    }

    public function edit_member()
    {
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $hp = $this->request->getPost('hp');
        $alamat = $this->request->getPost('alamat');
        $status_member = $this->request->getPost('status_member');
        $id = $this->request->getPost('id');

        $data = [
            'nama_lengkap'  => $nama_lengkap,
            'hp'            => $hp,
            'alamat'        => $alamat,
            'status_member' => $status_member,
        ];

        $this->perpustakaan->where('id', $id)->set($data)->update();

        session()->setFlashdata('message', 'Data berhasil diubah.');
        return redirect()->to('/member');
    }

    public function delete_member()
    {
        $id = $this->request->getPost('id');

        $this->perpustakaan->where('id', $id)->delete();

        session()->setFlashdata('message', 'Data berhasil dihapus.');
        return redirect()->to('/member');
    }
}
