<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPegawai extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['pegawai_nip', 'pegawai_nama', 'pegawai_email'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    function pdn_cekData()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $query   = $builder->select($this->allowedFields);
        $query   = $builder->get();
        return $query->getNumRows();
    }
    function pdn_view($_id = false)
    {
        $db = \Config\Database::connect();
        if ($_id == false) {
            $builder = $db->table($this->table);
            $query   = $builder->select($this->allowedFields);
            $query   = $builder->get();
            return $query->getResult();
        }
        $builder = $db->table($this->table);
        $query   = $builder->select($this->allowedFields);
        $query   = $builder->where($this->primaryKey, $_id);
        $query   = $builder->get();
        return $query->getResult();
    }
}
