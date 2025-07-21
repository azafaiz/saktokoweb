<form action="<?= site_url('produk-mentah/update/' . $item['id']); ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>

    <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
        <label for="nama">Nama Produk</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $item['nama'] ?>" disabled required>
    </div>

    <div class="form-group">
        <label for="supplier_id">Supplier</label>
        <select class="form-control" id="supplier_id" name="supplier_id" disabled required>
            <option value="<?= $item['id_supplier'] ?>"><?= $item['nama_supplier'] ?></option>
            <?php foreach ($supplier as $s): ?>
                <option value="<?= $s['id'] ?>"><?= $s['nama'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga" value="<?= $item['harga'] ?>" disabled required>
    </div>

    <div class="form-group">
        <label for="foto">Foto</label>
        <?php if (!empty($item['foto'])): ?>
            <div class="mb-2">
                <img src="<?= base_url('uploads/produk-mentah/' . $item['foto']) ?>" alt="Foto Produk" width="100">
            </div>
        <?php endif; ?>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="stok">Stok</label>
            <input type="text" class="form-control" id="stok" name="stok" value="<?= $item['stok'] ?>" disabled required>
        </div>

        <div class="form-group col-md-6">
            <label for="satuan_stok">Satuan Stok</label>
            <input type="text" class="form-control" id="satuan_stok" name="satuan_stok" value="<?= $item['satuan_stok'] ?>" disabled required>
        </div>
    </div>

</form>