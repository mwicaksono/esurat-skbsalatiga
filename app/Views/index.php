<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <?php
        if (session()->getFlashdata('pesan')) {
            echo ' <div class="col-xl-12 col-md-6 mb-4"><div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> ';
            echo session()->getFlashdata('pesan');
            echo '<b>';
            echo session()->get('username');
            echo '</b>';
            echo ' di E-Surat UPTD SPNF SKB Salatiga.';
            echo '</h5></div></div>';
        }
        ?>

        <!-- Surat Masuk -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Surat Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countSuratMasuk; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Surat Keluar -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Surat Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countSuratKeluar; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Disposisi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Disposisi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countDisposisi; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-location-arrow fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CountFile -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah File</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countFileMasuk + $countFileKeluar; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-8 col-md-12 col-sm-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Statistik Penggunaan Aplikasi</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area pt-4 pb-2">
                    <canvas id="myBarChart"></canvas>
                    <h1 class="text-center my-auto">belum jadi</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-6" style="float: right;">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"> Tata Cara Penggunaan Aplikasi</h6>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Laporan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Surat Masuk</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Surat Keluar</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Disposisi</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi reiciendis maxime nostrum eos earum ducimus ea distinctio suscipit facilis! Praesentium, earum magni voluptate id culpa dolore quas voluptatum iure repudiandae alias? Laudantium nostrum itaque temporibus quos officia commodi voluptas facere voluptatum animi odit quisquam, voluptatibus libero saepe optio odio adipisci? Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum harum pariatur dolorum, cupiditate fugit error inventore amet recusandae odio dolor similique minima dicta excepturi, impedit et, molestias beatae. Tempora quas culpa id deleniti aliquam officiis veniam necessitatibus porro beatae iusto iure eaque voluptates cumque repellendus, excepturi atque error corporis voluptatibus nostrum quibusdam saepe praesentium? Quam nisi, maxime explicabo molestiae nobis et! Laboriosam nesciunt omnis sunt delectus earum obcaecati? Inventore dolores totam ipsa assumenda autem molestiae eligendi dolore porro officiis dicta. Minus aliquid sint incidunt ipsa officia explicabo tempore perspiciatis? Ipsam quod alias, praesentium facilis harum dolore consequuntur itaque quia sed.</div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi reiciendis maxime nostrum eos earum ducimus ea distinctio suscipit facilis! Praesentium, earum magni voluptate id culpa dolore quas voluptatum iure repudiandae alias? Laudantium nostrum itaque temporibus quos officia commodi voluptas facere voluptatum animi odit quisquam, voluptatibus libero saepe optio odio adipisci?</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi reiciendis maxime nostrum eos earum ducimus ea distinctio suscipit facilis! Praesentium, earum magni voluptate id culpa dolore quas voluptatum iure repudiandae alias? Laudantium nostrum itaque temporibus quos officia commodi voluptas facere voluptatum animi odit quisquam, voluptatibus libero saepe optio odio adipisci?</div>
                </div>
            </div>

        </div>

    </div>
    <div class="col-lg-6">
        <div class=" card shadow">
            <img src="/img/skb.jpg" class="card-img-top" alt="skb">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, repellat soluta. Similique consequatur hic quisquam exercitationem, quam a architecto totam eligendi cumque. Facilis accusantium laudantium placeat quis reprehenderit voluptates, sunt ipsam doloremque amet molestiae quidem voluptatibus nihil rem dignissimos, pariatur provident culpa enim magni laboriosam et! Ex magni labore aspernatur.</p>
            </div>
        </div>
    </div>
</div>





<!-- /.container-fluid -->


<!-- End of Main Content -->



<?= $this->endSection(); ?>