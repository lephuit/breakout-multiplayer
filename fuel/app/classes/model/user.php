<?php
use Orm\Model;

class Model_User extends Model
{
	protected static $_properties = array(
		'id',
		'nom',
		'prenom',
		'email',
		'image',
		'image_small',
		'username',
		'password',
		'created_at',
		'updated_at',
		'login_hash',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('nom', 'Nom', 'required|max_length[255]');
		$val->add_field('prenom', 'Prénom', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('username', 'Pseudo', 'required|max_length[255]');

		return $val;
	}

}
