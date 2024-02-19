<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelAuth;
use PhpParser\Builder\Function_;

class Auth extends BaseController
{
    protected $ModelAuth,$session;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        $data = ['judul' => 'Halaman Login','page'=>'v_login'];
        return view('templates/v_template_login', $data);
    }

    public function loginAdmin()
    {
        $data = ['judul' => 'Halaman Login','page'=>'v_login_admin'];
        return view('templates/v_template_login', $data);
    }

    public function loginAnggota()
    {
        $data = ['judul' => 'Halaman Login','page'=>'v_login_anggota'];
        return view('templates/v_template_login', $data);
    }

    public function cekLoginAdmin()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !',
                ]
            ]
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->CekLoginAdmin($username, $password);

            if (!empty($cek_login)) {
                session()->set('f_id', intval($cek_login['f_id']));
                session()->set('f_nama', $cek_login['f_nama']);
                session()->set('f_email', $cek_login['f_username']);
                session()->set('f_role', $cek_login['f_level']);
                return redirect()->to(base_url('Admin'));
            } else {
                session()->setFlashdata('pesan', 'Username atau Password Salah !');
                return redirect()->to(base_url('Auth/LoginAdmin'));
            }
        } else {
            // Jika entry tidak valid
            return redirect()->to(base_url('AuthAuth/LoginAdmin'))->withInput()->with('errors', \Config\Services::validation()->getErrors());
        }
    }

    public function cekLoginAnggota()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !',
                ]
            ]
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->CekLoginAnggota($username, $password);

            if (!empty($cek_login)) {
                session()->set('f_id', intval($cek_login['f_id']));
                session()->set('f_nama', $cek_login['f_nama']);
                session()->set('f_email', $cek_login['f_username']);
                return redirect()->to(base_url('Anggota/dashboardAnggota'));
            } else {
                session()->setFlashdata('pesan', 'Username atau Password Salah !');
                return redirect()->to(base_url('AuthAuth/LoginAnggota'));
            }
        } else {
            // Jika entry tidak valid
            return redirect()->to(base_url('AuthAuth/LoginAnggota'))->withInput()->with('errors', \Config\Services::validation()->getErrors());
        }
    }
    

    public function Logout()
    {
        session()->remove('f_id');
        session()->remove('f_nama');
        session()->remove('f_username');
        session()->remove('f_role');
        session()->setFlashdata('pesan', 'Logout Sukses !');
        return redirect()->to(base_url('Auth'));
    }
}