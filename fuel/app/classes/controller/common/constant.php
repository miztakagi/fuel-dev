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
//define('_DOMAIN', php_uname('n'));
define('_SITENAME', 'ののべる.jp');
define('_ASSET', DOCROOT.'assets/');

/* headers */
define('_KEYWORD', '小説,書籍,本,販売,同人,返金');
define('_DESC', 'ののべるは、新しい方式のデジタル書籍販売サポートサービスです。読む人、書く人、すべての読書愛好家に素敵なブックライフを！');
