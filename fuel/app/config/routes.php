<?php
return array(
	//'_root_'  => 'index',  // The default route
	'_root_'   => 'index',
	'_404_'    => 'index/error',    // The main 404 route
	'welcome'  => 'welcome/index',  // The default route
	'blog'   => 'blog/index',
	'about'   => 'site/about',
	'contact' => 'contact/form',
	'admin'   => 'admin/login',
	'(:num)/about'     => 'site/about/$1', // Routes /12/about to /site/about/12
	'blog/:year/:month/:id' => 'blog/entry', // Routes /blog/2010/11/entry_name to /blog/entry
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

	'stuff' => function () {
		// this route only works in development
		if ( \Fuel::$env == \Fuel::DEVELOPMENT) {
			echo "SECRET!!"; exit;
			return \Request::forge('secret/mystuff/keepout', false)->execute();
		}else{
			throw new HttpNotFoundException('This page is only accessable in development.');
		}
	}
);
