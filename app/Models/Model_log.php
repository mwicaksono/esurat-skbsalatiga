<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_log extends Model
{
    protected $table = 'log_surat';
    protected $allowedFields = ['id_log', 'no_suratmasuk', 'no_suratkeluar', 'id_user', 'id_klasifikasi', 'perubahan', 'waktu'];

    public function getAllData()
    {
        return $this->db->table('log_surat')
            ->join('tb_user', 'log_surat.id_user = tb_user.id_user', 'left')
            ->join('tb_klasifikasi', 'log_surat.id_klasifikasi = tb_klasifikasi.id_klasifikasi', 'left')
            ->orderBy('waktu', 'DESC')
            ->get()->getResultArray();
    }
}
