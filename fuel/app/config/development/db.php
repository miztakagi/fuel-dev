<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'active' => 'fueldb',
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=fueldb',
			'username'   => 'nonoveljp',
			'password'   => 'jpnonovel',
		),
	),
	'fueldb' => array(
		'type'   => 'mysqli',
		'connection' => array(
			'hostname'   => 'localhost',
			'database'   => 'fueldb',
			'username'   => 'nonoveljp',
			'password'   => 'jpnonovel',
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => false,
		'profiling'    => true,
	),
);
