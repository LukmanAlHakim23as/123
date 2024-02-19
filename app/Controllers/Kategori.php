<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    protected $ModelKategori;
    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
    }
    public function index()
    {
        $kategori = $this->ModelKategori->findAll();
        $data = [
            'menu' => 'masterdata',
            'submenu' => 'data kategori',
            'judul' => 'Data Kategori',
            'page' => 'v_dashboard_kategori',
            'kategori' => $kategori
        ];
        return view('templates/v_template_Admin', $data);
    }

    public function createKategori()
    {
        // Validation rules
        $validationRules = [
            'kategori' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $kategori = $this->request->getVar('kategori');

            $data = [
                'f_nama_kategori' => $kategori,
            ];

            $tambahBuku = $this->ModelKategori->createData($data);

            if ($tambahBuku) {
                return redirect()->to(base_url('Kategori'));
            } else {
                echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Kategori') . "';</script>";
            }
        } else {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
    }

    public function editKategori()
    {
        // Validation rules
        $validationRules = [
            'kategori' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $id = $this->request->getVar('id');
            $kategori = $this->request->getVar('kategori');

            $data = [
                'f_nama_kategori' => $kategori,
            ];

            $where = ['f_id' => $id];

            $editBuku = $this->ModelKategori->editData($data, $where);

            if ($editBuku) {
                return redirect()->to(base_url('Kategori'));
            } else {
                echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Kategori') . "';</script>";
            }
        } else {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
    }


    public function deleteKategori($id)
    {
        $where = ['f_id' => $id];

        $hapusBuku = $this->ModelKategori->deleteData($where);

        if ($hapusBuku) {
            return redirect()->to(base_url('Kategori'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Kategori') . "';</script>";
        }
    }
}
