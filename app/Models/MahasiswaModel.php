<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mhs_table';
    protected $primaryKey = 'mhs_id';

    //  protected $returnType = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['mhs_nama', 'mhs_tempat', 'mhs_tgl', 'mhs_jk',];

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
