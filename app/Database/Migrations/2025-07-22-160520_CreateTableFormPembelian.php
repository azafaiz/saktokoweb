<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableFormPembelian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'tanggal_pembelian' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'supplier_id' => [
                'type' => 'INT',
                'null' => true
            ],
            'total_harga' => [
                'type' => 'INT',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('form_pembelian');
    }

    public function down()
    {
        $this->forge->dropTable('form_pembelian');
    }
}
