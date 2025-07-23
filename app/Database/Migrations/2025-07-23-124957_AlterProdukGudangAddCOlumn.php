<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterProdukGudangAddCOlumn extends Migration
{
    public function up()
    {
        $this->forge->addColumn('produk_gudang', [
            'jumlah_besar' => [
                'type' => 'INT',
                'null' => true
            ],
            'satuan_besar' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true
            ],
            'harga_satuan_besar' => [
                'type' => 'FLOAT',
                'constraint' => 11,
                'null' => true
            ],

            'kemasan_kecil' => [
                'type' => 'INT',
                'null' => true
            ],
            'laba' => [
                'type' => 'FLOAT',
                'constraint' => 11,
                'null' => true
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('produk_gudang', 'jumlah_besar');
        $this->forge->dropColumn('produk_gudang', 'satuan_besar');
        $this->forge->dropColumn('produk_gudang', 'harga_satuan_besar');
        $this->forge->dropColumn('produk_gudang', 'kemasan_kecil');
        $this->forge->dropColumn('produk_gudang', 'laba');
    }
}
