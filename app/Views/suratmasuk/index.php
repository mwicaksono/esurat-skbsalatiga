<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-envelope"></i> Daftar Surat Masuk</h2>


    <hr>

    <div class="row">
        <div class="col">
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
                    <a href="/suratmasuk/add" class="btn btn-primary shadow-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="dataTable" class="table table-bordered table-striped ">
                            <thead class="table table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>No. Agenda</th>
                                    <th>Asal Surat</th>
                                    <th>No. Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Status</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($surat as $s) : ?>
                                    <tr class="text-center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $s['no_agenda']; ?></td>
                                        <td><?= $s['pengirim']; ?></td>
                                        <td><?= $s['no_suratmasuk']; ?></td>
                                        <td><?= date_indo($s['tgl_suratmasuk']); ?></td>
                                        <?php if ($s['status_sm'] == 'BARU') { ?>
                                            <td class="text-primary"><b><u><?= $s['status_sm']; ?></u></b></td>
                                        <?php } elseif ($s['status_sm'] == 'DIUBAH') { ?>
                                            <td class="text-success"><b><u><?= $s['status_sm']; ?></u></b></td>
                                        <?php } ?>
                                        <td>
                                            <div class="dropdown mb-4 text-center">
                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-list"></i>
                                                </button>
                                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?= '/disposisi/index/' . $s['id_suratmasuk']; ?>">Disposisi</a>
                                                    <a class="dropdown-item" href="<?= '/suratmasuk/view/' . $s['id_suratmasuk']; ?>">Detail</a>
                                                    <a class="dropdown-item" href="<?= '/suratmasuk/edit/' . $s['id_suratmasuk']; ?>">Edit</a>
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
</div>

<!-- Modal Delete Klasifikasi -->
<?php foreach ($surat as $s) : ?>
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class=" modal-title" id="exampleModalLabel"><b>Hapus Surat Masuk</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus Klasifikasi dengan nomor surat <b><?= $s['no_suratmasuk'] ?></b> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a href="/suratmasuk/delete/<?= $s['id_suratmasuk'] ?>" class="btn btn-primary"> Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- /.modal end delete klasifikasi -->

<?= $this->endSection(); ?>