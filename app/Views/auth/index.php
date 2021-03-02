<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>E-Surat SKB Salatiga | Login</title>
    <!-- Custom fonts for this template-->
    <link href="http://localhost:8080/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
</head>

<body>

    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
                <img src="/img/login.svg" class="img-fluid" alt="image">
            </div>
            <div class="col-md-6">
                <h3 class="signin-text mb-3"> Login E-Surat SKB Salatiga </h3>
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible fade show"> <i class="fas fa-exclamation-circle"></i> ';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>
                <form action="/auth/login" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input required type="text" name="username" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required type="password" name="password" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-class" value="Login">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript-->
    <!-- Bootstrap core JavaScript-->
    <script src="http://localhost:8080/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost:8080/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="http://localhost:8080/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="http://localhost:8080/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="http://localhost:8080/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="http://localhost:8080/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="http://localhost:8080/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="http://localhost:8080/js/demo/datatables-demo.js"></script>
    <script>
        $('.alert').alert();
    </script>
    <script>
        window.setTimeout(function() {
            $('.alert').fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>


</body>

</html>