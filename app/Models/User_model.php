<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class User_model extends Model {
 
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $allowedFields = [
        'nama', 
        'password',
        'tanggal_lahir',
        'jenis_kelamin', 
        'peran', 
        'no_telp',
        'gambar_profil'
    ];
    protected $useTimeStamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    

    public function getUser($id = false)
    {
        if($id === false){
            return $this->db->table($this->table)->get()->getResult();
        } else {
            return $this->getWhere(['id' => $id])->getRowArray();
        }  
    }
}