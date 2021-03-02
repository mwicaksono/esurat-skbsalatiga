<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">

                <form action="https://sipas.skuyservice.com/sm/hapus_multiple" class="formsm" method="post" accept-charset="utf-8">
                    <div class="card-header py-3">
                        <a href="https://sipas.skuyservice.com/surat-masuk/tambah" class="btn btn-primary shadow-sm"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped display nowrap" style="width: 100%;" id="dataSm">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="centangSemua">
                                        </th>
                                        <th>No. Agenda</th>
                                        <th>Pengirim</th>
                                        <th>No. Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>asdas</td>
                                        <td>asdas</td>
                                        <td>asdas</td>
                                        <td>asdas</td>
                                        <td>asdas</td>
                                        <td>asdas</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>