<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_suratkeluar extends Model
{
    public function getAllData()
    {
        return $this->db->table('tb_suratkeluar')
            ->join('tb_user', 'tb_user.id_user = tb_suratkeluar.id_user', 'left')
            ->orderBy('id_suratkeluar', 'DESC')
            ->get()->getResultArray();
    }


    public function add($data)
    {
        $this->db->table('tb_suratkeluar')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tb_suratkeluar')
            ->where('id_suratkeluar', $data['id_suratkeluar'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tb_suratkeluar')
            ->where('id_suratkeluar', $data['id_suratkeluar'])
            ->delete($data);
    }

    public function detail($id_suratkeluar)
    {
        return $this->db->table('tb_suratkeluar')
            ->join('tb_user', 'tb_user.id_user = tb_suratkeluar.id_user', 'left')
            ->where('id_suratkeluar', $id_suratkeluar)
            ->get()
            ->getRowArray();
    }
}
