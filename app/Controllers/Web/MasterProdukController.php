<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MasterProdukController extends BaseController
{

    protected $masterProdukModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->masterProdukModel = new \App\Models\MasterProdukModel();
        $this->kategoriModel = new \App\Models\KategoriModel();
    }
    public function index()
    {
        $produks = $this->masterProdukModel
            ->select('master_produk.*, kategori.nama as kategori_nama')
            ->join('kategori', 'kategori.id = master_produk.kategori_id')
            ->findAll();
        $kategoris = $this->kategoriModel->findAll();

        return view('/pages/master-produk/index', [
            'produks' => $produks,
            'kategoris' => $kategoris
        ]);
    }

    public function store()
    {
        $lastProduk = $this->masterProdukModel->orderBy('id', 'DESC')->first();
        if ($lastProduk) {
            $lastKode = (int) substr($lastProduk['kode'], 3);
            $newKode = 'PRD' . str_pad($lastKode + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newKode = 'PRD0001'; // Kode awal jika belum ada produk
        }

        $data = [
            'kode' => $newKode,
            'nama' => $this->request->getPost('nama'),
            'kategori_id' => $this->request->getPost('kategori_id'),
        ];

        $this->masterProdukModel->insert($data);

        return redirect()->to('/admin/master-produk')->with('success', 'Data berhasil disimpan');
    }

    public function update($id)
    {
        $produk = $this->masterProdukModel->find($id);
        if (!$produk) {
            return redirect()->to('/master-produk')->with('error', 'Data tidak ditemukan');
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'kategori_id' => $this->request->getPost('kategori_id'),
        ];

        $this->masterProdukModel->update($id, $data);

        return redirect()->to('/admin/master-produk')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->masterProdukModel->delete($id);
        return redirect()->to('/admin/master-produk')->with('success', 'Data berhasil dihapus');
    }
}
