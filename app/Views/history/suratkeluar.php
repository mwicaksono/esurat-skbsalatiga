<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">
    <div class="col-md-11">
        <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-envelope-open-text"></i> Riwayat Surat Keluar</h2>
        <hr>
    </div>
    <div class="row">
        <div class="col-md-11">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered table-striped display nowrap" style="width: 100%;" id="historySK">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>No. Surat</th>
                                    <th>No. Agenda</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal Surat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($suratkeluar as $sk) : ?>
                                    <tr class="text-center">
                                        <td><?= $i++ ?></td>
                                        <td><?= $sk['no_historysk'] ?></td>
                                        <td><?= $sk['no_agendask'] ?></td>
                                        <td><?= $sk['tujuan_historysk'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($sk['tgl_historysk'])) ?></td>
                                        <?php if ($sk['status_historysk'] == "DIUBAH") { ?>
                                            <td class="text-success font-weight-bold"><u><?= $sk['status_historysk'] ?></u></td>
                                        <?php } elseif ($sk['status_historysk'] == "DIHAPUS") { ?>
                                            <td class="text-danger font-weight-bold"><u><?= $sk['status_historysk'] ?></u></td>
                                        <?php } ?>
                                        <td class="font-weight-bold">
                                            <a href="/history/view_sk/<?= $sk['id_historysk'] ?>" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
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