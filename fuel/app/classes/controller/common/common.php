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
	// @params :: $data: var_dumpさせたい値
	public static function dump($data)
	{
		if(Fuel::$env == "development"){
			var_dump($data);
		}
	}

	// DEBUG CONSOLE.LOG出力
	public static function _log( $array, $label="LOG") {
		if(Fuel::$env != "development"){
			return;
		}
		if ( !is_array( $array ) ) {
			$array = array( $array );
		}

		if ( !empty( $label ) ) {
			$array = array(
				$label => $array,
			);
		}

		$json = json_encode( $array );
		echo '<script type="text/javascript">';
		// IE対策
		echo "if (!('console' in window)) {";
		echo "    window.console = {};";
		echo "    window.console.log = function(str){   return str; };";
		echo "}";
		echo "console.log({$json})";
		echo '</script>';
	}

	// レイアウトtemplateに各パーツをセットする
	// @params :: $v: Viewオブジェクト $d: データ配列
	public static function setLayout($v, $d)
	{
		// headerブロック
		$v->header = View::forge('common/header', $d);
		// naviブロック
		$v->navi = View::forge('common/navi', $d);
		// wrap class="container" ブロック
		$v->wrap = View::forge('common/wrap', $d);
		// footerブロック
		$v->footer = View::forge('common/footer', $d);
		// Viewオブジェクトに格納して戻す
		return $v;
	}

	// NAVI タイトルワードをランダムに取り出す
	public static function setCopy()
	{
		$dat = Define::def();
		$copy = $dat['_COPY_'];
		$key = array_rand($copy);
		return $copy[$key];
	}

	/* Generate Password */
	public static function makePassword($num = 8)
	{
    $seeds = 'abcefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($seeds), 0, $num);
  }

  // 現在の日時を取得
  public static function nowtime()
  {
  	return date("Y-m-d H:i:s");
  }

}
