<?php

namespace App\Controllers;

use App\Models\Model_laporan;
use PDO;

class Laporan extends BaseController
{
    public function __construct()
    {

        $this->Model_laporan = new Model_laporan();
        helper('tgl_indo');
        helper('form');
    }

    public function suratmasuk()
    {

        $data = [
            'tahun' => $this->Model_laporan->getTahun(),
            'segment' => \Config\Services::request(),
        ];

        return view('laporan/suratmasuk', $data);
    }

    public function filter()
    {
        $tgl_awal = $this->request->getVar('tgl_awal');
        $tgl_akhir = $this->request->getVar('tgl_akhir');
        $tahun1 = $this->request->getVar('tahun1');
        $tahun2 = $this->request->getVar('tahun2');
        $bulan_awal = $this->request->getVar('bulan_awal');
        $bulan_akhir = $this->request->getVar('bulan_akhir');
        $nilaiFilter = $this->request->getVar('nilaiFilter');

        if ($nilaiFilter == 1) {
            $data = [
                'title' => "Laporan Surat Masuk",
                'subtitle' => "Periode <b>" .  date_indo($tgl_awal) . "</b> - <b>" . date_indo($tgl_akhir) . "</b>",
                'dataFilter' => $this->Model_laporan->filterTanggal($tgl_awal, $tgl_akhir),
            ];
            return view('laporan/print_sm', $data);
        } elseif ($nilaiFilter == 2) {
            $data = [
                'title' => "Laporan Surat Masuk",
                'subtitle' => "Periode <b>" . bulan($bulan_awal) . "</b> - <b>" . bulan($bulan_akhir) . " " . $tahun1 . "</b>",
                'dataFilter' => $this->Model_laporan->filterBulan($tahun1, $bulan_awal, $bulan_akhir),
            ];

            return view('laporan/print_sm', $data);
        } elseif ($nilaiFilter == 3) {
            $data = [
                'title' => "Laporan Surat Masuk",
                'subtitle' => "<b>Tahun " . $tahun2 . "</b>",
                'dataFilter' => $this->Model_laporan->filterTahun($tahun2),
            ];



            return view('laporan/print_sm', $data);
        }
    }

    public function suratkeluar()
    {

        $data = [
            'tahun' => $this->Model_laporan->getTahunSK(),
            'segment' => \Config\Services::request(),
        ];

        return view('laporan/suratkeluar', $data);
    }

    public function filterSK()
    {
        $tgl_awal = $this->request->getVar('tgl_awal');
        $tgl_akhir = $this->request->getVar('tgl_akhir');
        $tahun1 = $this->request->getVar('tahun1');
        $tahun2 = $this->request->getVar('tahun2');
        $bulan_awal = $this->request->getVar('bulan_awal');
        $bulan_akhir = $this->request->getVar('bulan_akhir');
        $nilaiFilter = $this->request->getVar('nilaiFilter');

        if ($nilaiFilter == 1) {
            $data = [
                'title' => "Laporan Surat Keluar",
                'subtitle' => "Periode <b>" .  date_indo($tgl_awal) . "</b> - <b>" . date_indo($tgl_akhir) . "</b>",
                'dataFilter' => $this->Model_laporan->filterTanggalSK($tgl_awal, $tgl_akhir),
            ];
            return view('laporan/print_sk', $data);
        } elseif ($nilaiFilter == 2) {
            $data = [
                'title' => "Laporan Surat Keluar",
                'subtitle' => "Periode <b>" . bulan($bulan_awal) . "</b> - <b>" . bulan($bulan_akhir) . " " . $tahun1 . "</b>",
                'dataFilter' => $this->Model_laporan->filterBulanSK($tahun1, $bulan_awal, $bulan_akhir),
            ];

            return view('laporan/print_sk', $data);
        } elseif ($nilaiFilter == 3) {
            $data = [
                'title' => "Laporan Surat Keluar",
                'subtitle' => "<b>Tahun " . $tahun2 . "</b>",
                'dataFilter' => $this->Model_laporan->filterTahunSK($tahun2),
            ];



            return view('laporan/print_sk', $data);
        }
    }
}
