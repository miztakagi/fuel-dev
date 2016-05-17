<?php
return array(
			'_root_'       => 'index',
			'_404_'        => 'index/error',    // The main 404 route
			'top'          => 'index',
			'login'        => 'index/login',
			'regist'       => 'index/regist',
			'registagain'  => 'index/registagain',
			'registcheck'  => 'index/registcheck',
			'registcode'   => 'index/registcode',
			'resetmail'    => 'index/resetmail',
			'resetcode'    => 'index/resetcode',
			'resetpass'    => 'index/resetpass',
			'logout'       => '/index/logout',
			'admin'        => '/admin/index',
			'mypage'       => 'member/index',
			'mypage/:page' => 'member/index',
			'blog'         => 'blog/index',
			'about'        => 'site/about',
			'contact'      => 'contact/form',
			
			'stuff'                 => function () {
			// this route only works in development
			if ( \Fuel::$env        == \Fuel::DEVELOPMENT) {
			echo "SECRET!!"; exit;
			return \Request::forge('secret/mystuff/keepout', false)->execute();
			}else{
			throw new HttpNotFoundException('This page is only accessable in development.');
			}
			}
);
