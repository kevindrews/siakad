<?php namespace Auth\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
	/*
	 * Users
	 */
    public function up()
    {
    	$this->forge->addField([
        	'id'					=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        	'email'					=> ['type' => 'varchar', 'constraint' => 191],
            'new_email'             => ['type' => 'varchar', 'constraint' => 191, 'null' => true],
        	'password_hash'			=> ['type' => 'varchar', 'constraint' => 191],
        	'name'					=> ['type' => 'varchar', 'constraint' => 191],
            'nim'                   => ['type' => 'varchar', 'constraint' => 191],
        	'activate_hash'			=> ['type' => 'varchar', 'constraint' => 191, 'null' => true],
            'reset_hash'            => ['type' => 'varchar', 'constraint' => 191, 'null' => true],
        	'reset_expires'        	=> ['type' => 'bigint', 'null' => true],
            'role'                  => ['type' => 'enum', 'default' => 'mhs', 'null'=> false, 'constraint'  => ['mhs', 'adm']],
        	'active'				=> ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'created'               => ['type' => 'varchar', 'null' => false, 'constraint' => 191],
        	'created_at'			=> ['type' => 'bigint', 'null' => true],
            'updated_at'            => ['type' => 'bigint', 'null' => true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users', true);
    }

    //--------------------------------------------------------------------

    public function down()
    {
    	$this->forge->dropTable('users', true);
    }
}
