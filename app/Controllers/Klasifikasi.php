<?php

namespace App\Controllers;

use App\Models\Model_klasifikasi;

class Klasifikasi extends BaseController
{
	public function __construct()
	{
		$this->Model_klasifikasi = new Model_klasifikasi();
		helper('form');
	}

	public function index()
	{
		$data = array(
			'segment' => \Config\Services::request(),
			'klasifikasi' => $this->Model_klasifikasi->getAllData(),
			'validation' => \Config\Services::validation(),
		);
		return view('klasifikasi/index', $data);
	}


	public function insert()
	{
		if ($this->validate([
			'nama_klasifikasi' => [
				'label'  => 'Nama',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				]
			],

			'jabatan' => [
				'label'  => 'Jabatan',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				]
			],


		])) {

			//jika valid
			$data = [
				'nama_klasifikasi' => htmlspecialchars($this->request->getPost('nama_klasifikasi')),
				'jabatan' => htmlspecialchars($this->request->getPost('jabatan')),
			];
			$this->Model_klasifikasi->insert($data);
			session()->setFlashdata('pesan', 'Klasifikasi Berhasil ditambahkan');
			return redirect()->to('/klasifikasi');
		} else {
			//jika tidak valid
			// session()->setflashdata('errors', \Config\Services::validation()->getErrors());
			// $validation = \Config\Services::validation();
			// return redirect()->to('/user/add')->withInput()->with('validation', $validation);
		}
	}

	public function delete($id_klasifikasi)
	{

		$data = [
			'id_klasifikasi' => $id_klasifikasi

		];
		$this->Model_klasifikasi->hapus($data);
		session()->setFlashdata('pesan', 'User Berhasil dihapus');
		return redirect()->to('/klasifikasi');
	}


	public function update($id_klasifikasi)
	{
		if ($this->validate([
			'nama_klasifikasi' => [
				'label'  => 'Nama',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				]
			],

			'jabatan' => [
				'label'  => 'Jabatan',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				]
			],

		])) {
			$data = [
				'id_klasifikasi' => $id_klasifikasi,
				'nama_klasifikasi' => htmlspecialchars($this->request->getPost('nama_klasifikasi')),
				'jabatan' => $this->request->getPost('jabatan'),
			];
			$this->Model_klasifikasi->edit($data);

			//jika valid
			session()->setFlashdata('pesan', 'Klasifikasi Berhasil Di-Update');
			return redirect()->to(base_url('klasifikasi'));
		} else {
			//jika tidak valid
			session()->setflashdata('errors', \Config\Services::validation()->getErrors());
			$validation = \Config\Services::validation();
			return redirect()->to('/klasifikasi/update/' . $id_klasifikasi)->withInput()->with('validation', $validation);
		}
	}
	//--------------------------------------------------------------------

}
