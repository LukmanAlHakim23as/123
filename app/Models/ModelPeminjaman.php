<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
    protected $table = 't_peminjaman';
    protected $primaryKey = 'f_id';
    protected $allowedFields = ['f_id_buku', 'f_id_anggota', 'f_tanggalpeminjaman', 'f_tanggalkembali', 'f_status'];

    public function simpenData($data)
    {
        $this->db->table($this->table)->insert($data);
        return true;
    }

    public function riwayatPinjam($id){
        return $this->db->table($this->table)->where([
            'f_id_anggota' => $id
        ])->get()->getResult();
        
    }
}
