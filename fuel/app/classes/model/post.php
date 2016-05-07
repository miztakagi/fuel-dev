<?php

class Model_Post extends \Orm\Model_Crud
{
	protected static $_table_name = 'users';

	protected static $_primary_key = 'id';

	protected static $_properties = array(
		'id', // int(12) NOT NULL AUTO_INCREMENT COMMENT 'ユーザID - 自動生成 [セッション保持]',
	  'username', // varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ユーザ名 [セッション保持]',
	  'password', // varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'パスワード - PASSWORD(入力値+//+メールアドレス)',
	  'email', // varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'メールアドレス - UNIQUE',
	  'zip1', // tinyint(5) NOT NULL COMMENT '郵便番号(1)',
	  'zip2', // tinyint(4) DEFAULT NULL COMMENT '郵便番号(2)',
	  'address', // text COLLATE utf8_unicode_ci COMMENT '住所 - 郵便番号から自動取得',
	  'profile', // text COLLATE utf8_unicode_ci COMMENT 'ユーザ情報',
	  'group', // tinyint(3) NOT NULL DEFAULT '1' COMMENT 'ユーザグループ - 必須 [セッション保持] - -1:Banned 0:ゲスト 1:一般ユーザ 2:投稿ユーザ 50:スタッフ 100:管理者',
	  'last_login', // varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '最終ログイン日時',
	  'login_hash', // varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'ログインHASH値 [セッション保持]',
	  'counter', // smallint(11) NOT NULL DEFAULT '1' COMMENT 'アクセスカウント - UPDATE時に増やす',
	  'confirm_token', // varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ユーザ登録用token',
	  'confirmed_at', // timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ユーザ登録確認日',
	  'confirm_sent_at', // timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ユーザ登録メール発信日',
	  'created_at', // timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登録日時',
	  'updated_at', // timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新日時',
	  'memo', // text COLLATE utf8_unicode_ci COMMENT 'メモ',
	  'status', // tinyint(3) NOT NULL DEFAULT '1' COMMENT 'ステータス - 1:通常 2〜:その他 900:ブラックリスト',
	  'active', // tinyint(1) NOT NULL DEFAULT '1' COMMENT 'アクティブ - 1:アクティブ 0:非アクティブ（登録抹消）',
	);

}
