<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProdukPembelian extends Migration
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
            'form_pembelian_id' => [
                'type' => 'INT',
                'null' => true
            ],
            'nama_produk' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'jumlah' => [
                'type' => 'INT',
                'null' => true
            ],
            'satuan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'kode_produk' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->createTable('produk_pembelian');
    }

    public function down()
    {
        $this->forge->dropTable('produk_pembelian');
    }
}
