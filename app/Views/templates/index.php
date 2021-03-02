<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Surat SKB Salatiga</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- title icon -->
    <link rel="icon" href="<?= base_url() ?>/favicon.ico" type="image/ico">

    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }
    </style>
</head>

<body id="page-top">

    <div class="preloader">
        <div class="loading">
            <img src="/img/loading.gif" width="350">
            <h5 style="text-align: center;">Harap Tunggu</h5>
        </div>
    </div>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('templates/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('templates/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $this->renderSection('page-content') ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('templates/footer') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout E-Surat SKB Salatiga</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">Klik "<b>Logout</b>" untuk mengakhiri sesi ini.</div>
                <img class="mx-auto" src="/img/logout.png" width="200">
                <br>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="/auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>/js/demo/datatables-demo.js"></script>

    <!-- script alert-dismissable -->
    <script>
        $('.alert').alert();
    </script>

    <!-- script alert timeout fade -->
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });


        window.setTimeout(function() {
            $('.alert').fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);

        $(document).ready(function() {
            $(".preloader").fadeOut();
        })
    </script>

    <!-- Datatable Log -->
    <script>
        $(function() {
            $('#tablelog').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': false,
                'language': {
                    'info': 'Menampilkan _START_ sampai _END_ record, dari _TOTAL_ data',
                    'infoFiltered': '(Di-filter dari _MAX_ total data)',
                    'lengthMenu': 'Menampilkan _MENU_ Data per Halaman',
                    'zeroRecords': "<b>Data Tidak Ditemukan</b>",
                    'infoEmpty': '<i class="fas fa-exclamation-triangle"></i> Tidak Ada Data',
                    'search': 'Cari:',
                    'paginate': {
                        'previous': '<b><</b>',
                        'next': '<b>></b>',

                    }
                }
            })
        })
    </script>
    <!-- Datatable User -->
    <script>
        $(function() {
            $('#tableUser').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                'language': {
                    'info': 'Menampilkan _START_ sampai _END_ data, dari _TOTAL_ data',
                    'infoFiltered': '(Di-filter dari _MAX_ total data)',
                    'lengthMenu': 'Menampilkan _MENU_ Data per Halaman',
                    'zeroRecords': "<b>Data Tidak Ditemukan</b>",
                    'infoEmpty': '<i class="fas fa-exclamation-triangle"></i> Tidak Ada Data',
                    'search': 'Cari:',
                    'paginate': {
                        'previous': '<b><</b>',
                        'next': '<b>></b>',

                    }
                }
            })
        })
    </script>

    <!-- Datatable History Surat Keluar script -->
    <script>
        $(function() {
            $('#historySK').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                'language': {
                    'info': 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    'lengthMenu': 'Menampilkan _MENU_ Data per Halaman',
                    'zeroRecords': "Data Tidak Ditemukan",
                    'infoEmpty': '<i class="fas fa-exclamation-triangle"></i> Tidak Ada Data',
                    'search': 'Cari:',
                    'paginate': {
                        'previous': '<',
                        'next': '>',

                    }
                }
            })
        })
    </script>
</body>

</html>