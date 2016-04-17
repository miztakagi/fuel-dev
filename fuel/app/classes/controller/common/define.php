<?php
/**
 * DEFINE DATAs
 */

class Const extends Controller
{
	// var_dumpのエイリアス
	// 開発モードでのみ出力する
	public static function def()
		/* site status */
		return array(
			/* site status */
			'_DEBUG'			=> 1,
			'_OPEN'			=> 1,
			'_DOMAIN'		=> $_SERVER["SERVER_NAME"],
			'_ASSETS' => '/fuel/public/assets/',
			'_SITENAME'	=> 'ののべる.jp',
			/* headers */
			'_MENU_' 			=> array(
				'見つける',
				'書く人',
				'使い方',
				'会員登録',
				'サイト案内'
			),
			'_COPY_' 			=> array(
				'物語を見つけよう！',
				'人生はいつだって物語を欲している',
				'わたしだけの「面白さ」を探しに……',
				'面白さは、自分で決める！',
				'まだ見たことのない世界へ……',
				'値段は読んでから決める！',
				'心はいつでも物語を求めている…'
			),
		);
	}
}
