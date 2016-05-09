<?php

class Model_Users extends \Orm\Model
{
	protected static $_table_name = 'users';

	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',								// int(11) NOT NULL AUTO_INCREMENT COMMENT 'ユーザID - 自動生成 [セッション保持]',
		'username', 				// varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ユーザ名 [セッション保持]',
		'password', 				// varchar(41) COLLATE utf8_unicode_ci NOT NULL COMMENT 'パスワード - PASSWORD(入力値+//+メールアドレス)',
		'email', 						// varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'メールアドレス - UNIQUE',
		'zip1', 						// tinyint(5) NOT NULL COMMENT '郵便番号(1)',
		'zip2', 						// tinyint(4) DEFAULT NULL COMMENT '郵便番号(2)',
		'pref',							// tinyint(3) NOT NULL DEFAULT '0' COMMENT '都道府県コード - 郵便番号から自動取得',
		'address',					// text COLLATE utf8_unicode_ci NOT NULL COMMENT '住所 - 必須',
		'profile',					// text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ユーザ情報',
		'group',						// int(3) NOT NULL DEFAULT '0' COMMENT 'ユーザグループ - 必須 [セッション保持] - 0:一般 1:投稿あり 2:特別 3:スタッフ 4:管理者 999:admin',
		'last_login',				// varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '最終ログイン日時',
		'login_hash',				// TINYTEXT COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ログインHASH値 [セッション保持]',
		'counter',					// INT NOT NULL DEFAULT '1' COMMENT 'アクセスカウント - UPDATE時に増やす',
		'confirm_token', 		// varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ユーザ登録用token',
		'confirmed_at', 		// timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ユーザ登録確認日',
		'confirm_sent_at', 	// timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ユーザ登録メール発信日',
		'created_at',				// TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登録日時',
		'updated_at',				// TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新日時',
		'memo',							// text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'メモ',
		'status',						// int(3) NOT NULL DEFAULT '1' COMMENT 'ステータス - 1:通常 2〜:その他 900:ブラックリスト',
		'active',						// tinyint(2) NOT NULL DEFAULT '0' COMMENT 'アクティブ - 0:登録未確認 1:アクティブ -1:非アクティブ（登録抹消）',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
			'property' => 'created_at',
		),
		// updated_at は登録日＆ユーザ情報が変更された時のみ明示更新する
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
			'property' => 'updated_at',
		),
		// last login 日時は随時更新
		'Orm\Observer_LastLogin' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => true,
			'property' => 'last_login',
		),
	);


	//フォームを表示させるためのアクション（http://localhost/post/formで表示される）
  public function action_form(){
      return View::forge('post/form'); //View::forege()メソッドでビューを読み込む
  }

	public function action_check(){
		if(!Auth::check()){
		    return Response::redirect('login'); //ログインしてなかったら、コントローラーloginへ遷移
		}else{
		    $data = array();
		    $data['username'] = Auth::get_screen_name(); //ユーザ名を取得
		    $data['user_id'] = Arr::get(Auth::get_user_id(), 1); //ユーザIDを取得
		    return Response::forge(View::forge('index'));
		}
	}


}
