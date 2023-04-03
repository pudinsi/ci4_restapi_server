<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModelPegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pegawai' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pegawai_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'pegawai_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'pegawai_nip' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null' => 'true',
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null' => 'true',
            ],

        ]);
        $this->forge->addKey('id_pegawai', true);
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('pegawai');
    }
}
