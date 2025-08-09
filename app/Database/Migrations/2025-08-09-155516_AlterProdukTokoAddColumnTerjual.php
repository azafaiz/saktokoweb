<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterProdukTokoAddColumnTerjual extends Migration
{
    public function up()
    {
        $this->forge->addColumn('produk_toko', [
            'terjual' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('produk_toko', 'terjual');
    }
}
