<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
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
            'f_id_admin' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'f_id_anggota' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'f_tanggalpeminjaman' => [
                'type'       => 'DATE',
            ],

        ]);
        $this->forge->addKey('f_id', true);
        $this->forge->addForeignKey('f_id_anggota', 't_anggota', 'f_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('f_id_admin', 't_admin', 'f_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('t_peminjaman');
    }

    public function down()
    {
        $this->forge->dropTable('t_peminjaman');
    }
}
