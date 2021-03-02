<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="far fa-envelope-open"></i> Detail Surat Masuk</h2>


    <div class="row">
        <div class="col">

            <table class="table  table-striped">
                <tr>
                    <th width="150px">Nomor Surat</th>
                    <th width="30px">:</th>
                    <td><?= $surat['no_suratmasuk']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Nomor Agenda</th>
                    <th width="30px">:</th>
                    <td><?= $surat['no_agenda']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Tanggal Surat</th>
                    <th width="30px">:</th>
                    <td><?= longdate_indo($surat['tgl_suratmasuk']); ?></td>
                </tr>
                <tr>
                    <th width="150px">Tanggal Diterima</th>
                    <th width="30px">:</th>
                    <td><?= longdate_indo($surat['tgl_diterima']); ?></td>
                </tr>
                <tr>
                    <th width="150px">Pengirim</th>
                    <th width="30px">:</th>
                    <td><?= $surat['pengirim']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Isi Surat</th>
                    <th width="30px">:</th>
                    <td><?= $surat['isi_suratmasuk']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Keterangan</th>
                    <th width="30px">:</th>
                    <td><?= $surat['keterangan']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Ditambahkan Pada </th>
                    <th width="30px">:</th>
                    <td>Pukul <?= date('H:i - d F Y', strtotime($surat['tgl_upload'])); ?></td>
                </tr>
                <tr>
                    <th width="150px">Diperbaharui Pada </th>
                    <th width="30px">:</th>
                    <td>Pukul <?= date('H:i', strtotime($surat['update_sm'])) . ' WIB - ' . date('d F Y', strtotime($surat['update_sm'])); ?></td>
                </tr>
                <tr>
                    <th width="150px">Ditambahkan Oleh </th>
                    <th width="30px">:</th>
                    <td>
                        <?php if (!$surat['username']) {
                            $surat['username'] = "User telah dihapus";
                        } ?>
                        <?= $surat['username']; ?>
                    </td>
                </tr>
                <tr>
                    <th width="150px">File </th>
                    <th width="30px">:</th>
                    <td>
                        <a href="/file/<?= $surat['file'] ?>" class="btn btn-warning mr-2" download><i class="fas fa-download"></i> Download</a>
                        <a href="/file/<?= $surat['file'] ?>" class="btn btn-success" target="_blank"><i class="fas fa-eye"></i> Lihat</a>
                    </td>
                </tr>
            </table>
            <a href="<?= base_url('suratmasuk'); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
            <a href="<?= '/suratmasuk/edit/' . $surat['id_suratmasuk']; ?>" class="btn  btn-primary" title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>


        </div>
    </div>
</div>

<?= $this->endSection(); ?>