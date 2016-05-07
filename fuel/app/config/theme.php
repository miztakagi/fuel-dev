<?php
	if (Agent::is_mobiledevice()) {
		$active='mobile'; //モバイルの場合　themes/mobile内のファイルを読み込み
	} else {
		$active='default'; //モバイル以外の場合　themes/defalut内のファイルを読み込み
	}
	return array(
		'active'            => $active,
		'fallback'          => 'default',
		'paths'             => array( APPPATH.'themes' ),
		'assets_folder'     => 'assets',
		'view_ext'          => '.php',
		'require_info_file' => false,
		'info_file_name'    => 'themeinfo.php',
	);
