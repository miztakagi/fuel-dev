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
