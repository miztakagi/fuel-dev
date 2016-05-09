<?php
class Model_Admin extends \Orm\Model{
	//テーブル名の指定(usersテーブルを指定）
	protected static $_table_name='users';
	//プロパティのセット
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
			'events'                 => array('before_insert'),
			'mysql_timestamp'        => true,
			'property'               => 'created_at',
		),
		'Orm\Observer_UpdatedAt' => array(
			'events'                 => array('before_save'),
			'mysql_timestamp'        => true,
			'property'               => 'updated_at',
		),
		'Orm\Observer_LastLogin' => array(
			'events'                 => array('before_save'),
			'mysql_timestamp'        => true,
			'property'               => 'last_login',
		),
	);

	//バリデーションの設定
	public static function validate($factory){
		//バリデーションのインスタンス化
		$val = Validation::forge($factory);
		//バリデーションフィールドの追加
		$val->add_field('username', 'ユーザー名', 'required|max_length[50]');
		$val->add_field('email', 'メールアドレス', 'required|valid_email|max_length[255]');
		$val->add_field('password', 'パスワード', 'required|max_length[50]');
		$val->add_field('zip1', '郵便番号(1)', 'required|exact_length[3]');
		$val->add_field('zip2', '郵便番号(2)', 'required|exact_length[4]');
		return $val;
	}

	//ページデータの取得
	public static function pagedata($lines = 10){
		//配列の初期化
		$data = array();
		//データ件数の取得
		$count = Model_Users::count();
		//Paginationの環境設定
		$config = array(
			'pagination_url'          => 'admin/index',
			'uri_segment'             => 3,
			'num_links'               => 2,
			'per_page'                => $lines,
			'total_items'             => $count,
			'template'                => array(
				'wrapper_start'           => '<div class="pagination"><ul>',
				'wrapper_end'             => '</ul></div>',
				'previous_start'          => '<li class="previous">',
				'previous_end'            => '</li>',
				'previous_inactive_start' => '<li class="active"><a href="#">',
				'previous_inactive_end'   => '</a></li>',
				'next_inactive_start'     => '<li class="active"><a href="#">',
				'next_inactive_end'       => '</a></li>',
				'next_start'              => '<li class="next">',
				'next_end'                => '</li></ul>',
				'active_start'            => '<li class="active"><a href="#">',
				'active_end'              => '</a></li>',
			)
		); 
		//Paginationのセット
		Pagination::set_config($config);
		//ページデータの取得

		$data['users'] = Model_Users::find('all',
			array(
		    'order_by' => array(
		        'updated_at' => 'DESC'
		    ),
		    'limit' => 10,
		    'offset' => 0,
			)
		);

		// $data['users'] = Model_Users::find()
		// 	->order_by('updated_at','desc')
		// 	->limit(Pagination::$per_page)
		// 	->offset(Pagination::$offset)
		// 	->get();
		return $data;
	}

	//Configデータの取得
	public static function config_groups(){
		//config/simpleauthのgroups配列を取得
		$config = Config::get('simpleauth.groups');
		//取得配列の再構成
		foreach($config as $key=>$row):
			$groups[$key]=$row['name'];
		endforeach;
		//配列$groupsを返す
		return $groups;
	}
}
