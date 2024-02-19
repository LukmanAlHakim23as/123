<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pustakawan extends BaseController
{
    public function index()
    {
        $data = ['judul'=>'pustakawan', 'page'=>'v_pustakawan'];
        return view('templates/v_templates_admin',$data);
    }
}
