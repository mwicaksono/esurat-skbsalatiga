<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Laporan Surat Masuk</title>
    <style>
        #logo {
            width: 100px;
            top: 20px;
            left: 20px;
            position: relative;
        }

        .header {
            display: flex;
            margin-bottom: 40px;
        }

        .judul {
            justify-content: center;
            margin: 40px auto;
            text-align: center;

        }

        .kepala,
        .petugas {
            width: 300px;
            height: 300px;
        }

        .ttd {
            margin: 0px 60px;
            margin-top: 35px;
        }

        .kepala {
            float: left;
            text-align: center;
        }

        .petugas {
            text-align: center;
            float: right;
        }

        .kopsurat {
            margin-top: -30px;
            border: solid black;
        }

        .kopsurat-bold {
            margin-top: -10px;
            border: 1px solid black;
        }

        body {
            color: black;
        }

        .title {
            text-align: center;
            margin-bottom: 25px;
        }
    </style>


</head>

<?php if ($dataFilter == NULL) {
    echo "<h1 style='text-align:center;'>Data Tidak Ditemukan</h1>";
    echo "<a href='/laporan/suratmasuk'><h4 style='text-align:center;' >&laquo; Kembali</h4></a>";
    die;
} ?>

<body onload="window.print()" style="margin: 0;">
    <div class="header">
        <div>
            <img src="/img/salatiga.png" alt="" id="logo">
        </div>
        <div class="judul">
            <h2>UPTD SPNF Sanggar Kegiatan Belajar Kota Salatiga</h2>
            <h5>Jl. Soekarno-Hatta Isep-Isep, Cebongan, Salatiga 50736</h5>
            <h5>Telp.(0298) 324548, Email : <u>skb@salatiga.go.id</u></h5>
        </div>
    </div>

    <i class=""></i>
    <hr class="kopsurat">
    <hr class="kopsurat-bold">
    <div class="title">
        <h2><?= $title; ?></h2>
        <h5><?= $subtitle; ?></h5>
    </div>
    <table width="100%" border="1" cellpadding="20">
        <thead>
            <tr>
                <th>No. Surat</th>
                <th>No. Agenda</th>
                <th>Tujuan</th>
                <th>Tanggal Surat</th>
                <th>Perihal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataFilter as $d) : ?>
                <tr>
                    <td><?= $d->no_suratkeluar; ?></td>
                    <td><?= $d->no_agenda_suratkeluar; ?></td>
                    <td><?= $d->tujuan_suratkeluar; ?></td>
                    <td><?= date_indo($d->tgl_suratkeluar); ?></td>
                    <td><?= $d->isi_suratkeluar; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="ttd">
        <div class="kepala">
            <p>Kepala</p>
            <p>UPTD SPNF SKB Salatiga</p>
            <br><br><br><br><br>
            <p><u><b>Ketua SKB Salatiga</b></u></p>
            <p style="margin-top: -15px;">NIP : 081931320003</p>
        </div>
        <div class="petugas">
            <p>Sekretaris</p>
            <p>UPTD SPNF SKB Salatiga</p>
            <br><br><br><br><br>
            <p><u><b>Sekretaris SKB Salatiga</b></u></p>
            <p style="margin-top: -15px;">NIP : 081931320223</p>
        </div>
    </div>
</body>

</html>