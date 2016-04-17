<?php

class Model_Users extends \Orm\Model
{
	protected static $_table_name = 'users';

	protected static $_primary_key = array('id');

	protected static $_properties = array(
	  'id',									// int(11) NOT NULL AUTO_INCREMENT COMMENT 'ユーザID - 自動生成 [セッション保持]',
	  'username' => array(	// varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ユーザ名 [セッション保持]',
			'data_type'		=> 'varchar',
			'label'				=> 'ユーザ名',
			'validation'	=> array(
				'required',
				'min_length' 	=> array(2), 
				'max_length' 	=> array(10)
			),
			'form'				=> array(
				'type' 				=> 'text'
			)
		),
	  'password' => array(	// varchar(41) COLLATE utf8_unicode_ci NOT NULL COMMENT 'パスワード - PASSWORD(入力値+//+メールアドレス)',
	  	'data_type'		=> 'varchar',
			'label'				=> 'パスワード',
			'validation'	=> array(
				'required',
				'min_length' 	=> array(8), 
				'max_length' 	=> array(41)
			),
			'form'				=> array(
				'type' 				=> 'text'
			)
		),
	  'email' => array(	// varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'メールアドレス - UNIQUE',
	  	'data_type'		=> 'varchar',
			'label'				=> 'メールアドレス',
			'validation'	=> array(
				'required',
				'min_length' 	=> array(6), 
				'max_length' 	=> array(255)
			),
			'form'				=> array(
				'type' 				=> 'text'
			)
		),
	  'address',		// text COLLATE utf8_unicode_ci NOT NULL COMMENT '住所 - 必須',
	  'profile',		// text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ユーザ情報',
	  'type',				// int(3) NOT NULL DEFAULT '0' COMMENT 'ユーザグループ - 必須 [セッション保持] - 0:一般 1:投稿あり 2:特別 3:スタッフ 4:管理者 999:admin',
	  'login',			// TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最終ログイン日時',
	  'login_hash',	// TINYTEXT COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ログインHASH値 [セッション保持]',
	  'counter',		// INT NOT NULL DEFAULT '1' COMMENT 'アクセスカウント - UPDATE時に増やす',
	  'created_at',		// TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登録日時',
	  'updated_at',		// TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新日時',
	  'memo',				// text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'メモ',
	  'status',			// int(3) NOT NULL DEFAULT '1' COMMENT 'ステータス - 1:通常 2〜:その他 900:ブラックリスト',
	  'active',			// int(3) NOT NULL DEFAULT '1' COMMENT 'アクティブ - 1:アクティブ 0:非アクティブ（登録抹消）',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
			'property' => 'created_at',
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => true,
			'property' => 'updated_at',
		),
	);

	public funciton action_login(){
      $auth = Auth::instance();
			if($auth->login($_POST['username'], $_POST['password'])){
			    $remember = Input::post('remember'); //保持のチェックボックスの値を取得
					if($remember){
					  //保持にチェックがついていた場合
					  // remember-me クッキーを作成
					  Auth::remember_me();
					}
					if(Auth::member(100)){ //100はAdministratorグループ
					    //処理
					}
			}else{
			    //ログイン失敗時の処理
			}
  }

  public funciton action_regist(){
  	// 独自のメールアドレス登録済みチェック
		$val->add_callable('myvalidation'); //myvalidationクラスを規則として読み込む
		$val->add('email','メールアドレス')
		->add_rule('required')
		->add_rule('unique_email'); //myvalidationクラスのunique_emailのfunctionを規則に使う
		$val->set_message('unique_email','既に登録されています');

  	$auth = Auth::instance();
		$auth->create_user($_POST['username'], $_POST['password'], $_POST['email'], $_POST['address']);
	}

	//フォームを表示させるためのアクション（http://localhost/post/formで表示される）
  public funciton action_form(){
      return  View::forge('post/form'); //View::forege()メソッドでビューを読み込む
  }

  public funciton action_logout(){
  	$auth = Auth::instance();
		$auth->logout();
	}

	public funciton action_check(){
		if(!Auth::check()){
		    Response::redirect('login'); //ログインしてなかったら、コントローラーloginへ遷移
		}else{
		    $data = array();
		    $data['username'] = Auth::get_screen_name(); //ユーザ名を取得
		    $data['user_id'] = Arr:get(Auth::get_user_id(),1); //ユーザIDを取得
		    Return Response::forge(View::forge('member/top')); //コントローラーmemberのtopアクションへ遷移
		}
	}


}
