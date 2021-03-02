<?php

namespace App\Controllers;


use App\Models\Model_user;

class User extends BaseController
{
    public function __construct()
    {

        $this->Model_user = new Model_user();
        helper('form');
    }

    public function index()
    {
        if (session()->get('level') <> 1) {
            return redirect()->to('/home');
        }
        $data = [
            'title' => 'User',
            'segment' => \Config\Services::request(),
            'icon' => '<i class="fa fa-users"></i>',
            'user' => $this->Model_user->getAllData(),

        ];
        return view('user/index', $data);
    }

    public function add()
    {
        if (session()->get('level') <> 1) {
            return redirect()->to('/home');
        }
        $data = array(
            'title' => 'Tambah User',
            'icon' => '<i class="fas fa-user-plus"></i>',
            'segment' => \Config\Services::request(),
            'validation' => \Config\Services::validation(),
        );
        return view('user/add', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'name' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'username' => [
                'label'  => 'Username',
                'rules'  => 'required|is_unique[tb_user.username]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                    'is_unique' => '{field} Sudah Dipakai'
                ]
            ],

            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

        ])) {

            //jika valid
            $data = [
                'name' => htmlspecialchars($this->request->getPost('name')),
                'username' => htmlspecialchars($this->request->getPost('username')),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'level' => $this->request->getPost('level'),
            ];
            $this->Model_user->add($data);
            session()->setFlashdata('pesan', 'User Berhasil ditambahkan');
            return redirect()->to('/user');
        } else {
            //jika tidak valid
            session()->setflashdata('errors', \Config\Services::validation()->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/user/add')->withInput()->with('validation', $validation);
        }
    }

    public function edit($id_user)
    {
        if ($id_user == "1") {
            return redirect()->to('/user');
        }

        $surat = $this->Model_user->detail($id_user);
        if ($surat['id_user'] == NULL) {
            return redirect()->to('/user');
        } else {

            $data = [
                'validation' => \Config\Services::validation(),
                'title' => 'Edit User',
                'segment' => \Config\Services::request(),
                'icon' => '<i class="fas fa-user-edit"></i>',
                'user' => $this->Model_user->detail($id_user),
            ];
            return view('user/edit', $data);
        }
    }

    public function update($id_user)
    {
        if ($this->validate([
            'name' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],

        ])) {
            $data = [
                'id_user' => $id_user,
                'name' => htmlspecialchars($this->request->getPost('name')),
                'level' => $this->request->getPost('level'),
            ];
            $this->Model_user->edit($data);

            //jika valid
            session()->setFlashdata('pesan', 'User Berhasil Di-Update');
            return redirect()->to(base_url('user'));
        } else {

            //jika tidak valid
            session()->setflashdata('errors', \Config\Services::validation()->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/user/edit/' . $id_user)->withInput()->with('validation', $validation);
        }
    }

    public function delete($id_user)
    {
        if (session()->get('level') <> 1) {
            return redirect()->to('/home');
        }
        $data = [
            'id_user' => $id_user

        ];
        $this->Model_user->hapus($data);
        session()->setFlashdata('pesan', 'User Berhasil dihapus');
        return redirect()->to('/user');
    }
}
