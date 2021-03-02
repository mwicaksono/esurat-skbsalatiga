<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="far fa-edit"></i> Edit Surat Keluar</h2>

    <?= form_open_multipart('suratkeluar/update/' . $surat['id_suratkeluar']);
    helper('text');
    ?>
    <div class="row">
        <div class="col-lg-6">

            <div class="form-group">
                <label><b>No. Surat</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('no_suratkeluar')) ? 'is-invalid' : ''; ?>" name="no_suratkeluar" value="<?= (old('no_suratkeluar') ? old('no_suratkeluar') : $surat['no_suratkeluar']) ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('no_suratkeluar'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>No. Agenda</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('no_agenda_suratkeluar')) ? 'is-invalid' : ''; ?>" name="no_agenda_suratkeluar" value="<?= (old('no_agenda_suratkeluar') ? old('no_agenda_suratkeluar') : $surat['no_agenda_suratkeluar']) ?>" name="no_agenda_suratkeluar" value="<?= old('no_agenda_suratkeluar'); ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('no_agenda_suratkeluar'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>Tanggal Surat</b></label>
                <input type="date" class="form-control border-left-primary <?= ($validation->hasError('tgl_suratkeluar')) ? 'is-invalid' : ''; ?>" name="tgl_suratkeluar" value="<?= (old('tgl_suratkeluar') ? old('tgl_suratkeluar') : $surat['tgl_suratkeluar']) ?>" placeholder="Tanggal Surat Keluar">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('tgl_suratkeluar'); ?>
                </div>
            </div>


            <div class="form-group">
                <label><b>Isi Ringkas</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('isi_suratkeluar')) ? 'is-invalid' : ''; ?>" name="isi_suratkeluar" value="<?= (old('isi_suratkeluar') ? old('isi_suratkeluar') : $surat['isi_suratkeluar']) ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('isi_suratkeluar'); ?>
                </div>
            </div>

        </div>
        <div class="col-lg-6">

            <div class="form-group">
                <label><b>Tujuan Surat</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('tujuan_suratkeluar')) ? 'is-invalid' : ''; ?>" name="tujuan_suratkeluar" value="<?= (old('tujuan_suratkeluar') ? old('tujuan_suratkeluar') : $surat['tujuan_suratkeluar']) ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('tujuan_suratkeluar'); ?>
                </div>
            </div>


            <div class="form-group">
                <label><b>Keterangan</b><sup>*Opsional</sup></label>
                <textarea name="keterangan_suratkeluar" class="form-control border-left-primary <?= ($validation->hasError('keterangan_suratkeluar')) ? 'is-invalid' : ''; ?>" rows="5"><?= (old('keterangan_suratkeluar') ? old('keterangan_suratkeluar') : $surat['keterangan_suratkeluar']) ?></textarea>
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('keterangan_suratkeluar'); ?>
                </div>
            </div>

            <label><b>Upload file</b></label><sup>*Format file PDF & Ukuran maksimal 5 MB</sup>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input <?= ($validation->hasError('file_suratkeluar')) ? 'is-invalid' : ''; ?>" name="file_suratkeluar" id="validatedCustomFile" value="<?= (old('file_suratkeluar') ? old('file_suratkeluar') : $surat['file_suratkeluar']) ?>">
                <label class="custom-file-label" for="validatedCustomFile"><?= $surat['file_suratkeluar'] ?></label>
                <div class="invalid-feedback">
                    <?= $validation->getError('file_suratkeluar'); ?>
                </div>
            </div>

            <div class="form-group border-left-primary">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-check"></i> Ubah</button>
                <a href="<?= base_url('suratkeluar'); ?>" class="btn btn-danger float-right mr-2"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>