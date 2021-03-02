<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-envelope-open"></i> Tambah Surat Keluar</h2>

    <?= form_open_multipart('suratkeluar/insert');
    helper('text');
    ?>
    <div class="row">
        <div class="col-lg-6">

            <div class="form-group">
                <label><b>No. Surat</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('no_suratkeluar')) ? 'is-invalid' : ''; ?>" name="no_suratkeluar" value="<?= old('no_suratkeluar'); ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('no_suratkeluar'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>No. Agenda</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('no_agenda_suratkeluar')) ? 'is-invalid' : ''; ?>" name="no_agenda_suratkeluar" value="<?= old('no_agenda_suratkeluar'); ?>" name="no_agenda_suratkeluar" value="<?= old('no_agenda_suratkeluar'); ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('no_agenda_suratkeluar'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>Tanggal Surat</b></label>
                <input type="date" class="form-control border-left-primary <?= ($validation->hasError('tgl_suratkeluar')) ? 'is-invalid' : ''; ?>" name="tgl_suratkeluar" value="<?= old('tgl_suratkeluar'); ?>" placeholder="Tanggal Surat Keluar">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('tgl_suratkeluar'); ?>
                </div>
            </div>


            <div class="form-group">
                <label><b>Isi Ringkas</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('isi_suratkeluar')) ? 'is-invalid' : ''; ?>" name="isi_suratkeluar">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('isi_suratkeluar'); ?>
                </div>
            </div>

        </div>
        <div class="col-lg-6">

            <div class="form-group">
                <label><b>Tujuan Surat</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('tujuan_suratkeluar')) ? 'is-invalid' : ''; ?>" name="tujuan_suratkeluar">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('tujuan_suratkeluar'); ?>
                </div>
            </div>


            <div class="form-group">
                <label><b>Keterangan</b></label>
                <textarea name="keterangan_suratkeluar" class="form-control border-left-primary <?= ($validation->hasError('keterangan_suratkeluar')) ? 'is-invalid' : ''; ?>" rows="5"></textarea>
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('keterangan_suratkeluar'); ?>
                </div>
            </div>

            <label><b>Upload file</b></label><sup>*Format file PDF & Ukuran maksimal 5 MB</sup>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input <?= ($validation->hasError('file_suratkeluar')) ? 'is-invalid' : ''; ?>" name="file_suratkeluar" id="validatedCustomFile">
                <label class="custom-file-label" for="validatedCustomFile">Choose file</label>
                <div class="invalid-feedback">
                    <?= $validation->getError('file_suratkeluar'); ?>
                </div>
            </div>

            <div class="form-group border-left-primary">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-check"></i> Simpan</button>
                <a href="<?= base_url('suratkeluar'); ?>" class="btn btn-danger float-right mr-2"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>