<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TKategori extends Migration
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
            'f_kategori' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],

        ]);
        $this->forge->addKey('f_id', true);
        $this->forge->createTable('t_kategori');
    }

    public function down()
    {
        $this->forge->dropTable('t_kategori');
    }
}
