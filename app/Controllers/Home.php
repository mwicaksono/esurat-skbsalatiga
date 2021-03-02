<?php

namespace App\Controllers;

use App\Models\Model_home;

class Home extends BaseController
{
	public function __construct()
	{
		$this->Model_home = new Model_home();
	}

	public function index()
	{
		$data = array(
			'segment' => \Config\Services::request(),
			'countSuratMasuk' => $this->Model_home->countSuratMasuk(),
			'countSuratKeluar' => $this->Model_home->countSuratKeluar(),
			'countUser' => $this->Model_home->countUser(),
			'countDisposisi' => $this->Model_home->countDisposisi(),
			'countFileMasuk' => $this->Model_home->countFileMasuk(),
			'countFileKeluar' => $this->Model_home->countFileKeluar(),
			'chart' => $this->Model_home->getAllData(),
		);
		return view('/index', $data);
	}

	//--------------------------------------------------------------------

}
