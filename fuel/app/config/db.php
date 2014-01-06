<?php
/**
 * Base Database Config.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	'active' => 'test',

	/**
	 * Base config, just need to set the DSN, username and password in env. config.
	 */
	'prod' => array(
		'type'        => 'pdo',
		'connection'  => array(
			'dsn'        => 'mysql:host=db412219758.db.1and1.com;dbname=db412219758',
			'username'   => 'dbo412219758',
			'password'   => '71370571m62t59!$',
			'persistent' => false,
		),
		'identifier'   => '`',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'enable_cache' => true,
		'profiling'    => false,
	),

	'test' => array(
		'type'        => 'pdo',
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=cassebrique',
			'username'   => 'root',
			'password'   => '',
			'persistent' => false,
		),
		'identifier'   => '`',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'enable_cache' => true,
		'profiling'    => false,
	),

	'redis' => array(
		'default' => array(
			'hostname'  => '127.0.0.1',
			'port'      => 6379,
		)
	),

);
