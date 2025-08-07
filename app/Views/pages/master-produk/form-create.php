<form action="<?= site_url('/admin/master-produk/store'); ?>" method="POST">
    <?= csrf_field(); ?>

    <div class="form-group">
        <label for="nama">Nama Produk</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>

    <div class="form-group">
        <label for="kode">Kode Produk</label>
        <input type="text" class="form-control" id="kode" name="kode" required>
    </div>

    <div class="form-group">
        <label for="kategori_id">Kategori</label>
        <select class="form-control" id="kategori_id" name="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($kategoris as $kategori): ?>
                <option value="<?= $kategori['id'] ?>"><?= esc($kategori['nama']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
