<?php namespace App\Database\Migrations;
 
use CodeIgniter\Database\Migration;
 
class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE,
            ],
            'nama'          => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => FALSE,
            ],
            'jenis_kelamin'        => [
                'type'              => 'VARCHAR',
                'constraint'        => 15,
            ],
            'peran'       => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'no_telp'         => [
                'type'              => 'VARCHAR',
                'constraint'        => 13,
            ],
            'gambar_profil'       => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'created_at'       => [
                'type'              => 'TIMESTAMP',
            ],
            'updated_at'       => [
                'type'              => 'DATE',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users');
    }
 
    public function down()
    {
        //
    }
}