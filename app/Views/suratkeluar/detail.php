<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="far fa-envelope-open"></i> Detail Surat Keluar</h2>


    <div class="row">
        <div class="col">

            <table class="table  table-striped">
                <tr>
                    <th width="150px">Nomor Surat</th>
                    <th width="30px">:</th>
                    <td><?= $surat['no_suratkeluar']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Nomor Agenda</th>
                    <th width="30px">:</th>
                    <td><?= $surat['no_agenda_suratkeluar']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Tanggal Surat</th>
                    <th width="30px">:</th>
                    <td><?= longdate_indo($surat['tgl_suratkeluar']); ?></td>
                </tr>
                <tr>
                    <th width="150px">Tujuan Surat</th>
                    <th width="30px">:</th>
                    <td><?= $surat['tujuan_suratkeluar']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Isi Surat</th>
                    <th width="30px">:</th>
                    <td><?= $surat['isi_suratkeluar']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Keterangan</th>
                    <th width="30px">:</th>
                    <td><?= $surat['keterangan_suratkeluar']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Ditambahkan Pada </th>
                    <th width="30px">:</th>
                    <td>Pukul <?= date('H:i', strtotime($surat['tgl_upload_suratkeluar'])) . ' WIB - ' . date('d F Y', strtotime($surat['tgl_upload_suratkeluar'])); ?></td>
                </tr>
                <tr>
                    <th width="150px">Diperbaharui Pada </th>
                    <th width="30px">:</th>
                    <td>Pukul <?= date('H:i', strtotime($surat['update_sk'])) . ' WIB - ' . date('d F Y', strtotime($surat['update_sk'])); ?></td>
                </tr>
                <tr>
                    <th width="150px">Ditambahkan Oleh </th>
                    <th width="30px">:</th>
                    <td>
                        <?php if (!$surat['username']) {
                            $surat['username'] = "User telah dihapus";
                        } ?>
                        <?= $surat['username']; ?></td>
                </tr>
                <tr>
                    <th width="150px">File </th>
                    <th width="30px">:</th>
                    <td>
                        <a href="/file_suratkeluar/<?= $surat['file_suratkeluar'] ?>" class="btn btn-warning mr-2" download><i class="fas fa-download"></i> Download</a>
                        <a href="/file_suratkeluar/<?= $surat['file_suratkeluar'] ?>" class="btn btn-success" target="_blank"><i class="fas fa-eye"></i> Lihat</a>
                    </td>
                </tr>
            </table>
            <a href="<?= base_url('suratkeluar'); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
            <a href="<?= '/suratkeluar/edit/' . $surat['id_suratkeluar']; ?>" class="btn  btn-primary" title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>


        </div>
    </div>
</div>

<?= $this->endSection(); ?>