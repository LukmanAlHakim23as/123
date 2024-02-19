<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAnggota extends Model
{
    protected $table = 't_anggota';
    protected $primaryKey = 'f_id';
    protected $allowedFields = ['f_nama', 'f_username', 'f_password','f_tanggallahir'];

    public function createData($data) {
        $this->db->table($this->table)->insert($data);
        return true;
    }

    public function editData($data,$where){
        $this->db->table($this->table)->update($data,$where);
        return true;
    }

    
    public function hapusData($where){
        $this->db->table($this->table)->delete($where);
        return true;
    }

    public function editProfile($data,$where){
        $this->db->table($this->table)->update($data,$where);
        return true;
    }
}