<?php

/**
 * 定数設定　Common Constants
 * 2016.04.13 miz.takagi
 *
 * @package  app
 * @extends  Controller
 */

const CONSTANT = 'EXAMPLE';

/* site status */
define('_DEBUG', 1);
define('_OPEN', 1);
define('_DOMAIN', $_SERVER['SERVER_NAME']);
define('_SITENAME', 'ののべる.jp');
define('_ASSET', DOCROOT.'/assets/');

/* headers */
const _MENU_ = array(
	'見つける',
	'書く人',
	'使い方',
	'会員登録',
	'サイト案内'
);
const _COPY_ = array(
	'物語を見つけよう！',
	'人生はいつだって物語を欲している',
	'わたしだけの「面白さ」を探しに……',
	'面白さは、自分で決める！',
	'まだ見たことのない世界へ……',
	'値段は読んでから決める！',
	'心はいつでも物語を求めている…'
);


