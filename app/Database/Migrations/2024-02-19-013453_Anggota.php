<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Anggota extends Migration
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
            'f_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'f_username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'f_password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'f_tanggallahir' => [
                'type'       => 'DATE',
            ],

        ]);
        $this->forge->addKey('f_id', true);
        $this->forge->createTable('t_anggota');
    }

    public function down()
    {
        $this->forge->dropTable('t_anggota');
    }
}
