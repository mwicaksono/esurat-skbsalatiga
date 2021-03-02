<?php

namespace App\Controllers;

use App\Models\Model_history;

class History extends BaseController
{
	public function __construct()
	{
		$this->Model_history = new Model_history();
		helper('tgl_indo');
	}

	public function suratmasuk()
	{
		$data = array(
			'segment' => \Config\Services::request(),
			'suratmasuk' => $this->Model_history->getAllDataSM(),


		);
		return view('history/suratmasuk', $data);
	}



	public function suratkeluar()
	{
		$data = array(
			'segment' => \Config\Services::request(),
			'suratkeluar' => $this->Model_history->getAllDataSK(),

		);
		return view('history/suratkeluar', $data);
	}
	//--------------------------------------------------------------------
	public function view_sk($id_historysk)
	{
		$surat = $this->Model_history->detailSK($id_historysk);
		if ($surat['id_historysk'] == NULL) {
			return redirect()->to('/history/suratkeluar');
		} else {

			$data = array(
				'segment' => \Config\Services::request(),
				'surat' => $this->Model_history->detailSK($id_historysk),

			);
			return view('history/detail_sk', $data);
		}
	}

	public function view_sm($id_historysm)
	{
		$surat = $this->Model_history->detailSM($id_historysm);
		if ($surat['id_historysm'] == NULL) {
			return redirect()->to('/history/suratmasuk');
		} else {

			$data = array(
				'segment' => \Config\Services::request(),
				'surat' => $this->Model_history->detailSM($id_historysm),

			);
			return view('history/detail_sm', $data);
		}
	}
}
