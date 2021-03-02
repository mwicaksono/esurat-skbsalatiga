<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_laporan extends Model
{
    protected $table = 'tb_suratmasuk';

    // SURAT MASUK
    public function getTahun()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT YEAR(tgl_suratmasuk) AS tahun FROM tb_suratmasuk GROUP BY YEAR(tgl_suratmasuk) ORDER BY YEAR(tgl_suratmasuk) ASC");

        return $query->getResult();
    }

    public function filterBulan($tahun1, $bulan_awal, $bulan_akhir)
    {
        $query = $this->db->query("SELECT * FROM tb_suratmasuk WHERE YEAR(tgl_suratmasuk) = '$tahun1' AND MONTH(tgl_suratmasuk) BETWEEN '$bulan_awal' AND '$bulan_akhir' ORDER BY tgl_suratmasuk ASC");

        return $query->getResult();
    }

    public function filterTahun($tahun2)
    {
        $query = $this->db->query("SELECT * FROM tb_suratmasuk WHERE YEAR(tgl_suratmasuk) = '$tahun2' ORDER BY tgl_suratmasuk ASC");

        return $query->getResult();
    }


    public function filterTanggal($tgl_awal, $tgl_akhir)
    {
        $query = $this->db->query("SELECT * FROM tb_suratmasuk WHERE tgl_suratmasuk BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tgl_suratmasuk ASC");

        return $query->getResult();
    }




    // SURAT KELUAR 

    public function getTahunSK()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT YEAR(tgl_suratkeluar) AS tahun FROM tb_suratkeluar GROUP BY YEAR(tgl_suratkeluar) ORDER BY YEAR(tgl_suratkeluar) ASC");

        return $query->getResult();
    }

    public function filterBulanSK($tahun1, $bulan_awal, $bulan_akhir)
    {
        $query = $this->db->query("SELECT * FROM tb_suratkeluar WHERE YEAR(tgl_suratkeluar) = '$tahun1' AND MONTH(tgl_suratkeluar) BETWEEN '$bulan_awal' AND '$bulan_akhir' ORDER BY tgl_suratkeluar ASC");

        return $query->getResult();
    }

    public function filterTahunSK($tahun2)
    {
        $query = $this->db->query("SELECT * FROM tb_suratkeluar WHERE YEAR(tgl_suratkeluar) = '$tahun2' ORDER BY tgl_suratkeluar ASC");

        return $query->getResult();
    }

    public function filterTanggalSK($tgl_awal, $tgl_akhir)
    {
        $query = $this->db->query("SELECT * FROM tb_suratkeluar WHERE tgl_suratkeluar BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tgl_suratkeluar ASC");

        return $query->getResult();
    }
}
