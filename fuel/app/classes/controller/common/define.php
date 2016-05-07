<?php
/**
 * DEFINE DATAs
 */

class Define extends Controller
{
	public static function def()
	{
		/* site status */
		return array(
			/* site status */
			'_DEBUG'			=> 1,
			'_OPEN'			=> 1,
			'_DOMAIN'		=> $_SERVER["SERVER_NAME"],
			'_ASSET' => DOCROOT.'assets/',
			'_SITENAME'	=> 'ののべる.jp',
			/* headers */
			'_KEYWORD' => '小説,書籍,本,販売,同人,返金',
			'_DESC' => 'ののべるは、新しい方式のデジタル書籍販売サポートサービスです。読む人、書く人、すべての読書愛好家に素敵なブックライフを！',
			'_MENU_' 			=> array(
				'見つける',
				'書く人',
				'使い方',
				'会員登録',
				'サイト案内'
			),
			'_COPY_' 			=> array(
				'物語を見つけよう！',
				'人生はいつだって物語を探している',
				'今日もまた面白さを求めて旅をする',
				'面白いかどうかは、自分で決める！',
				'まだ見たことのない世界へ……',
				'値段は読んでみてから決めようか！',
				'心はいつでも物語を求めている…'
			),
		);
	}
}

