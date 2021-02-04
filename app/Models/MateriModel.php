<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class MateriModel extends Model {
 
    protected $table = 'materi';
    protected $primarykey = 'id';
    protected $allowedFields = ['nama_materi', 'jenis_materi', 'deskripsi_materi', 'file_materi', 'jenis_coaching', 'idpembuat_materi', 'pembuat_materi'];
    protected $useTimeStamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    // protected $validationRules = [
    //     'name' => 'required',
    //     'email' => 'required|valid_email|is_unique[users.email]',
    //     'password' => 'required|min_length[8]'
    // ];

    // protected $validationMessages = [
    //     'email' => [
    //         'is_unique' => 'Sorry, That email has already been taken. Please choose another.'
    //     ]
    // ];

    // protected $skipValidation = false;
    // protected $beforeInsert = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }


    public function getMateri($id = false)
    {
        if($id === false){
            return $this->db->table($this->table)->get()->getResult();
        } else {
            return $this->getWhere(['id' => $id])->getRowArray();
        }  
    }
}