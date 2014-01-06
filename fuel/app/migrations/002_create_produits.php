<?php

namespace Fuel\Migrations;

class Create_produits
{
	public function up()
	{
		\DBUtil::create_table('produits', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'id' => array('constraint' => 11, 'type' => 'int'),
			'nom' => array('constraint' => 255, 'type' => 'varchar'),
			'desc' => array('constraint' => 255, 'type' => 'varchar'),
			'prix' => array('constraint' => '3,2', 'type' => 'decimal'),
			'troc' => array('constraint' => 1, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'image' => array('constraint' => 255, 'type' => 'varchar'),
			'image_small' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('produits');
	}
}