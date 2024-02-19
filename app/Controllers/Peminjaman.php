<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPeminjaman;

class Peminjaman extends BaseController
{
    protected $ModelPeminjaman;

    public function __construct()
    {
        $this->ModelPeminjaman = new ModelPeminjaman();
    }
    public function index()
    {
        $data = [
            'menu' => 'masterdata',
            'submenu' => 'data peminjaman',
            'judul' => 'Data Peminjaman',
            'page' => 'v_peminjaman',
        ];

        return view('templates/v_template_admin',$data);
    }

    public function riwayat()
    {
        $data = [
            'menu' => 'masterdata',
            'submenu' => '',
            'judul' => 'Riwayat Peminjaman',
            'page' => 'v_riwayat_pinjam',
            'peminjaman' => $this->ModelPeminjaman->riwayatPinjam(session()->get('f_id'))
        ];

        return view('templates/v_tamplate_anggota', $data);
    }

    public function prosesPinjam()
    {
        $id_buku = $this->request->getVar('id_buku');

        $data = [
            'f_id_buku' => $id_buku,
            'f_id_anggota' => session()->get('f_id'),
            'f_tanggalpeminjaman' => date("Y-m-d"),
            'f_tanggalkembali' => null,
            'f_status' => 'pending',
        ];

        $tambahData = $this->ModelPeminjaman->simpenData($data);

        if ($tambahData) {
            return redirect()->to(base_url('Buku/daftarBuku'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Buku/daftarBuku') . "';</script>";
        }
    }
}
