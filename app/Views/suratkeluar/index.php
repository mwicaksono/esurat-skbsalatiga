<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-envelope-open"></i> Daftar Surat Keluar</h2>


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
                    <a href="/suratkeluar/add" class="btn btn-primary shadow-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="dataTable" class="table table-bordered table-striped ">
                            <thead class="table table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>No. Agenda</th>
                                    <th>Tujuan</th>
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
                                        <td><?= $s['no_agenda_suratkeluar']; ?></td>
                                        <td><?= $s['tujuan_suratkeluar']; ?></td>
                                        <td><?= $s['no_suratkeluar']; ?></td>
                                        <td><?= date_indo($s['tgl_suratkeluar']); ?></td>
                                        <?php if ($s['status_sk'] == 'BARU') { ?>
                                            <td class="text-primary"><b><u><?= $s['status_sk']; ?></u></b></td>
                                        <?php } elseif ($s['status_sk'] == 'DIUBAH') { ?>
                                            <td class="text-success"><b><u><?= $s['status_sk']; ?></u></b></td>
                                        <?php } ?>
                                        <td>
                                            <div class="dropdown mb-4 text-center">
                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-list"></i>
                                                </button>
                                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?= '/suratkeluar/view/' . $s['id_suratkeluar']; ?>">Detail</a>
                                                    <a class="dropdown-item" href="<?= '/suratkeluar/edit/' . $s['id_suratkeluar']; ?>">Edit</a>
                                                    <a onclick="return confirm('Apakah anda ingin menghapus surat ini?')" class="dropdown-item" href="/suratkeluar/delete/<?= $s['id_suratkeluar'];  ?>">Hapus</a>
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


<?= $this->endSection(); ?>