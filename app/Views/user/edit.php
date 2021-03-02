<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><i class="fas fa-user-edit"></i> Edit User</h2>

    <div class="row">
        <div class="col-lg-6">
            <?= form_open_multipart('user/update/' . $user['id_user']); ?>
            <div class="form-group">
                <label><b>Name</b></label>
                <input class="form-control border-left-primary <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" name="name" placeholder="Nama user" value="<?= $user['name']; ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('name'); ?>
                </div>
            </div>

            <div class="form-group">
                <label><b>Username</b></label>
                <input class="form-control border-left-primary" name="username" placeholder="Username" value="<?= $user['username']; ?>" readonly>
            </div>

            <div class="form-group">
                <label><b>Hak Akses</b></label>
                <select name="level" class="form-control border-left-primary">
                    <option value="<?= $user['level']; ?>"><?php if ($user['level'] == 1) {
                                                                echo 'Admin';
                                                            } else {
                                                                echo 'User';
                                                            } ?></option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <div class="form-group">
                <br>
                <button type="submit" class="btn  btn-primary float-right"><i class="fa fa-check"></i> Simpan</button>
                <a href="<?= base_url('user'); ?>" style="margin-right: 10px;" class="btn  btn-success float-right mr-2"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <?= form_close(); ?>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>