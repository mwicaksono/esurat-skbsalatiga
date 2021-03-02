<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="col-md-8">
        <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-users"></i> Daftar User</h2>
        <hr>
    </div>
    <div class="row">
        <div class="col-md-8">
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
                    <a href="/user/add" class="btn btn-primary shadow-sm"><i class="fas fa-fw fa-plus"></i> Tambah User</a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="tableUser" class="table table-bordered table-striped ">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Username</th>
                                    <th>Hak Akses</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $u) : ?>
                                    <tr class="text-center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $u['name']; ?></td>
                                        <td><?= $u['username']; ?></td>
                                        <td>
                                            <?php if ($u['level'] == 1) {
                                                echo 'Admin';
                                            } elseif ($u['level'] == 2) {
                                                echo 'User';
                                            } ?>
                                            <?php if ($u['level'] == 3) {
                                                echo 'Kepala SKB';
                                            } ?>

                                        </td>
                                        <td class="text-center">
                                            <?php if ($u['id_user'] == 1) { ?>
                                                <button class="btn btn-warning"><i class="fas fa-exclamation-circle"></i> No Action</button>
                                            <?php } ?>
                                            <?php if ($u['id_user'] <> 1) { ?>
                                                <div class="dropdown mb-4">
                                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-list"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="/user/edit/<?= $u['id_user'];  ?>">Edit</a>
                                                        <a onclick="return confirm('Apakah anda ingin menghapus user ini?')" class="dropdown-item" href="/user/delete/<?= $u['id_user'];  ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
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