<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-poll-h"></i> Daftar Klasifikasi</h2>
    <hr>
    <div class="row">
        <div class="col col-md-8">

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> ';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <button type="button" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Tambah Klasifikasi</button>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="dataTable" class="table table-bordered table-striped ">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($klasifikasi as $k) : ?>
                                    <tr class="text-center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $k['nama_klasifikasi']; ?></td>
                                        <td><?= $k['jabatan']; ?></td>
                                        <td class="text-center">
                                            <div class="dropdown mb-4">
                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-list"></i>
                                                </button>
                                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                    <button class="dropdown-item" data-toggle="modal" data-target="#edit<?= $k['id_klasifikasi']; ?>">Edit</button>
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#delete">Hapus</a>
                                                </div>
                                            </div>
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

    <!-- Modal add klasifikasi -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Klasifikasi</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?= form_open_multipart('klasifikasi/insert'); ?>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama_klasifikasi" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input class="form-control" name="jabatan" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.modal end add klasifikasi -->

    <!-- Modal edit klasifikasi -->
    <?php foreach ($klasifikasi as $k) : ?>
        <div class="modal fade" id="edit<?= $k['id_klasifikasi']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Edit Klasifikasi</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <?= form_open_multipart('klasifikasi/update/' . $k['id_klasifikasi']) ?>

                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="nama_klasifikasi" value="<?= $k['nama_klasifikasi']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input class="form-control" name="jabatan" value="<?= $k['jabatan']; ?>" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                    <?= form_close(); ?>

                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- /.modal end edit klasifikasi -->

    <!-- Modal Delete Klasifikasi -->
    <?php foreach ($klasifikasi as $k) : ?>
        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class=" modal-title" id="exampleModalLabel"><b>Hapus Klasifikasi</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus Klasifikasi dengan nama <b><?= $k['nama_klasifikasi'] ?></b> ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <a href="/klasifikasi/delete/<?= $k['id_klasifikasi'] ?>" class="btn btn-primary"> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- /.modal end delete klasifikasi -->


    <?= $this->endSection(); ?>