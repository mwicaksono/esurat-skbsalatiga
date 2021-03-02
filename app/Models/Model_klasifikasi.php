<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_klasifikasi extends Model
{
    protected $table = 'tb_klasifikasi';
    protected $allowedFields = ['nama_klasifikasi', 'jabatan'];



    public function getAllData()
    {
        return $this->db->table('tb_klasifikasi')
            ->get()->getResultArray();
    }

    public function hapus($data)
    {
        $this->db->table('tb_klasifikasi')
            ->where('id_klasifikasi', $data['id_klasifikasi'])
            ->delete($data);
    }

    public function edit($data)
    {
        $this->db->table('tb_klasifikasi')
            ->where('id_klasifikasi', $data['id_klasifikasi'])
            ->update($data);
    }

    public function detail($id_klasifikasi)
    {
        return $this->db->table('tb_klasifikasi')
            ->where('id_klasifikasi', $id_klasifikasi)
            ->get()
            ->getRowArray();
    }
}
