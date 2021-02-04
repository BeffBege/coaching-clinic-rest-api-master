<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up() {
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
				'unique' => TRUE,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			],
			'role' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE,
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
		$this->forge->createTable('admin');
	}

    public function down() {
		$this->forge->dropTable('admin');
    }

}