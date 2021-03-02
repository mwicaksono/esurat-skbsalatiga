<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-envelope"></i> Tambah Disposisi Surat</h2>

    <?= form_open_multipart('disposisi/insert/' . $surat['id_suratmasuk']);
    helper('text');
    ?>
    <div class="row">
        <div class="col-lg">

            <div class="form-group">
                <label><b>Tujuan</b></label>
                <select name="id_klasifikasi" class="form-control border-left-primary <?= ($validation->hasError('id_klasifikasi')) ? 'is-invalid' : ''; ?>">
                    <option></option>
                    <?php foreach ($klasifikasi as $k) : ?>
                        <option value="<?= $k['id_klasifikasi'] ?>"><?= $k['jabatan']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('id_klasifikasi'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>Isi Ringkas</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('isi_disposisi')) ? 'is-invalid' : ''; ?>" name="isi_disposisi" value="<?= old('isi_disposisi'); ?>" name="isi_disposisi" value="<?= old('isi_disposisi'); ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('isi_disposisi'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>Batas Waktu</b></label>
                <input type="date" class="form-control border-left-primary <?= ($validation->hasError('batas_waktu')) ? 'is-invalid' : ''; ?>" name="batas_waktu" value="<?= old('batas_waktu'); ?>" placeholder="Batas Waktu">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('batas_waktu'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>Sifat Surat</b></label>
                <select name="sifat_surat" class="form-control border-left-primary <?= ($validation->hasError('sifat_surat')) ? 'is-invalid' : ''; ?>">
                    <option value="">-Sifat Surat-</option>
                    <option value="1">Biasa</option>
                    <option value="2">Penting</option>
                    <option value="3">Segera</option>
                    <option value="4">Rahasia</option>
                </select>
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('sifat_surat'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>Catatan</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('catatan')) ? 'is-invalid' : ''; ?>" name="catatan">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('catatan'); ?>
                </div>
            </div>

            <div class="form-group border-left-primary">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-check"></i> Simpan</button>
                <a href="<?= base_url('disposisi') . '/index/' . $surat['id_suratmasuk']; ?>" class="btn btn-danger float-right mr-2"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>