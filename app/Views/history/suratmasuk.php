<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">
    <div class="col-md-11">
        <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-envelope"></i> Riwayat Surat Masuk</h2>
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
                                    <th>No.</th>
                                    <th>No. Surat</th>
                                    <th>No. Agenda</th>
                                    <th>Pengirim</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($suratmasuk as $sm) : ?>
                                    <tr class="text-center">
                                        <td><?= $i++ ?></td>
                                        <td><?= $sm['no_sm_history'] ?></td>
                                        <td><?= $sm['no_agendasm_history'] ?></td>
                                        <td><?= $sm['pengirim_history'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($sm['tgl_sm_history'])) ?></td>
                                        <td><?= date('d/m/Y', strtotime($sm['tgl_diterima_history'])) ?></td>
                                        <?php if ($sm['status_sm_history'] == "DIUBAH") { ?>
                                            <td class="text-success font-weight-bold"><u><?= $sm['status_sm_history'] ?></u></td>
                                        <?php } elseif ($sm['status_sm_history'] == "DIHAPUS") { ?>
                                            <td class="text-danger font-weight-bold"><u><?= $sm['status_sm_history'] ?></u></td>
                                        <?php } ?>
                                        <td>
                                            <a href="/history/view_sm/<?= $sm['id_historysm'] ?>" class="btn btn-primary font-weight-bold"><i class="fas fa-info-circle"></i> Detail</a>
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