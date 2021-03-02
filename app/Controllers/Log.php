<?php

namespace App\Controllers;

use App\Models\Model_log;

class Log extends BaseController
{
	public function __construct()
	{
		$this->Model_log = new Model_log();
	}

	public function index()
	{
		$data = array(
			'segment' => \Config\Services::request(),
			'log' => $this->Model_log->getAllData()
		);
		return view('log/index', $data);
	}

	//--------------------------------------------------------------------

}
