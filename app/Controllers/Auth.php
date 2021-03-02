<?php

namespace App\Controllers;

use App\Models\Model_auth;
use App\Models\Model_user;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_auth = new Model_auth();
        $this->Model_user = new Model_user();
    }
    public function index()
    {
        $data = [
            'title' => 'Login',
            'user' => $this->Model_user->getAllData()
        ];
        return view('auth/index', $data);
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi'
                ]
            ],

            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi'
                ]
            ]
        ])) {
            //jika  valid
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $data = $this->Model_auth->tes($username);
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $data = [
                    'log' => TRUE,
                    'id_user' => $data['id_user'],
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'level' => $data['level'],
                ];
                session()->set($data);

                session()->setflashdata('pesan', '<b>Login</b> berhasil, Selamat datang ');
                return redirect()->to('/home');
            } else {
                //jika tidak valid
                session()->setflashdata('pesan', 'Username atau Password salah');
                return redirect()->to('/auth/index');
            }
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('name');
        session()->remove('username');
        session()->remove('level');

        session()->setflashdata('pesan', 'Anda telah berhasil logout');
        return redirect()->to('/auth/index');
    }
}
