<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=fueldev',
			'username'   => 'nonoveljp',
			'password'   => 'jpnonovel',
		),
	),
);

// return array(
// 	'development' => array(
// 	    'type'           => 'mysqli',
// 	    'connection'     => array(
// 	        'hostname'       => 'localhost',
// 	        'port'           => '3306',
// 	        'database'       => 'fueldev',
// 	        'username'       => 'nonoveljp',
// 	        'password'       => 'jpnonovel',
// 	        'persistent'     => false,
// 	        'compress'       => false,
// 	    ),
// 	    'identifier'   => '`',
// 	    'table_prefix'   => '',
// 	    'charset'        => 'utf8',
// 	    'enable_cache'   => true,
// 	    'profiling'      => false,
// 	),
// 	'production' => array(
//     'type'           => 'mysqli',
//     'connection'     => array(
//         'hostname'       => 'localhost',
//         'port'           => '3306',
//         'database'       => 'fueldb',
//         'username'       => 'nonoveljp',
//         'password'       => 'jpnonovel',
//         'persistent'     => false,
//         'compress'       => false,
//     ),
//     'identifier'   => '`',
//     'table_prefix'   => '',
//     'charset'        => 'utf8',
//     'enable_cache'   => true,
//     'profiling'      => false,
// 	),
// );
