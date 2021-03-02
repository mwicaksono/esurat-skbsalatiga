<?php

namespace App\Controllers;

use App\Models\Model_suratmasuk;
use App\Models\Model_klasifikasi;

class Disposisi extends BaseController

{
    public function __construct()
    {
        $this->Model_suratmasuk = new Model_suratmasuk();
        $this->Model_klasifikasi = new Model_klasifikasi();

        helper('form');
        helper('tgl_indo');
    }

    public function index($id_suratmasuk)
    {
        $surat = $this->Model_suratmasuk->detail($id_suratmasuk);
        if ($surat['id_suratmasuk'] == NULL) {
            return redirect()->to('/suratmasuk');
        } else {

            $data = array(
                'title' => 'Disposisi Surat',
                'segment' => \Config\Services::request(),
                'surat' => $this->Model_suratmasuk->detail($id_suratmasuk),
                'disposisi' => $this->Model_suratmasuk->detail_disposisi($id_suratmasuk)

            );
            return view('disposisi/index', $data);
        }
    }

    public function add($id_suratmasuk)
    {


        $data = array(
            'title' => 'Tambah Disposisi Surat',
            'segment' => \Config\Services::request(),
            'surat' => $this->Model_suratmasuk->detail($id_suratmasuk),
            'validation' => \Config\Services::validation(),
            'klasifikasi' => $this->Model_klasifikasi->getAllData()
        );
        return view('disposisi/add', $data);
    }

    public function insert($id_suratmasuk)
    {

        date_default_timezone_set('Asia/Jakarta');

        if ($this->validate([


            'isi_disposisi' => [
                'label'  => 'Isi Disposisi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'batas_waktu' => [
                'label'  => 'Batas Waktu',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'sifat_surat' => [
                'label'  => 'Sifat Surat',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'catatan' => [
                'label'  => 'Catatan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],

            'id_klasifikasi' => [
                'label'  => 'Tujuan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ]

        ])) {

            //jika valid
            $data = array(
                'id_disposisi' => htmlspecialchars($this->request->getPost('id_disposisi')),
                'isi_disposisi' => htmlspecialchars($this->request->getPost('isi_disposisi')),
                'batas_waktu' => htmlspecialchars($this->request->getPost('batas_waktu')),
                'sifat_surat' => htmlspecialchars($this->request->getPost('sifat_surat')),
                'catatan' => htmlspecialchars($this->request->getPost('catatan')),
                'create_disp' => date('Y-m-d H:i:s'),
                'id_suratmasuk' => $id_suratmasuk,
                'id_klasifikasi' => $this->request->getPost('id_klasifikasi'),
                'id_user' => session()->get('id_user')
            );

            $this->Model_suratmasuk->add_disposisi($data);
            session()->setFlashdata('pesan', 'Disposisi Berhasil ditambahkan');
            $surat = $this->Model_suratmasuk->detail($id_suratmasuk);
            return redirect()->to('/disposisi/index/' . $surat['id_suratmasuk']);
        } else {
            //jika tidak valid
            $surat = $this->Model_suratmasuk->detail($id_suratmasuk);
            $validation = \Config\Services::validation()->getErrors();
            return redirect()->to('/disposisi/add/' . $surat['id_suratmasuk'])->withInput()->with('validation', $validation);
        }
    }

    public function delete($id_disposisi, $id_suratmasuk)
    {


        $data = array(
            'id_disposisi' => $id_disposisi,
            'id_suratmasuk' => $id_suratmasuk,
            'id_user' => session()->get('id_user')
        );

        $this->Model_suratmasuk->hapus_disposisi($data);
        session()->setFlashdata('pesan', 'Disposisi Berhasil dihapus');
        return redirect()->to('/disposisi/index/' . $id_suratmasuk);
    }


    public function view($id_suratmasuk)
    {
        $surat = $this->Model_suratmasuk->detail_disposisi_edit($id_suratmasuk);
        if ($surat['id_suratmasuk'] == NULL) {
            return redirect()->to('/disposisi/index/' . $id_suratmasuk);
        } else {

            $data = array(
                'title' => 'Form Edit Disposisi Surat',
                'segment' => \Config\Services::request(),
                'surat' => $this->Model_suratmasuk->detail($id_suratmasuk),
                'disposisi' => $this->Model_suratmasuk->detail_disposisi_edit($id_suratmasuk),

            );
            return view('disposisi/detail', $data);
        }
    }
}
