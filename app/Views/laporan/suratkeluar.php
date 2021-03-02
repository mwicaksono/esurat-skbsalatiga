<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">

            <h3 class="h3 text-gray-800">Cetak Laporan Surat Keluar</h3>

            <div class="card shadow-sm my-3">
                <div class="card-body border-left-info rounded-sm">
                    <i class="fa fa-fw fa-info-circle fa-lg"></i> <strong> Silahkan pilih tanggal surat untuk menemukan surat masuk yang diinginkan.</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-6">
            <!-- FORM TANGGAL -->
            <p><b>Pencarian Surat Keluar Berdasarkan Tanggal</b></p>
            <form action="/laporan/filterSK" method="post" href="/laporan/print_sk" target="_blank">
                <input type="hidden" name="nilaiFilter" value="1">
                Dari Tanggal <br>
                <input class="form-control" type="date" name="tgl_awal" required>
                <br>
                Sampai Tanggal <br>
                <input class="form-control" type="date" name="tgl_akhir" required>
                <br>
                <input class="btn btn-primary" type="submit" value="Cetak">
            </form>
            <hr>

            <!-- FORM BULAN -->
            <p><b>Pencarian Surat Keluar Berdasarkan Bulan</b></p>
            <form action="/laporan/filterSK" method="post" href="/laporan/print_sk" target="_blank">

                <input type="hidden" name="nilaiFilter" value="2">

                Pilih Tahun <br>

                <select class="form-control" name="tahun1" required>

                    <?php foreach ($tahun as $t) : ?>
                        <option value="<?= $t->tahun; ?>"><?= $t->tahun; ?></option>
                    <?php endforeach; ?>
                </select>


                <br>
                Dari Bulan
                <select class="form-control" name="bulan_awal" required>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <br>

                Sampai Bulan<br>
                <select class="form-control" name="bulan_akhir" required>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <br>
                <input class="btn btn-primary" type="submit" value="Cetak">
            </form>
            <hr>

            <!-- FORM TAHUN -->
            <p><b>Pencarian Surat Keluar Berdasarkan Tahun</b></p>
            <form action="/laporan/filterSK" method="post" href="/laporan/print_sk" target="_blank">
                <input type="hidden" name="nilaiFilter" value="3">
                Pilih Tahun <br>
                <select class="form-control" name="tahun2" required>
                    <?php foreach ($tahun as $t) : ?>
                        <option value="<?= $t->tahun; ?>"><?= $t->tahun; ?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                <input class="btn btn-primary" type="submit" value="Cetak">
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>