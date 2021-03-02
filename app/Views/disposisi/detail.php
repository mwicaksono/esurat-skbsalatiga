<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="far fa-envelope-open"></i> Detail Disposisi Surat</h2>


    <div class="row">
        <div class="col">

            <table class="table  table-striped">
                <tr>
                    <th width="150px">Tujuan</th>
                    <th width="30px">:</th>
                    <td><?= $disposisi['jabatan']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Isi Disposisi</th>
                    <th width="30px">:</th>
                    <td><?= $disposisi['isi_disposisi']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Batas Waktu</th>
                    <th width="30px">:</th>
                    <td><?= longdate_indo($disposisi['batas_waktu']); ?></td>
                </tr>
                <tr>
                    <th width="150px">Sifat Surat</th>
                    <th width="30px">:</th>
                    <td><?= $disposisi['sifat_surat']; ?></td>
                </tr>
                <tr>
                    <th width="150px">Ditambahkan Oleh</th>
                    <th width="30px">:</th>
                    <td><?= $disposisi['username']; ?> Pada <?= date('H:i:s', strtotime($disposisi['create_disp'])) ?> - <?= date('d/m/Y', strtotime($disposisi['create_disp'])) ?></td>
                </tr>
                <tr>
                    <th width="150px">Catatan</th>
                    <th width="30px">:</th>
                    <td><?= $disposisi['catatan']; ?></td>
                </tr>
            </table>
            <a href="<?= base_url('disposisi') . '/index/' . $disposisi['id_suratmasuk']; ?>" class="btn btn-danger float-right mr-2"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>