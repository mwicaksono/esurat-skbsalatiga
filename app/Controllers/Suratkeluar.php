<?php

namespace App\Controllers;

use App\Models\Model_suratkeluar;

class Suratkeluar extends BaseController
{
    public function __construct()
    {
        $this->Model_suratkeluar = new Model_suratkeluar();
        helper('form');
        helper('tgl_indo');
    }

    public function index()
    {
        $data = [
            'title' => 'Surat Keluar',
            'segment' => \Config\Services::request(),
            'surat' => $this->Model_suratkeluar->getAllData(),
        ];
        return view('suratkeluar/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Surat Keluar',
            'segment' => \Config\Services::request(),
            'validation' => \Config\Services::validation(),
        ];
        return view('suratkeluar/add', $data);
    }

    public function insert()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->validate([
            'no_suratkeluar' => [
                'label'  => 'Nomor Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'no_agenda_suratkeluar' => [
                'label'  => 'Nomor Agenda Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'tgl_suratkeluar' => [
                'label'  => 'Tanggal Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'tujuan_suratkeluar' => [
                'label'  => 'Tujuan Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'isi_suratkeluar' => [
                'label'  => 'Isi Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'keterangan_suratkeluar' => [
                'label'  => 'Keterangan Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'file_suratkeluar' => [
                'label'  => 'File Surat',
                'rules'  => 'uploaded[file_suratkeluar]|max_size[file_suratkeluar,5120]|ext_in[file_suratkeluar,pdf]|mime_in[file_suratkeluar,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 5MB !',
                    'ext_in' => 'Format file {field} wajib PDF !',
                    'mime_in' => 'Format file {field} wajib PDF !',
                    'uploaded' => '{field} wajib diisi !',
                ]
            ]

        ])) {
            //mengambil file yang akan di upload
            $file = $this->request->getFile('file_suratkeluar');

            // nama file foto
            $nama_file = $file->getName();

            //jika valid
            $data = array(
                'no_suratkeluar' => htmlspecialchars($this->request->getPost('no_suratkeluar')),
                'no_agenda_suratkeluar' => htmlspecialchars($this->request->getPost('no_agenda_suratkeluar')),
                'tgl_suratkeluar' => $this->request->getPost('tgl_suratkeluar'),
                'tujuan_suratkeluar' => htmlspecialchars($this->request->getPost('tujuan_suratkeluar')),
                'isi_suratkeluar' => htmlspecialchars($this->request->getPost('isi_suratkeluar')),
                'keterangan_suratkeluar' => htmlspecialchars($this->request->getPost('keterangan_suratkeluar')),
                'tgl_upload_suratkeluar' => date('Y-m-d H:i:s'),
                'update_sk' => date('Y-m-d H:i:s'),
                'id_user' => session()->get('id_user'),
                'status_sk' => 'BARU',
                'file_suratkeluar' => str_replace('_', '-', date('dmygis_') . $nama_file),
            );

            $file->move('file_suratkeluar', str_replace('_', '-', date('dmygis-') . $nama_file)); //directory upload file

            $this->Model_suratkeluar->add($data);
            session()->setFlashdata('pesan', 'Data Surat Berhasil ditambahkan');

            return redirect()->to('/suratkeluar');
        } else {
            //jika tidak valid
            // session()->setflashdata('errors', \Config\Services::validation()->getErrors());
            $validation = \Config\Services::validation()->getErrors();
            return redirect()->to('/suratkeluar/add')->withInput()->with('validation', $validation);
        }
    }

    public function edit($id_suratkeluar)
    {
        $surat = $this->Model_suratkeluar->detail($id_suratkeluar);
        if ($surat['id_suratkeluar'] == NULL) {
            return redirect()->to('/suratkeluar');
        } else {
            $data = [
                'title' => 'Form Edit Surat',
                'segment' => \Config\Services::request(),
                'surat' => $this->Model_suratkeluar->detail($id_suratkeluar),
                'validation' => \Config\Services::validation(),
            ];
            return view('suratkeluar/edit', $data);
        }
    }

    public function update($id_suratkeluar)
    {
        date_default_timezone_set('Asia/Jakarta');

        if ($this->validate([
            'no_suratkeluar' => [
                'label'  => 'Nomor Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'no_agenda_suratkeluar' => [
                'label'  => 'Nomor Agenda Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'tgl_suratkeluar' => [
                'label'  => 'Tanggal Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'tujuan_suratkeluar' => [
                'label'  => 'Tujuan Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'isi_suratkeluar' => [
                'label'  => 'Isi Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'keterangan_suratkeluar' => [
                'label'  => 'Keterangan Surat Keluar',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'file_suratkeluar' => [
                'label'  => 'File Surat',
                'rules'  => 'max_size[file_suratkeluar,5120]|ext_in[file_suratkeluar,pdf]|mime_in[file_suratkeluar,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 5MB !',
                    'ext_in' => 'Format file {field} wajib PDF !',
                    'mime_in' => 'Format file {field} wajib PDF !',

                ]
            ]

        ])) {
            //mengambil file yang akan di upload
            $file = $this->request->getFile('file_suratkeluar');
            if ($file->getError() == 4) {
                // jika file tidak diganti
                $data = array(
                    'id_suratkeluar' => $id_suratkeluar,
                    'no_suratkeluar' => $this->request->getPost('no_suratkeluar'),
                    'no_agenda_suratkeluar' => $this->request->getPost('no_agenda_suratkeluar'),
                    'tgl_suratkeluar' => $this->request->getPost('tgl_suratkeluar'),
                    'tujuan_suratkeluar' => $this->request->getPost('tujuan_suratkeluar'),
                    'isi_suratkeluar' => $this->request->getPost('isi_suratkeluar'),
                    'update_sk' => date('Y-m-d H:i:s'),
                    'status_sk' => 'DIUBAH',
                    'keterangan_suratkeluar' => $this->request->getPost('keterangan_suratkeluar'),
                    'id_user' => session()->get('id_user'),
                );
                $this->Model_suratkeluar->edit($data);
            } else {
                //jika file diganti
                //menghapus file lama
                $surat = $this->Model_suratkeluar->detail($id_suratkeluar);
                if ($surat['file_suratkeluar'] != "") {
                    unlink('file_suratkeluar/' . $surat['file_suratkeluar']);
                }
                //merandom nama file foto
                $nama_file = $file->getName();

                //jika valid
                $data = array(
                    'id_suratkeluar' => $id_suratkeluar,
                    'no_suratkeluar' => $this->request->getPost('no_suratkeluar'),
                    'no_agenda_suratkeluar' => $this->request->getPost('no_agenda_suratkeluar'),
                    'tgl_suratkeluar' => $this->request->getPost('tgl_suratkeluar'),
                    'tujuan_suratkeluar' => $this->request->getPost('tujuan_suratkeluar'),
                    'isi_suratkeluar' => $this->request->getPost('isi_suratkeluar'),
                    'keterangan_suratkeluar' => $this->request->getPost('keterangan_suratkeluar'),
                    'update_sk' => date('Y-m-d H:i:s'),
                    'id_user' => session()->get('id_user'),
                    'status_sk' => 'DIUBAH',
                    'file_suratkeluar' => str_replace('_', '-', date('dmygis_') . $nama_file),
                );
                $file->move('file_suratkeluar', str_replace('_', '-', date('dmygis-') . $nama_file)); //directory upload file
                $this->Model_suratkeluar->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil diperbaharui');

            return redirect()->to('/suratkeluar');
        } else {
            $validation = \Config\Services::validation()->getErrors();
            return redirect()->to('/suratkeluar/edit/' . $id_suratkeluar)->withInput()->with('validation', $validation);
        }
    }

    public function delete($id_suratkeluar)
    {
        //menghapus file lama
        $surat = $this->Model_suratkeluar->detail($id_suratkeluar);
        if ($surat['file_suratkeluar'] != "") {
            unlink('file_suratkeluar/' . $surat['file_suratkeluar']);
        }
        $data = array(
            'id_suratkeluar' => $id_suratkeluar,
        );
        $this->Model_suratkeluar->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');

        return redirect()->to('/suratkeluar');
    }

    public function view($id_suratkeluar)
    {
        $surat = $this->Model_suratkeluar->detail($id_suratkeluar);
        if ($surat['id_suratkeluar'] == NULL) {
            return redirect()->to('/suratkeluar');
        } else {

            $data = array(
                'title' => 'Detail Surat Keluar',
                'segment' => \Config\Services::request(),
                'surat' => $this->Model_suratkeluar->detail($id_suratkeluar),
            );
            return view('suratkeluar/detail', $data);
        }
    }
}
