<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Materi extends Migration
{
    public function up() {
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'nama_materi' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			],
			'jenis_materi' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			],
			'deskripsi_materi' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'file_materi' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			],
			'jenis_coaching' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			],
			'idpembuat_materi' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'null' => FALSE,
			],
			'pembuat_materi' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
				'unique' => TRUE,
			],
			'created_at'       => [
                'type'              => 'TIMESTAMP',
            ],
            'updated_at'       => [
                'type'              => 'DATE',
            ],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('materi');
	}

    public function down() {
		$this->forge->dropTable('materi');
    }

}