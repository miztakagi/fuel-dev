<?php
class Controller_Index extends Controller
{
	// 事前処理
	public function before(){
		parent::before();

		// ログインチェック
		if(Auth::check() && Auth::get('active')>0 && !empty(Session::get("login_hash")) && Security::check_token()) {
			$this->login    = 1;
			$this->username = Auth::get_screen_name();
			$this->email   = Auth::get('email');
			$this->userid   = Arr::get(Auth::get_user_id(), 1);
			Session::set('username', Auth::get_screen_name());
			Session::set('email', Auth::get('email'));
			Session::set('userid', Auth::get('id'));
		}else{
			$this->login    = 0;
			$this->username = 'ゲスト';
			$this->userid   = null;
		}
		// Common::_log(Cookie::get(), 'COOKIE');
		Common::_log(Session::get(), 'SESSION');
	}

	// TOPページ
	public function action_index($res=null)
	{
		//Common::dump(_DOMAIN);
		//Common::dump(_COPY_);
		$data['site_title'] = 'ののべる.jp';
		$data['page_copy']  = Common::setCopy();
		$data['page_title'] = 'ののべる | TOP';
		$data['login']      = $this->login;
		$data['username']   = Session::get('username');
		$data['modal']      = null;
		$data['errors']     = [];
		// エラーチェック
		if(!empty($res)){
			$data = array_replace_recursive($data, $res); // エラー/メッセージ情報を上書き追加
		}
		// create the layout view
		$view = View::forge('common/layout');
    $view->set('head',View::forge('common/head'));
    $view->set('navi',View::forge('common/navi'));
    $view->set('modal',View::forge('common/modal'));
    $view->set('footer',View::forge('common/footer'));

    // set data
    $view->set('content',View::forge('index/index'));
    $view->set_global($data);
		//Common::_log($data, 'INDEX_DATA');
		// return the view object to the Request
		return $view;
	}

