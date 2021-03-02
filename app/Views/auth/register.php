<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Form Tambah User</h1>
                                </div>

                                <form class="user" action="/auth/insert" method="post">

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="name" placeholder="Nama...">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Username...">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password..." autocomplete="off">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <input type="level" class="form-control form-control-user" name="level" placeholder="level...">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Daftar
                                    </button>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>