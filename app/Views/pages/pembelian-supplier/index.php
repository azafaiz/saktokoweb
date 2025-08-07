<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
    Form Pembelian
<?= $this->endSection() ?>

<?= $this->section('style') ?>
    <!-- CSS Libraries -->
<?= $this->endSection() ?>

<?= $this->section('main') ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Resep</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Form Pembelian</a></div>
                </div>
            </div>

            <?php if (session()->has('error')) : ?>
                <div class="alert alert-danger">
                    <?= session('error') ?>
                </div>
            <?php elseif (session()->has('success')) : ?>
                <div class="alert alert-info">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Pembelian</h4>
                                <div class="card-header-action">

                                </div>
                            </div>

                            <div class="card-body">
                                <form action="<?= site_url('/admin/pembelian-supplier/store'); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>

                                    <div class="form-group">
                                        <label for="nama">Supplier</label>
                                        <select class="form-control" id="supplier_id" name="supplier_id" required>
                                            <option value="">-- Pilih Supplier --</option>
                                            <?php foreach ($suppliers as $item): ?>
                                                <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between mb-1">
                                            <label for="produk">Produk</label>
                                            <button type="button" class="btn btn-sm btn-primary" id="addProduk">Tambah Barang</button>
                                        </div>
                                        <div id="produkContainer" class="p-2 border rounded">
                                            <div class="d-flex mb-2 gap-1 align-items-center produk-item">
                                                <select class="form-control" name="kode_produk[]" required>
                                                    <option value="">Pilih Produk</option>
                                                    <?php foreach ($produkMaster as $item): ?>
                                                        <option value="<?= $item['kode'] ?>"><?= $item['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah" required>
                                                <input type="text" class="form-control" name="satuan[]" placeholder="Satuan" required>
                                                <input type="number" class="form-control" name="harga[]" placeholder="Harga Satuan" required>
                                                <button type="button" class="btn btn-sm btn-danger removeProduk"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script>
        const produkMasterData = <?= json_encode($produkMaster) ?>;
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addProdukButton = document.getElementById('addProduk');
            const produkContainer = document.getElementById('produkContainer');

            addProdukButton.addEventListener('click', function () {
                const produk = document.createElement('div');
                produk.className = 'd-flex mb-2 gap-1 align-items-center produk-item';

                let produkMasterOptions = '<option value="">Pilih Produk</option>';
                produkMasterData.forEach(item => {
                    produkMasterOptions += `<option value="${item.id}">${item.nama}</option>`;
                });

                produk.innerHTML = `
                    <select class="form-control" name="kode_produk[]" required>
                        ${produkMasterOptions}
                    </select>
                    <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah" required>
                    <input type="text" class="form-control" name="satuan[]" placeholder="Satuan" required>
                    <input type="number" class="form-control" name="harga[]" placeholder="Harga Satuan" required>
                    <button type="button" class="btn btn-sm btn-danger removeProduk"><i class="fas fa-trash"></i></button>
                `;

                produkContainer.appendChild(produk);
            });

            produkContainer.addEventListener('click', function (e) {
                if (e.target.closest('.removeProduk')) {
                    const item = e.target.closest('.produk-item');
                    if (item) produkContainer.removeChild(item);
                }
            });
        });
    </script>

<?= $this->endSection() ?>