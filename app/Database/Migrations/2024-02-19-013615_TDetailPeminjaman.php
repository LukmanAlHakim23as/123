<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TDetailPeminjaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'f_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'f_id_detailbuku' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'f_id_peminjaman' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'f_tanggalkembali' => [
                'type'       => 'DATE',
            ],

        ]);
        $this->forge->addKey('f_id', true);
        $this->forge->addForeignKey('f_id_peminjaman', 't_peminjaman', 'f_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('f_id_detailbuku', 't_detail_buku', 'f_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('t_detail_peminjaman');
    }

    public function down()
    {
        $this->forge->dropTable('t_detail_peminjaman');
    }
}
