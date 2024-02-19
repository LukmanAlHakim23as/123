<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = ['judul'=> 'Halaman Home', 'page' => 'v_Home' ];
        return view('templates/v_template', $data);
    }
}
