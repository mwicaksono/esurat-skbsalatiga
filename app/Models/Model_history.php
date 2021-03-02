<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_history extends Model
{
    public function getAllDataSM()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM history_sm");
        return $query->getResultArray();
    }

    public function detailSM($id_historysm)
    {
        return $this->db->table('history_sm')
            ->join('tb_user', 'tb_user.id_user = history_sm.id_user', 'left')
            ->where('id_historysm', $id_historysm)
            ->get()
            ->getRowArray();
    }

    public function getAllDataSK()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM history_sk");
        return $query->getResultArray();
    }

    public function detailSK($id_historysk)
    {
        return $this->db->table('history_sk')
            ->join('tb_user', 'tb_user.id_user = history_sk.id_user', 'left')
            ->where('id_historysk', $id_historysk)
            ->get()
            ->getRowArray();
    }
}
