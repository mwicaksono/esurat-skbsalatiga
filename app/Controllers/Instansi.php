<?php

namespace App\Controllers;

class Instansi extends BaseController
{
	public function index()
	{
		$data = array(
			'segment' => \Config\Services::request(),
		);

		return view('instansi/index', $data);
	}

	//--------------------------------------------------------------------

}
