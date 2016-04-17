<?php

/**
 * 共通関数　Common Functions
 * 2016.04.13 miz.takagi
 *
 * @package  app
 * @extends  Controller
 */

class Common extends Controller
{
	// var_dumpのエイリアス
	// 開発モードでのみ出力する
	public static function dump($data)
	{
		if(Fuel::$env == "development"){
			var_dump($data);
		}
	}

	public static function def($val)
	{
		switch($val){
			case '_DEBUG':
				return 1;
			break;
			case '_OPEN':
				return 1;
			break;
			case '_DOMAIN':
				return $_SERVER["SERVER_NAME"];
			break;
			case '_ASSETS':
				return '/fuel/public/assets/';
			break;
			case '_SITENAME':
				return 'ののべる.jp';
			break;
			case '_MENU_':
				return array(
					'見つける',
					'書く人',
					'使い方',
					'会員登録',
					'サイト案内'
				);
			break;
			case '_COPY_':
				return array(
					'物語を見つけよう！',
					'人生はいつだって物語を欲している',
					'わたしだけの「面白さ」を探しに……',
					'面白さは、自分で決める！',
					'まだ見たことのない世界へ……',
					'値段は読んでから決める！',
					'心はいつでも物語を求めている…'
				);
			break;
			default:
			break;
		}
	}

	// レイアウトtemplateに各パーツをセットする
	// @params :: $v: Viewオブジェクト $d: データ配列
	public static function setLayout($v, $d)
	{
		// cssブロック
		$v->css1 = View::forge('common/css1', $d);
		// naviブロック
		$v->navi = View::forge('common/navi', $d);
		// wrap class="container" ブロック
		$v->wrap = View::forge('common/wrap', $d);
		// footerブロック
		$v->footer = View::forge('common/footer', $d);
		// js読み込みブロック
		$v->script1 = View::forge('common/script1', $d);
		// Viewオブジェクトに格納して戻す
		return $v;
	}

}
