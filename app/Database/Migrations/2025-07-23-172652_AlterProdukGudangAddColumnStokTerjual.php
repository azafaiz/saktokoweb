<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterProdukGudangAddColumnStokTerjual extends Migration
{
    public function up()
    {
        $this->forge->addColumn('produk_gudang', [
            'stok_terjual' => [
                'type' => 'INT',
                'null' => true
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('produk_gudang', 'stok_terjual');
    }
}
