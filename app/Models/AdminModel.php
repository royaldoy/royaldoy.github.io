<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'event_table';
    protected $primaryKey = 'event_id';

    //  protected $returnType = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['event_nama', 'event_penyelenggara', 'event_deskripsi', 'event_tanggal', 'event_tempat', 'event_peserta', 'event_peserta_isi', 'event_status'];

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
