<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member_table';
    protected $primaryKey = 'member_id';

    //  protected $returnType = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['member_nama', 'member_email', 'member_pass,', 'member_phone'];

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
