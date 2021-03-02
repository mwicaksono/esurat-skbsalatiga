<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_suratmasuk extends Model
{
    public function getAllData()
    {
        return $this->db->table('tb_suratmasuk')
            ->join('tb_user', 'tb_user.id_user = tb_suratmasuk.id_user', 'left')
            ->orderBy('id_suratmasuk', 'DESC')
            ->get()->getResultArray();
    }


    public function add($data)
    {
        $this->db->table('tb_suratmasuk')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tb_suratmasuk')
            ->where('id_suratmasuk', $data['id_suratmasuk'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tb_suratmasuk')
            ->where('id_suratmasuk', $data['id_suratmasuk'])
            ->delete($data);
    }



    public function detail($id_suratmasuk)
    {
        return $this->db->table('tb_suratmasuk')
            ->join('tb_user', 'tb_user.id_user = tb_suratmasuk.id_user', 'left')
            ->where('id_suratmasuk', $id_suratmasuk)
            ->get()
            ->getRowArray();
    }

    public function add_disposisi($data)
    {
        $this->db->table('tb_disposisi')->insert($data);
    }

    public function hapus_disposisi($data)
    {
        $this->db->table('tb_disposisi')
            ->where('id_disposisi', $data['id_disposisi'])
            ->delete($data);
    }

    public function detail_disposisi($id_suratmasuk)
    {
        return $this->db->table('tb_disposisi')
            ->join('tb_klasifikasi', 'tb_klasifikasi.id_klasifikasi = tb_disposisi.id_klasifikasi', 'left')
            ->where('id_suratmasuk', $id_suratmasuk)
            ->get()
            ->getResultArray();
    }

    public function detail_disposisi_edit($id_disposisi)
    {
        return $this->db->table('tb_disposisi')
            ->join('tb_klasifikasi', 'tb_klasifikasi.id_klasifikasi = tb_disposisi.id_klasifikasi', 'left')
            ->join('tb_user', 'tb_user.id_user = tb_disposisi.id_user', 'left')
            ->where('id_disposisi', $id_disposisi)
            ->get()
            ->getRowArray();
    }

    public function edit_disposisi($data)
    {
        $this->db->table('tb_disposisi')
            ->where('id_disposisi', $data['id_disposisi'])
            ->update($data);
    }

    public function getIdsuratmasuk()
    {
        $this->db->table('tb_disposisi')
            ->get('id_suratmasuk')
            ->getRowArray();
    }
}
