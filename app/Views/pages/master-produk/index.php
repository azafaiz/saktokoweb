<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Master Produk
<?= $this->endSection() ?>

<?= $this->section('style') ?>
<!-- CSS Libraries -->
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Master Produk</a></div>
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
                            <h4>List Master Produk</h4>
                            <div class="card-header-action">
                                <form>
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <!-- Tombol untuk membuka modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                                                Tambah Produk
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="float-left">
                                <form action="<?= base_url('admin/master-produk') ?>">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="keyword" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table-striped table" id="sortable-table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama Produk</th>
                                        <th>Kode</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1;
                                    foreach ($produks as $produk): ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= esc($produk['nama']) ?></td>
                                            <td><?= esc($produk['kode']) ?></td>
                                            <td><?= esc($produk['kategori_nama'] ?? '-') ?></td>
                                            <td>

                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-<?= $produk['id'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <form action="<?= site_url('/admin/master-produk/delete/' . $produk['id']) ?>" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                    <?= csrf_field() ?>
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('components/modal', [
    'id' => 'modal-create',
    'title' => 'Tambah Produk',
    'slot' => view('pages/master-produk/form-create')
]) ?>

<?php foreach ($produks as $produk): ?>
    <?= view('components/modal', [
        'id' => 'modal-edit-' . $produk['id'],
        'title' => 'Edit Produk',
        'size' => 'modal-lg',
        'slot' => view('pages/master-produk/form-edit', ['produk' => $produk])
    ]) ?>
<?php endforeach; ?>

<?= $this->endSection() ?>
