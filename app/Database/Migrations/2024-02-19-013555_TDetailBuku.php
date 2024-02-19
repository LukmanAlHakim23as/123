<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TDetailBuku extends Migration
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
            'f_id_buku' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'f_status' => [
                'type'       => 'ENUM',
                'constraint' => ['tersedia','tidak tersedia'],
            ],

        ]);
        $this->forge->addKey('f_id', true);
        $this->forge->addForeignKey('f_id_buku', 't_buku', 'f_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('t_detail_buku');
    }

    public function down()
    {
        $this->forge->dropTable('t_detail_buku');
    }
}
