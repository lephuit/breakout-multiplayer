<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'id' => array('constraint' => 11, 'type' => 'int'),
			'nom' => array('constraint' => 255, 'type' => 'varchar'),
			'prenom' => array('constraint' => 255, 'type' => 'varchar'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'ville' => array('constraint' => 255, 'type' => 'varchar'),
			'cp' => array('constraint' => 6, 'type' => 'varchar'),
			'sponso' => array('constraint' => 1, 'type' => 'int'),
			'admin' => array('constraint' => 1, 'type' => 'int'),
			'password' => array('constraint' => 32, 'type' => 'varchar'),
			'login' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}