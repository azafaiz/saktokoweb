<form action="<?= site_url('/admin/master-produk/update/' . $produk['id']); ?>" method="POST">
    <?= csrf_field(); ?>
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
        <label for="nama">Nama Produk</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($produk['nama']) ?>" required>
    </div>

    <div class="form-group">
        <label for="kategori_id">Kategori</label>
        <select class="form-control" id="kategori_id" name="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($kategoris as $kategori): ?>
                <option value="<?= $kategori['id'] ?>" <?= $produk['kategori_id'] == $kategori['id'] ? 'selected' : '' ?>>
                    <?= esc($kategori['nama']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
