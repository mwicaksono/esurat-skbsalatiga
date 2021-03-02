<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-file-alt"></i> Daftar Disposisi Surat</h2>
    <div class="col-md-10">
        <hr>
    </div>
    <div class="row">
        <div class="col-md-10">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> ';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            ?>
            <div class="card shadow-sm my-3">
                <div class="card-body border-left-info rounded-sm">
                    <i class="fa fa-fw fa-info-circle fa-lg"></i> Diposisi dengan Nomor Surat : <strong><?= $surat['no_suratmasuk'] ?></strong>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <a href="/disposisi/add/<?= $surat['id_suratmasuk'] ?>" class="btn  btn-primary mr-auto float-right"><i class="fas fa-plus"></i> Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="dataTable" class="table table-bordered table-striped ">
                            <thead class="table table-dark">
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Tujuan</th>
                                    <th>Sifat Surat</th>
                                    <th>Batas Waktu</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($disposisi as $d) : ?>
                                    <tr class="text-center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['jabatan']; ?></td>
                                        <td>
                                            <?php
                                            switch ($d['sifat_surat']) {
                                                case 1:
                                                    echo "Biasa";
                                                    break;
                                                case 2:
                                                    echo "Penting";
                                                    break;
                                                case 3:
                                                    echo "Segera";
                                                    break;
                                                case 4:
                                                    echo "Rahasia";
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td><?= date('d/m/Y', strtotime($d['batas_waktu'])); ?></td>
                                        <td>
                                            <div class="dropdown mb-4 text-center">
                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-list"></i>
                                                </button>
                                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?= '/disposisi/view/' . $d['id_disposisi']; ?>">Detail Disposisi</a>
                                                    <a onclick="return confirm('Apakah anda ingin menghapus disposisi ini?')" class="dropdown-item" href="/disposisi/delete/<?= $d['id_disposisi'] . '/' . $d['id_suratmasuk'];  ?>">Hapus Disposisi</a>
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