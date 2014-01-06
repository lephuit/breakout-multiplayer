<?php

namespace Fuel\Migrations;

class Create_produit_categories
{
	public function up()
	{
		\DBUtil::create_table('produit_categories', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'id' => array('constraint' => 11, 'type' => 'int'),
			'nom' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('produit_categories');
	}
}