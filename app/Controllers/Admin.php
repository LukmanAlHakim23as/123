<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'menu'=>'master data',
            'submenu'=>'dashboard',
            'Judul' =>'Halaman admin',
            'page'=>'v_dashboard_admin'
        ];
        return view('templates/v_template_admin',$data);
    }

}
