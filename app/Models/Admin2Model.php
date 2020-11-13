<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin2Model extends Model
{
    protected $table = 'admin_table';
    protected $primaryKey = 'admin_id';

    //  protected $returnType = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['admin_nama', 'admin_email', 'admin_pass,', 'admin_phone'];
    protected $useTimestamps = true;
    //protected $createdField = 'created_at';
    //protected $updatedField = 'updated_at';
    //protected $deletedField = 'deleted_at';

    //protected $validationRules = [];
    //protected $validationMessages = [];
    //protected $skipValidation = false;

    // public function getKomik($slug = false)
    // {
    //     if ($slug == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['slug' => $slug])->first();
    // }

}
