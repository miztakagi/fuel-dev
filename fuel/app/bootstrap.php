<?php
// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';

\Autoloader::add_classes(array(
	// Add classes you want to override here
	// Example: 'View' => APPPATH.'classes/view.php',

	// 共通関数の読み込み
	'Common' => APPPATH.'classes/controller/common.php',
));

// Register the autoloader
\Autoloader::register();

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
\Fuel::$env = \Arr::get($_SERVER, 'FUEL_ENV', \Arr::get($_ENV, 'FUEL_ENV', \Fuel::DEVELOPMENT));



// Initialize the framework with the config file.
\Fuel::init('config.php');

// 定数設定の読み込み
//require APPPATH.'config/'.Fuel::$env.'/define.php';
require APPPATH.'config/'.Fuel::$env.'/constant.php';
