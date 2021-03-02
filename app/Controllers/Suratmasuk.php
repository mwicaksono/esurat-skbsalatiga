<?php

namespace App\Controllers;

use App\Models\Model_suratmasuk;

class Suratmasuk extends BaseController
{
    public function __construct()
    {
        $this->Model_suratmasuk = new Model_suratmasuk();

        helper('form');
        helper('tgl_indo');
    }

    public function index()
    {
        $data = [
            'title' => 'Surat Masuk',
            'segment' => \Config\Services::request(),
            'surat' => $this->Model_suratmasuk->getAllData(),
        ];
        return view('suratmasuk/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Surat',
            'segment' => \Config\Services::request(),
            'validation' => \Config\Services::validation(),
        ];
        return view('suratmasuk/add', $data);
    }

    public function insert()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->validate([
            'no_suratmasuk' => [
                'label'  => 'Nomor Surat',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'no_agenda' => [
                'label'  => 'Nomor Agenda',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],


            'pengirim' => [
                'label'  => 'Pengirim',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'tgl_suratmasuk' => [
                'label'  => 'Tanggal Surat',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'tgl_diterima' => [
                'label'  => 'Tanggal Diterima',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'isi_suratmasuk' => [
                'label'  => 'Isi Ringkas',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'keterangan' => [
                'label'  => 'Keterangan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'file' => [
                'label'  => 'File Surat',
                'rules'  => 'uploaded[file]|max_size[file,5120]|ext_in[file,pdf]|mime_in[file,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 5MB !',
                    'ext_in' => 'Format file {field} wajib PDF !',
                    'uploaded' => '{field} wajib diisi !',
                ]
            ]

        ])) {
            //mengambil file foto yang akan di upload
            $file = $this->request->getFile('file');
            // nama file foto
            $nama_file = $file->getName();

            //jika valid
            $data = array(
                'no_suratmasuk' => htmlspecialchars($this->request->getPost('no_suratmasuk')),
                'no_agenda' => htmlspecialchars($this->request->getPost('no_agenda')),
                'tgl_suratmasuk' => $this->request->getPost('tgl_suratmasuk'),
                'tgl_diterima' => $this->request->getPost('tgl_diterima'),
                'isi_suratmasuk' => htmlspecialchars($this->request->getPost('isi_suratmasuk')),
                'pengirim' => htmlspecialchars($this->request->getPost('pengirim')),
                'keterangan' => htmlspecialchars($this->request->getPost('keterangan')),
                'tgl_upload' => date('Y-m-d H:i:s'),
                'update_sm' => date('Y-m-d H:i:s'),
                'status_sm' => 'BARU',
                'id_user' => session()->get('id_user'),
                'file' => str_replace('_', '-', date('dmygis_') . $nama_file),

            );

            $file->move('file', str_replace('_', '-', date('dmygis-') . $nama_file)); //directory upload file

            $this->Model_suratmasuk->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');

            return redirect()->to('/suratmasuk');
        } else {
            //jika tidak valid

            $validation = \Config\Services::validation()->getErrors();
            return redirect()->to('/suratmasuk/add')->withInput()->with('validation', $validation);
        }
    }

    public function edit($id_suratmasuk)
    {
        $surat = $this->Model_suratmasuk->detail($id_suratmasuk);
        if ($surat['id_suratmasuk'] == NULL) {
            return redirect()->to('/suratmasuk');
        } else {

            $data = array(
                'title' => 'Edit Surat',
                'segment' => \Config\Services::request(),
                'surat' => $this->Model_suratmasuk->detail($id_suratmasuk),
                'validation' => \Config\Services::validation(),
            );
            return view('suratmasuk/edit', $data);
        }
    }

    public function update($id_suratmasuk)
    {
        date_default_timezone_set('Asia/Jakarta');

        if ($this->validate([
            'no_suratmasuk' => [
                'label'  => 'Nomor Surat',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'no_agenda' => [
                'label'  => 'Nomor Agenda',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],


            'pengirim' => [
                'label'  => 'Pengirim',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'tgl_suratmasuk' => [
                'label'  => 'Tanggal Surat',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'tgl_diterima' => [
                'label'  => 'Tanggal Diterima',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'isi_suratmasuk' => [
                'label'  => 'isi Ringkas',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'keterangan' => [
                'label'  => 'Keterangan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'file' => [
                'label'  => 'File Surat',
                'rules'  => 'max_size[file,5120]|ext_in[file,pdf]|mime_in[file,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 5MB !',
                    'ext_in' => 'Format file {field} wajib PDF !',
                ]
            ]


        ])) {
            //mengambil file foto yang akan di upload
            $file = $this->request->getFile('file');
            if ($file->getError() == 4) {
                // jika file tidak diganti
                $data = array(
                    'id_suratmasuk' => $id_suratmasuk,
                    'no_suratmasuk' => htmlspecialchars($this->request->getPost('no_suratmasuk')),
                    'no_agenda' => htmlspecialchars($this->request->getPost('no_agenda')),
                    'tgl_suratmasuk' => $this->request->getPost('tgl_suratmasuk'),
                    'tgl_diterima' => $this->request->getPost('tgl_diterima'),
                    'pengirim' => htmlspecialchars($this->request->getPost('pengirim')),
                    'isi_suratmasuk' => htmlspecialchars($this->request->getPost('isi_suratmasuk')),
                    'keterangan' => htmlspecialchars($this->request->getPost('keterangan')),
                    'update_sm' => date('Y-m-d H:i:s'),
                    'status_sm' => 'DIUBAH',
                    'id_user' => session()->get('id_user'),
                );
                $this->Model_suratmasuk->edit($data);
            } else {
                //jika file diganti
                //menghapus foto lama
                $surat = $this->Model_suratmasuk->detail($id_suratmasuk);
                if ($surat['file'] != "") {
                    unlink('file/' . $surat['file']);
                }
                //merandom nama file foto
                $nama_file = $file->getName();
                //mengambil ukuran file

                //jika valid
                $data = array(
                    'id_suratmasuk' => $id_suratmasuk,
                    'no_suratmasuk' => htmlspecialchars($this->request->getPost('no_suratmasuk')),
                    'no_agenda' => htmlspecialchars($this->request->getPost('no_agenda')),
                    'tgl_suratmasuk' => $this->request->getPost('tgl_suratmasuk'),
                    'tgl_diterima' => $this->request->getPost('tgl_diterima'),
                    'pengirim' => htmlspecialchars($this->request->getPost('pengirim')),
                    'isi_suratmasuk' => htmlspecialchars($this->request->getPost('isi_suratmasuk')),
                    'keterangan' => htmlspecialchars($this->request->getPost('keterangan')),
                    'update_sm' => date('Y-m-d H:i:s'),
                    'status_sm' => 'DIUBAH',
                    'id_user' => session()->get('id_user'),
                    'file' => str_replace('_', '-', date('dmygis_') . $nama_file),
                );
                $file->move('file', str_replace('_', '-', date('dmygis-') . $nama_file)); //directory upload file
                $this->Model_suratmasuk->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil di-update');

            return redirect()->to('/suratmasuk');
        } else {
            //jika tidak valid
            $validation = \Config\Services::validation()->getErrors();
            return redirect()->to('/suratmasuk/edit/' . $id_suratmasuk)->withInput()->with('validation', $validation);
        }
    }

    public function delete($id_suratmasuk)
    {
        //menghapus foto lama
        $surat = $this->Model_suratmasuk->detail($id_suratmasuk);
        if ($surat['file'] != "") {
            unlink('file/' . $surat['file']);
        }

        $data = array(
            'id_suratmasuk' => $id_suratmasuk,
        );

        $this->Model_suratmasuk->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/suratmasuk');
    }

    public function view($id_suratmasuk)
    {
        $surat = $this->Model_suratmasuk->detail($id_suratmasuk);
        if ($surat['id_suratmasuk'] == NULL) {
            return redirect()->to('/suratmasuk');
        } else {

            $data = array(
                'title' => 'Detail Surat Masuk',
                'segment' => \Config\Services::request(),
                'surat' => $this->Model_suratmasuk->detail($id_suratmasuk),

            );
            return view('suratmasuk/detail', $data);
        }
    }

    public function disposisi($id_surat)
    {
        $surat = $this->Model_surat->detail($id_surat);
        if ($surat['id_surat'] == NULL) {
            return redirect()->to(base_url('surat'));
        } else {

            $data = array(
                'title' => 'Disposisi Surat',
                'segment' => \Config\Services::request(),
                'icon' => '<i class="fas fa-file-contract"></i>',
                'isi' => 'surat/v_disposisi',
                'surat' => $this->Model_surat->detail($id_surat),
                'disposisi' => $this->Model_surat->detail_disposisi($id_surat)
            );
            return view('layout/v_wrapper', $data);
        }
    }

    public function add_disposisi($id_surat)
    {


        $data = array(
            'title' => 'Tambah Disposisi Surat',
            'segment' => \Config\Services::request(),
            'icon' => '<i class="fas fa-file-contract"></i>',
            'isi' => 'surat/v_add_disposisi',
            'surat' => $this->Model_surat->detail($id_surat)
        );
        return view('layout/v_wrapper', $data);
    }

    public function insert_disposisi($id_surat)
    {

        date_default_timezone_set('Asia/Jakarta');

        if ($this->validate([

            'tujuan' => [
                'label'  => 'Tujuan Disposisi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'isi_disposisi' => [
                'label'  => 'Isi Disposisi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ]

        ])) {

            //jika valid
            $data = array(
                'id_disposisi' => htmlspecialchars($this->request->getPost('id_disposisi')),
                'tujuan' => htmlspecialchars($this->request->getPost('tujuan')),
                'isi_disposisi' => htmlspecialchars($this->request->getPost('isi_disposisi')),
                'tgl_input' => date('Y-m-d H:i:s'),
                'id_surat' => $id_surat,
                'id_user' => session()->get('id_user'),
            );

            $this->Model_surat->add_disposisi($data);
            session()->setFlashdata('pesan', 'Disposisi Berhasil ditambahkan');
            $surat = $this->Model_surat->detail($id_surat);
            return redirect()->to(base_url('surat/disposisi/' . $surat['id_surat']));
        } else {
            //jika tidak valid
            session()->setflashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('surat/disposisi'));
        }
    }

    public function delete_disposisi($id_surat, $id_disposisi)
    {


        $data = array(
            'id_disposisi' => $id_disposisi,
            'id_surat' => $id_surat
        );

        $this->Model_surat->hapus_disposisi($data);
        session()->setFlashdata('pesan', 'Disposisi Berhasil dihapus');

        return redirect()->to(base_url('surat/disposisi/' . $id_surat));
    }

    public function edit_disposisi($id_surat)
    {
        $data = array(
            'title' => 'Form Edit Disposisi Surat',
            'segment' => \Config\Services::request(),
            'icon' => '<i class="fa fa-edit"></i>',
            'surat' => $this->Model_surat->detail($id_surat),
            'disposisi' => $this->Model_surat->detail_disposisi_edit($id_surat),
            'isi' => 'surat/v_edit_disposisi'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update_disposisi($id_surat, $id_disposisi)
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->validate([

            'tujuan' => [
                'label'  => 'Tujuan Disposisi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'isi_disposisi' => [
                'label'  => 'Isi Disposisi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ]

        ])) {

            //jika valid
            $data = array(
                'id_disposisi' => $id_disposisi,
                'tujuan' => htmlspecialchars($this->request->getPost('tujuan')),
                'isi_disposisi' => htmlspecialchars($this->request->getPost('isi_disposisi')),
                'tgl_input' => date('Y-m-d H:i:s'),
                'id_surat' => $id_surat,
                'id_user' => session()->get('id_user'),
            );

            $this->Model_surat->edit_disposisi($data);
            session()->setFlashdata('pesan', 'Disposisi Berhasil di update');
            return redirect()->to(base_url('surat/disposisi/' . $id_surat));
        } else {
            //jika tidak valid
            session()->setflashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('surat'));
        }
    }
}
