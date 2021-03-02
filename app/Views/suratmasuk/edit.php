<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="far fa-edit"></i> Edit Surat Masuk</h2>

    <?= form_open_multipart('suratmasuk/update/' . $surat['id_suratmasuk']);
    helper('text');
    ?>
    <div class="row">
        <div class="col-lg-6">

            <div class="form-group">
                <label><b>No. Surat</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('no_suratmasuk')) ? 'is-invalid' : ''; ?>" name="no_suratmasuk" value="<?= (old('no_suratmasuk') ? old('no_suratmasuk') : $surat['no_suratmasuk']) ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('no_suratmasuk'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>No. Agenda</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('no_agenda')) ? 'is-invalid' : ''; ?>" name="no_agenda" value="<?= (old('no_agenda') ? old('no_agenda') : $surat['no_agenda']) ?>" name="no_agenda" value="<?= old('no_agenda'); ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('no_agenda'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>Tanggal Surat</b></label>
                <input type="date" class="form-control border-left-primary <?= ($validation->hasError('tgl_suratmasuk')) ? 'is-invalid' : ''; ?>" name="tgl_suratmasuk" value="<?= (old('tgl_suratmasuk') ? old('tgl_suratmasuk') : $surat['tgl_suratmasuk']) ?>" placeholder="Tanggal Surat">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('tgl_suratmasuk'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>Tanggal Diterima</b></label>
                <input type="date" class="form-control border-left-primary <?= ($validation->hasError('tgl_diterima')) ? 'is-invalid' : ''; ?>" name="tgl_diterima" value="<?= (old('tgl_diterima') ? old('tgl_diterima') : $surat['tgl_diterima']) ?>" placeholder="Tanggal Diterima">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('tgl_diterima'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>Isi Ringkas</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('isi_suratmasuk')) ? 'is-invalid' : ''; ?>" name="isi_suratmasuk" value="<?= (old('isi_suratmasuk') ? old('isi_suratmasuk') : $surat['isi_suratmasuk']) ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('isi_suratmasuk'); ?>
                </div>
            </div>

        </div>
        <div class="col-lg-6">

            <div class="form-group">
                <label><b>Pengirim</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('pengirim')) ? 'is-invalid' : ''; ?>" name="pengirim" value="<?= (old('pengirim') ? old('pengirim') : $surat['pengirim']) ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('pengirim'); ?>
                </div>
            </div>


            <div class="form-group">
                <label><b>Keterangan</b><sup>*Opsional</sup></label>
                <textarea name="keterangan" class="form-control border-left-primary <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" rows="5"><?= (old('keterangan') ? old('keterangan') : $surat['keterangan']) ?></textarea>
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('keterangan'); ?>
                </div>
            </div>

            <label><b>Upload file</b></label><sup>*Format file PDF & Ukuran maksimal 5 MB</sup>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" name="file" id="validatedCustomFile" value="<?= (old('file') ? old('file') : $surat['file']) ?>">
                <label class="custom-file-label" for="validatedCustomFile"><?= $surat['file'] ?></label>
                <div class="invalid-feedback">
                    <?= $validation->getError('file'); ?>
                </div>
            </div>

            <div class="form-group border-left-primary">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-check"></i> Ubah</button>
                <a href="<?= base_url('suratmasuk'); ?>" class="btn btn-danger float-right mr-2"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>