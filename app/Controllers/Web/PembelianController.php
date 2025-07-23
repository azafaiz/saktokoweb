<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\ProdukGudangModel;
use App\Models\SupplierModel;

class PembelianController extends BaseController
{
    protected $produkGudangModel;
    protected $kategoriModel;
    protected $supplierModel;

    public function __construct()
    {
        $this->produkGudangModel = new ProdukGudangModel();
        $this->kategoriModel = new KategoriModel();
        $this->supplierModel = new SupplierModel();
    }

    public function createForm()
    {

        return view('pages/pembelian-supplier/index', [
            'suppliers' => $this->supplierModel->findAll(),
            'kategori' => $this->kategoriModel->findAll(),
        ]);
    }

    public function store()
    {
        $post = fn($key) => $this->request->getPost($key);
        for ($i = 0; $i < count($post('kode_produk')); $i++) {
            $oldData = $this->produkGudangModel->where('kode', $post('kode_produk')[$i])->first();
            if ($oldData) {
                $this->produkGudangModel->update($oldData->id, [
                    'jumlah_besar' =>$oldData->jumlah_besar + $post('jumlah')[$i],
                ]);
            } else {
                $this->produkGudangModel->insert([
                    'kode' => $post('kode_produk')[$i],
                    'jumlah_besar' => $post('jumlah')[$i],
                    'harga_satuan_besar' => $post('harga')[$i],
                    'kategori_id' => $post('kategori')[$i],
                    'nama' => $post('nama_produk')[$i],
                    'satuan_besar' => $post('satuan')[$i],
                    'supplier_id' => $post('supplier_id'),
                    'jenis_value' => 2,
                ]);
            }

        }

        return redirect()->to('/admin/pembelian-supplier')->with('success', 'Produk berhasil Dibeli dan ditambahkan ke gudang');
    }
}
