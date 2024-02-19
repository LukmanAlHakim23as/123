<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;

class Anggota extends BaseController
{

    protected $ModelAnggota;

    public function __construct()
    {
        $this->ModelAnggota = new ModelAnggota();
    }

    public function index(): string
    {
        $anggota = $this->ModelAnggota->findAll();
        $data = [
            'menu' => 'masterdata',
            'submenu' => 'data anggota',
            'judul' => 'Data Anggota',
            'page' => 'v_dashboard_anggota',
            'anggota' => $anggota
        ];
        return view('templates/v_template_admin', $data);
    }

    public function dashboardAnggota(){
        $data = [
            'menu' => 'masterdata',
            'submenu' => 'dashboard Anggota',
            'judul' => 'Dashboard Anggota',
            'page' => 'v_anggota',
        ];
        return view('templates/v_template_anggota', $data);
    }

    public function createAnggota()
    {
        $nama = $this->request->getVar('nama');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $tanggallahir = $this->request->getVar('tgllahir');

        $data = [
            'f_nama' => $nama,
            'f_username' => $username,
            'f_password' => $password,
            'f_tanggallahir' => $tanggallahir,
        ];

        $tambahAnggota = $this->ModelAnggota->createData($data);

        if ($tambahAnggota) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Anggota'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Anggota') . "';</script>";
        }
    }

    public function editAnggota()
    {
        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $tanggallahir = $this->request->getVar('tgllahir');

        $data = [
            'f_nama' => $nama,
            'f_username' => $username,
            'f_password' => $password,
            'f_tanggallahir' => $tanggallahir,
        ];

        $where = ['f_id' => $id];

        $editAnggota = $this->ModelAnggota->editData($data, $where);

        if ($editAnggota) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Anggota'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Anggota') . "';</script>";
        }
    }
    public function deleteAnggota($id)
    {

        $where = ['f_id' => $id];

        $hapusAnggota = $this->ModelAnggota->hapusData($where);

        if ($hapusAnggota) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Anggota'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Anggota') . "';</script>";
        }
    }
}