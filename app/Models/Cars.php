<?php

namespace App\Models;

use CodeIgniter\Model;

class Cars extends Model
{
    protected $table            = 'cars';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'make', 'model', 'model_year', 'vin'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id'     => 'integer|is_natural_no_zero',
        'make'        => 'required|max_length[50]|string',
        'model'     => 'required|max_length[50]|string',
        'model_year' => 'required|max_length[4]|string',
        'vin' => 'required|max_length[50]|string',
    ];
    protected $validationMessages   = [
        'id' => [
            'integer' => 'Must be integer!',
            'is_unique' => 'Must be unique!',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['checkInsert'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];




    protected function checkInsert(array $data)
    {
        log_message('debug', 'blaa');
        return $data;
    }
}