	// ログイン
	public function action_login($input=null)
	{
		$tmp = array();
		$tmp['modal'] = null;
		$errors = array();
		// 入力データ
    if (Input::post()){
			$email = Input::post('email', null);
			$password = Input::post('password', null);
			Session::set('email', $email);
		}
		// 入力データチェック
		if (!empty($email) && !empty($password)) {
			$val = array('email'=>$email, 'password'=>$password);
			$validation = $this->validate_login($val); // 入力値が正当かどうか
			$errors = $validation->error();
			if (empty($errors)) {
				// ログイン処理
				$auth = Auth::instance();
				$passwd = $password."//".$email;
				if ($auth->login($email, $passwd)) {
					if (Input::post('remember', 1)) {
		          $auth->remember_me(); // remember-me クッキーを作成
		      } else {
		          //$auth->dont_remember_me(); // 存在する場合、 remember-me クッキーを削除
		          $auth->remember_me(); // remember-me クッキーを作成
		      }
					$userid  = $auth->get('id');
					$active  = $auth->get('active');
					$counter = $auth->get('counter');
					// アクティブチェック
					if ($active == 1) {
						$tmp['message'] = "ログインしました。";
						// カウンター加算
						$query   = DB::update('users')
							->value('counter', $counter++)
							->where('id', '=', $userid)
							->and_where('active', '=', 1)
							->execute();
					} else {
						$auth->logout(); // アクティブユーザでない場合はログアウト
						$tmp['modal'] = 'login';
						if ($active<0) {
							$errors[] = "登録削除されています。";
						} elseif ($active==0) {
							$tmp['modal'] = 'registagain'; // ユーザ登録確認メールの送信画面を開く
							$tmp['message'] = null;
							$tmp['email'] = $email;
							$errors[] = "ユーザ登録が完了していません。";
							$errors[] = "新しいユーザ登録確認コードをメールで再送します。";
						} else {
							$errors[] = "ユーザ登録が保留中です。";
						}
					}
				} else {
					// 認証失敗
					$tmp['modal'] = 'login';
					$errors[] = 'メールアドレスまたはパスワードが一致しません。';
				}
			}
		} else {
			$tmp['modal'] = 'login';
      $errors[] = 'メールアドレスまたはパスワードが入力されていません。';
		}
		$tmp['errors'] = $errors;
    return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// ログイン　入力値チェック
	private function validate_login($val)
	{
		// 入力チェック
		$validation = Validation::forge();
		$validation->add('email', 'メールアドレス')
			->add_rule('valid_email')
			->add_rule('required')
			->add_rule('max_length', 255);
		$validation->add('password', 'パスワード')
			->add_rule('required')
			->add_rule('min_length', 6)
			->add_rule('max_length', 50);
		$validation->run($val);
		return $validation;
	}

	// ログアウト
	public function action_logout()
	{
		$auth = Auth::instance();
		$auth->logout();$auth->logout();
		$tmp['modal'] = null;
		$tmp['message'] = 'ログアウトしました。';
		Session::destroy();
		return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// 不正なページアクセス
	public function action_timeout()
	{
		$tmp['err_message'] = '有効期限が切れました。';
		return $this->action_index($tmp);
	}

	// ユーザ登録
	public function action_regist()
	{
		$tmp = array();
		$tmp['modal'] = 'regist';
		if (Input::post()) {
			$tmp['input'] = Input::post();
			$username = Input::post('username');
			$password = Input::post('password');
			$email    = Input::post('email');
			$group    = 1;
			// 入力値ヴァリデーション
			$validation = $this->validate_regist();
			$errors = $validation->error();
			// メールアドレス重複チェック
			$dup_check = $this->validate_unique($email, 'users', 'email');
			if ($dup_check) {
					$errors[] = $dup_check;
			}
			// 住所取得
			require_once APPPATH.'classes/controller/common/jpaddress.php';
			$zipdata = array(
				'zip' => Input::post('zip1')."-".Input::post('zip2')
			);
			$address = Jpaddress::address($zipdata, 5); // 郵便番号から都道府県コードと住所を取得
			if (empty($address)) {
				$errors[] = "郵便番号が正しくありません。";
			}
			//Common::_log($address, 'address');
			if (empty($errors)) {
				// validation OKの場合
				$res = $this->activecheck(); // ユーザactiveチェック
				if (empty($res)) {
					// INSERTデータの設定
					$params = array(
						'zip1'          => Input::post('zip1'),
						'zip2'          => Input::post('zip2'),
						'pref'          => $address['kencd'],
						'address'       => $address['jusho'],
						'confirm_token' => Input::post('nonovel_csrf_token'),
						'active'        => 0
					);
					$passwd   = $password."//".$email; // パスワード設定
					$auth = Auth::instance();
					$res = $auth->create_user($username, $passwd, $email, $group, $params); //ユーザー登録実行
					if (!empty($res)) {
						$tmp['modal'] = 'registcode'; // 確認コード入力modal表示
						$tmp['email'] = $email;
						$registcode = Common::makePassword(6);
						Session::set('registcode', $registcode); // セッション登録
						Session::set('userid', $res); // 新しいuseridをセッションに登録
						Session::set('email', $email);
						$res = $this->regist_mail($email, $username, $registcode, $regist=1); // registメール送信
					}
				} else {
					$tmp['modal'] = null;
				}
			}
		}else{
			$errors[] = '必要な情報が入力されていません。';
		}
		$tmp['errors'] = $errors;
    return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// ユーザ登録　入力値チェック
	public function validate_regist(){
		// 入力チェック
		$validation = Validation::forge();
		$validation->add('username', 'ユーザ名')
			->add_rule('required')
			->add_rule('min_length', 3)
			->add_rule('max_length', 50);
		$validation->add('zip1', '郵便番号(1)')
			->add_rule('required')
			->add_rule('valid_string', array('numeric'))
			->add_rule('exact_length', 3);
		$validation->add('zip2', '郵便番号(2)')
			->add_rule('required')
			->add_rule('valid_string', array('numeric'))
			->add_rule('exact_length', 4);
		$validation->add('email', 'メールアドレス')
			->add_rule('valid_email')
			->add_rule('required')
			->add_rule('max_length', 255);
		$validation->add('password', 'パスワード')
			->add_rule('required')
			->add_rule('valid_string', array('alpha','numeric','dashes'))
			->add_rule('min_length', 6)
			->add_rule('max_length', 50);
		$validation->add('password_confirmation', 'パスワード確認')
			->add_rule('required')
			->add_rule('min_length', 6)
			->add_rule('max_length', 50)
			->add_rule('match_field', 'password');
		$validation->run();	
		return $validation;
	}

	// ユーザ登録重複チェック
	public static function validate_unique($val, $table, $field){
		$result = DB::select($field)
			->where($field, '=', strtolower($val)) //emailを条件にDB検索
			->from($table)	//usersテーブル内を検索
			->execute();
		if ($result->count() > 0) {
			$res = "メールアドレスは既に登録されています";
		} else {
			$res = false;
		}
		return $res;
	}

	// パスワード再設定メール
	public function action_resetmail()
	{
		$tmp = array();
		if (Input::post()) {
			$email = Input::post('email');
			$user = DB::select('*')
				->from('users')
				->where('email', '=', $email)
				->and_where('active', '>', 0)
				->execute();
			if (count($user)==1) {
				$tmp['modal'] = 'resetcode';
				$tmp['message'] = 'パスワード再設定メールを送信しました。';
				$registcode = Common::makePassword(5);
				Session::set('registcode', $registcode); // セッション登録
				Session::set('email', $email);
				Session::set('userid', $user[0]['id']);
				$res = $this->regist_mail($email, '', $registcode, $regist=2); // registメール送信
			} else {
				$tmp['modal'] = 'resetmail';
				$tmp['errors'][] = '該当するユーザは登録されていません。';
			}
		} else {
			$tmp['modal'] = 'resetmail';
			$tmp['errors'][] = 'ユーザ登録したメールアドレスを入力して下さい。';
		}
		return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// パスワード再設定 確認コードチェック
	public function action_resetcode()
	{
		// 確認コードの検証
		if (Session::get('registcode') == Input::post('resetmailcode')) {
			Session::delete('registcode'); // セッションregistcode削除
			$tmp['modal']   = 'resetpassform';
			$tmp['message'] = '確認コードを認証しました。新しいパスワードを設定して下さい。';
		} else {
			$tmp['modal']    = 'resetcode';
			$tmp['errors'][] = "確認コードが一致しません。";
		}
		return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// パスワード再設定入力
	public function action_resetpass()
	{
		$validation = $this->validate_reset(); // 入力値が正当かどうか
		$errors = $validation->error();
		if (empty($errors)) {
			$passwd = Input::post('password')."//".Input::post('email');
			$passwd = Auth::instance()->hash_password($passwd);
			// DB更新
			$query   = DB::update('users')
				->value('password', $passwd)
				->value('updated_at', Common::nowtime())
				->where('id', '=', Session::get('userid'))
				->execute();
			$tmp['modal']    = 'login';
			$tmp['message']  = '新しいパスワードでログインして下さい。';
		} else {
			$tmp['modal']  = 'resetpassform';
			$tmp['errors'] = $errors;
		}
		return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// パスワードリセット　入力値チェック
	private function validate_reset()
	{
		// 入力チェック
		$validation = Validation::forge();
		$validation->add('email', 'メールアドレス')
			->add_rule('valid_email')
			->add_rule('required')
			->add_rule('max_length', 255);
		$validation->add('password', '新パスワード')
			->add_rule('required')
			->add_rule('min_length', 6)
			->add_rule('max_length', 50);
		$validation->add('password_confirmation', '新パスワード確認')
			->add_rule('required')
			->add_rule('min_length', 6)
			->add_rule('max_length', 50)
			->add_rule('match_field', 'password');
		$validation->run();
		return $validation;
	}

	// ユーザ登録メール
	public static function regist_mail($tomail, $username, $registcode, $regist=1){
		// メールタイトル＆本文
		if ($regist==1) {
			$modal   = 'regist';
			$subject = mb_convert_encoding("ののべる - ユーザ登録メール", "jis");
			$body    = "
	このメールは「ののべる」にユーザ登録を申請された方に送信しています。
	お心当たりのない方はこのメールを無視していただいて結構です。

	------------------------------------------------------------

	ユーザ登録確認画面の「確認コード」欄に下記のコードを入力していただくと
	ユーザ登録が完了します。

	・確認コード : ".$registcode."

	なお、確認コード入力画面を閉じてしまった場合は、
	下記URLにアクセスして再度メール確認を行って下さい。

	・再確認用画面 : https://nonovel.jp/registcode

	------------------------------------------------------------

	では、今後とも「ののべる」をよろしくお願い致します。

	□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□\n
	インディーズ作家の作品を、読むのも、書くのも、おまかせ！
	ののべる https://nonovel.jp
	□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□\n
			";
		} elseif ($regist==2) {
			$modal   = 'resetpassword';
			$subject = mb_convert_encoding("ののべる - パスワード再設定メール", "jis");
			$body    = "
	このメールは「ののべる」ログインパスワードの再設定を申請された方に送信しています。
	お心当たりのない方はこのメールを無視していただいて結構です。

	------------------------------------------------------------

	パスワード再設定画面の「確認コード」欄に下記のコードを入力していただくと
	新しいパスワードに更新されます。

	・確認コード : ".$registcode."

	なお、パスワード再設定画面を閉じてしまった場合は、
	下記URLにアクセスして再度メール確認を行って下さい。

	・再確認用画面 : https://nonovel.jp/resetmail

	------------------------------------------------------------

	では、今後とも「ののべる」をよろしくお願い致します。

	□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□\n
	インディーズ作家の作品を、読むのも、書くのも、おまかせ！
	ののべる https://nonovel.jp
	□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□\n
			";
		}

		// \Package::load('email');
		$email = \Email::forge();
		$email->body($body);
		$email->subject($subject);
		$email->from('info@nonovel.jp', mb_convert_encoding("ののべる.jp", "jis"));
		$email->to(array(
			$tomail => $username
		));
		$email->bcc(array(
		  	'sys@nonovel.jp'
		));
		$tmp = array();

		try {
			// メールを送信
			$modal = null;
			$res = $email->send();
			Common::_log($res.":送信完了", "MAIL");
		} catch(\EmailValidationFailedException $e) {
			$tmp['errors'][] = $regist.': 宛先メールアドレス不明';
			Common::_log($regist.': 宛先メールアドレス不明', "MAIL");
		} catch(\Exception $e) {
			// エラーを管理者が確認できるログに記録
			logger(\Fuel::L_ERROR, $regist.' *** メール送信エラー ('.__FILE__.'#'.__LINE__.'): '.$e->getMessage());
			Common::_log($regist.' *** メール送信エラー ('.__FILE__.'#'.__LINE__.'): '.$e->getMessage(), "MAIL");
		}
		return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// ユーザ登録確認コード入力画面
	public function action_registcode($set=0)
	{
		if($set==1){
			$tmp['modal'] = 'registcode'; // 通常
		}else{
			$tmp['modal'] = 'registagain'; // 確認画面消失、確認メール再送用
		}
		return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// ユーザactiveチェック
	public function activecheck()
	{
		$auth   = Auth::instance();
		$active = intval($auth->get('active'));
		$tmp    = array();
		if ($active < 0) {
			// 登録抹消ユーザアクティブ - 1:アクティブ 0:ユーザ登録未確認 -1:非アクティブ（登録抹消）
			$tmp['modal']       = null;
			$tmp['err_message'] = 'ユーザ登録できません。メールは送信されませんでした。';
			return Request::forge('index')->execute(array('res'=>$tmp))->response();
		} elseif ($active > 0) {
			// すでにactiveなユーザ
			$tmp['modal']       = null;
			$tmp['err_message'] = 'ユーザ登録済みです。メールは送信されませんでした。';
			return Request::forge('index')->execute(array('res'=>$tmp))->response();
		} elseif ($active == 0) {
			// 未登録ユーザ
			return false;
		}
	}

	// ユーザ登録確認メール再送信
	public function action_registagain()
	{
		$tmp = array();
		$tmp['modal'] = 'registagain';
		if (Input::post()) {
			$password = Input::post('password');
			$email    = Input::post('email');
			if (!empty($email) && !empty($password)) {
				$val = array('email'=>$email, 'password'=>$password);
				$validation = $this->validate_login($val); // 入力値が正当かどうか
				$errors     = $validation->error();
				if (empty($errors)) {
					$auth   = Auth::instance();
					$active = $auth->get('active');
					$res    = $this->activecheck(); // ユーザactiveチェック
					if (empty($res)) {
						$passwd = $password."//".$email;
						if ($auth->login($email, $passwd)) {
							$tmp['modal'] = 'registcode'; // 確認コード入力modal表示
							$tmp['email'] = $email;
							$username     = $auth->get('username');
							$registcode   = Common::makePassword(6);
							Session::set('registcode', $registcode); // セッション登録
							Session::set('email', $email);
							$query   = DB::update('users')
								->value('confirm_sent_at', Common::nowtime())
								->where('email', '=', $email)
								->execute();
							$res = $this->regist_mail($email, $username, $registcode, $regist=1); // registメール送信
						} else {
							// 認証失敗
							$tmp = $res;
						}
					} else {
						$tmp['modal'] = null;
					}
				}
			} else {
	      $errors[] = 'メールアドレスまたはパスワードが入力されていません。';
			}
		}else{
			$errors[] = '必要な情報が入力されていません。';
		}
		$tmp['errors'] = $errors;
    return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// ユーザ登録確認コードチェック
	public function action_registcheck()
	{
		// 確認コードの検証
		if (Session::get('registcode') == Input::post('mailcode')) {
			Session::delete('registcode'); // セッションregistcode削除
			$tmp['modal']   = 'login';
			$tmp['message'] = 'ユーザ登録が完了しました。ログインして下さい。';
		} else {
			$tmp['modal']    = 'registcode';
			$tmp['errors'][] = "確認コードが一致しません。";
			// 確認コード再入力
			return Request::forge('index')->execute(array('res'=>$tmp))->response();
		}
		// active更新
		$query   = DB::update('users')
			->value('confirmed_at', Common::nowtime())
			->value('active', 1)
			->where('id', '=', Session::get('userid'))
			->execute();
		// ログイン画面へ
		return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// ユーザー更新処理
	public function action_updated()
	{
		$auth->update_user($values, $email);
		$tmp['err_message'] = '有効期限が切れました。';
		return $this->action_index($tmp);
	}

	// ユーザー削除処理
	public function action_removed()
	{
		$auth->delete_user(Input::post('email', null));
		Auth::logout();
		$tmp['err_message'] = 'ユーザ情報を削除しました。';
		return $this->action_index($tmp);
	}

	// 404エラー
	public function action_error()
	{
		$tmp['err_message'] = '該当ページが見つかりません';
		return $this->action_index($tmp);
	}

	// 事後処理
	public function after($response){
		return parent::after($response);
	}

}
