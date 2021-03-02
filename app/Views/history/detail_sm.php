<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="far fa-envelope-open"></i> Detail Riwayat Surat Masuk</h2>


    <div class="row">
        <div class="col">

            <table class="table  table-striped">
                <tr>
                    <th width="150px">Nomor Surat</th>
                    <th width="30px">:</th>
                    <td><?= $surat['no_sm_history']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Nomor Agenda</th>
                    <th width="30px">:</th>
                    <td><?= $surat['no_agendasm_history']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Tanggal Surat</th>
                    <th width="30px">:</th>
                    <td><?= longdate_indo($surat['tgl_sm_history']); ?></td>
                </tr>
                <tr>
                    <th width="150px">Tanggal Diterima</th>
                    <th width="30px">:</th>
                    <td><?= longdate_indo($surat['tgl_diterima_history']); ?></td>
                </tr>
                <tr>
                    <th width="150px">Pengirim</th>
                    <th width="30px">:</th>
                    <td><?= $surat['pengirim_history']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Isi Surat</th>
                    <th width="30px">:</th>
                    <td><?= $surat['isi_sm_history']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Keterangan</th>
                    <th width="30px">:</th>
                    <td><?= $surat['keterangan_sm_history']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Ditambahkan Pada </th>
                    <th width="30px">:</th>
                    <td>Pukul <?= date('H:i:s', strtotime($surat['upload_sm_history'])) . ' WIB - ' . date('d F Y', strtotime($surat['upload_sm_history'])); ?></td>
                </tr>
                <tr>
                    <?php if ($surat['status_sm_history'] == "DIHAPUS") { ?>
                        <th width="150px">Dihapus Pada </th>
                    <?php } elseif ($surat['status_sm_history'] == "DIUBAH") { ?>
                        <th width="150px">Diperbaharui Pada </th>
                    <?php } ?>
                    <th width="30px">:</th>
                    <td>Pukul <?= date('H:i:s', strtotime($surat['update_sm_history'])) . ' WIB - ' . date('d F Y', strtotime($surat['update_sm_history'])); ?></td>
                </tr>
                <tr>
                    <th width="150px">Status</th>
                    <th width="30px">:</th>
                    <td> <?php if ($surat['status_sm_history'] == "DIHAPUS") { ?>
                            <b class="text-danger"><u><?= $surat['status_sm_history']; ?></u></b>
                        <?php } elseif ($surat['status_sm_history'] == "DIUBAH") { ?>
                            <b class="text-success"><u><?= $surat['status_sm_history']; ?></u></b>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th width="150px">Ditambahkan Oleh </th>
                    <th width="30px">:</th>
                    <td>
                        <b>
                            <?php if (!$surat['username']) {
                                $surat['username'] = "User telah dihapus";
                            } ?>
                            <?= $surat['username']; ?>
                        </b>
                    </td>
                </tr>

            </table>


        </div>
    </div>
</div>

<?= $this->endSection(); ?>