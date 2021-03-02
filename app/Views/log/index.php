<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">
    <div class="col-md-8">
        <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-history"></i> Log Aktivitas Surat</h2>
        <hr>
    </div>
    <div class="row">
        <div class="col col-md-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <table id="tablelog" class="table table-bordered table-striped ">
                        <thead class="table-dark">
                            <tr>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($log as $l) : ?>
                                <tr>
                                    <td>
                                        <?php if ($l['no_suratmasuk'] and !$l['id_klasifikasi']) {
                                            if (!$l['username']) {
                                                $l['username'] = "<b class='text-danger'>User tidak tersedia</b>";
                                            }
                                        ?>
                                            <P><b><?= $l['username'] . '</b> Melakukan <b>' . $l['perubahan'] . '</b> Atas Surat Masuk Bernomor <b>' . $l['no_suratmasuk'] . '</b> Pada <b>' . date('H:i:s - d/m/Y', strtotime($l['waktu'])) ?></b></P>
                                        <?php } elseif ($l['no_suratkeluar']) { ?>
                                            <P><b><?= $l['username'] . '</b> Melakukan <b>' . $l['perubahan'] . '</b> Atas Surat Keluar Bernomor <b>' . $l['no_suratkeluar'] . '</b> Pada <b>' . date('H:i:s - d/m/Y', strtotime($l['waktu'])) ?></b></P>
                                        <?php }  ?>
                                        <?php if ($l['id_klasifikasi']) { ?>
                                            <P><b><?= $l['username'] . '</b> Melakukan <b>' . $l['perubahan'] . '</b> Atas Disposisi Surat kepada <b>' . $l['jabatan'] . '</b> Pada <b>' . date('H:i:s - d/m/Y', strtotime($l['waktu'])) ?></b></P>
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

<?= $this->endSection(); ?>