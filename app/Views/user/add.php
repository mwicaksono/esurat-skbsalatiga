<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-user-plus"></i> Tambah User</h2>

    <div class="row">
        <div class="col-lg-6">
            <?= form_open_multipart('user/insert'); ?>
            <div class="form-group">
                <input class="form-control border-left-primary <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" name="name" value="<?= old('name'); ?>" placeholder="Masukkan nama..">

                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('name'); ?>
                </div>
            </div>

            <div class="form-group">
                <input class="form-control mt-2 border-left-primary <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" value="<?= old('username'); ?>" placeholder="Masukkan username..">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div>
            </div>

            <div class="form-group">
                <input type="password" id="password" class="form-control  border-left-primary <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" placeholder="Masukkan password..">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('password'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>Hak Akses</b></label>
                <select name="level" class="form-control border-left-primary <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>">
                    <option value="">-Pilih Level-</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                    <option value="3">Kepala UPTD SPNF SKB Salatiga</option>
                </select>
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('level'); ?>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-check"></i> Simpan</button>
                <a href="/user" class="btn btn-success float-right mr-2"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <?= form_close(); ?>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>