<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{

    public function CekLoginAdmin($username, $password){
        return $this->db->table('t_admin')
            ->where([
                'f_username' => $username,
                'f_password' => $password,
            ])->get()->getRowArray();
    }

    public function CekLoginAnggota($username, $password){
        return $this->db->table('t_anggota')
            ->where([
                'f_username' => $username,
                'f_password' => $password,
            ])->get()->getRowArray();
    }
}