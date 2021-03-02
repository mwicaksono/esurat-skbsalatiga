<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_home extends Model
{
    public function countSuratMasuk()
    {

        return $this->db->table('tb_suratmasuk')
            ->countAllResults();
    }

    public function countSuratKeluar()
    {

        return $this->db->table('tb_suratkeluar')
            ->countAllResults();
    }

    public function countUser()
    {
        return $this->db->table('tb_user')->countAll();
    }

    public function countDisposisi()
    {
        return $this->db->table('tb_disposisi')->countAll();
    }

    public function countFileMasuk()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_suratmasuk');        // 'mytablename' is the name of your table

        $builder->select('file');       // names of your columns
        $query = $builder->countAll();
        return $query;
    }

    public function countFileKeluar()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_suratkeluar');        // 'mytablename' is the name of your table

        $builder->select('file_suratkeluar');       // names of your columns
        $query = $builder->countAll();
        return $query;
    }

    public function getAllData()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_suratmasuk");
        return $query->getResult();
    }
}
