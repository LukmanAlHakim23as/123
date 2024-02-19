<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelBuku;

class Buku extends BaseController
{
    protected $ModelBuku;

    public function __construct(){
        $this->ModelBuku = new ModelBuku();
    }
    public function index()
    {
        $buku = $this->ModelBuku->findAll();
        $data = [
            'menu' => 'masterdata',
            'submenu'=> 'data buku',
            'judul' => 'Data Buku',
            'page' => 'v_dashboard_buku',
            'buku' => $buku
        ];
        return view('templates/v_template_Admin', $data);
    }

    public function daftarBuku(){
        $buku = $this->ModelBuku->findAll();
        $data = [
            'menu' => 'masterdata',
            'submenu'=> 'daftar buku',
            'judul' => 'Daftar Buku',
            'page' => 'v_daftarbuku',
            'buku' => $buku
        ];
        return view('templates/v_template_Anggota', $data);
    }

    public function createBuku()
    {
        $idkategori = $this->request->getVar('idkategori');
        $judul = $this->request->getVar('judul');
        $pengarang = $this->request->getVar('pengarang');
        $penerbit = $this->request->getVar('penerbit');
        $deskripsi = $this->request->getVar('deskripsi');

        $data = [
            'f_id_kategori' => $idkategori,
            'f_judul' => $judul,
            'f_pengarang' => $pengarang,
            'f_penerbit' => $penerbit,
            'f_deskripsi' => $deskripsi,
        ];

        $tambahBuku = $this->ModelBuku->createData($data);

        if ($tambahBuku) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Buku'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Buku') . "';</script>";
        }
    }

    public function editBuku()
    {
        $id = $this->request->getVar('id');
        $kategori = $this->request->getVar('kategori');
        $judul = $this->request->getVar('judul');
        $pengarang = $this->request->getVar('pengarang');
        $penerbit = $this->request->getVar('penerbit');
        $deskripsi = $this->request->getVar('deskripsi');

        $data = [
            'f_nama_kategori' => $kategori,
            'f_judul' => $judul,
            'f_pengarang' => $pengarang,
            'f_penerbit' => $penerbit,
            'f_deskripsi' => $deskripsi,
        ];

        $where = ['f_id' => $id];

        $editBuku = $this->ModelBuku->editData($data, $where);

        if ($editBuku) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Buku'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Buku') . "';</script>";
        }
    }

    public function deleteBuku($id)
    {
        $where = ['f_id' => $id];

        $hapusBuku = $this->ModelBuku->delete($where);

        if ($hapusBuku) {
            return redirect()->to(base_url('Buku'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Buku') . "';</script>";
        }
    }

    public function DetailBuku($id_buku)
    {
        $data = [
            'judul' => 'Detail Buku',
            'page' => 'v_detailbuku',
            'menu' => 'masterdata',
            'submenu' => 'buku',
            'buku' => $this->ModelBuku->DetailBuku($id_buku),
        ];
        return view('templates/v_template_anggota', $data);
    }
}
