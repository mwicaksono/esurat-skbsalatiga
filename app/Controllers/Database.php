<?php

namespace App\Controllers;

use App\Models\Model_home;

class Database extends BaseController
{
    public function __construct()
    {
        session();

        if (session()->get('level') != 1) {
            redirect()->to('/home');
        }
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'segment' => \Config\Services::request(),
        ];
        return view('database/index', $data);
    }


    //--------------------------------------------------------------------

}
