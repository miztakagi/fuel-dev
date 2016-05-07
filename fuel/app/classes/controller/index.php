<?php
class Controller_Index extends Controller
{
	// 事前処理
	public function before(){
		parent::before();

		Common::_log(Cookie::get(), 'COOKIE');
		Common::_log(Session::get(), 'SESSION');

		// ログインチェック
		if(Auth::check() && !empty(Session::get("login_hash"))) {
			$this->login    = 1;
			$this->username = Auth::get_screen_name();
			$this->userid   = Arr::get(Auth::get_user_id(), 1);
		}else{
			$this->login    = 0;
			$this->username = 'ゲスト';
			$this->userid   = null;
		}
		// CSRFチェック
		if (!Security::check_token()) {
			//$this->login    = 0;
		}
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
		$data['username']   = $this->username;
		$data['userid']     = $this->userid;
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
Common::_log($data, 'INDEX_DATA');
		// return the view object to the Request
		return $view;
	}

	// ログイン
	public function action_login($input=null)
	{
		$tmp = array();
		$tmp['modal'] = 'login';
		$errors = array();
		// 入力データ
    if (Input::post()){
			$email = Input::post('email', null);
			$password = Input::post('password', null);
			$tmp['message'] = "ログインしました。";
		}
		// registcheck から来た場合は、入力値を置き換える
		if ($input) {
			$email = $input['email'];
			$password = $input['password'];
			$tmp['message'] = "ユーザ登録が完了しました。";
		}
		// validation 対象データ
		$val = array('email'=>$email, 'password'=>$password);
		// 入力データチェック
		if (!empty($email) && !empty($password)) {
			$validation = $this->validate_login($val); // 入力値が正当かどうか
			$errors = $validation->error();
			if (empty($errors)) {
				// ログイン処理
				$auth = Auth::instance();
				$passwd = $password."//".$email;
				if ($auth->login($email, $passwd)) {
					if (Input::post('remember', false)) {
		          $auth->remember_me(); // remember-me クッキーを作成
		      } else {
		          $auth->dont_remember_me(); // 存在する場合、 remember-me クッキーを削除
		      }
					$userid  = $auth->get('id');
					$active  = $auth->get('active');
					$counter = $auth->get('counter');
					// アクティブチェック
					if ($active == 1) {
						$tmp['modal'] = null; // エラー表示回避
						// カウンター加算
						$query   = DB::update('users')
							->value('counter', $counter++)
							->where('id', '=', $userid)
							->and_where('active', '=', 1)
							->execute();
					} else {
						$auth->logout(); // アクティブユーザでない場合はログアウト
						if ($active<0) {
							$errors[] = "登録削除されています。";
						} elseif ($active==0) {
							$errors[] = "ユーザ登録が完了していません。ユーザ登録確認メールをご覧下さい。";
						} else {
							$errors[] = "ユーザ登録が保留中です。";
						}
					}
				} else {
					// 認証失敗
					$errors[] = 'メールアドレスまたはパスワードが一致しません。';
				}
			}
		} else {
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
				'zip' => Input::post('zip1')."-".Input::post('zip1')
			);
			$address = Jpaddress::address($zipdata, 5);
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

	// ユーザ登録メール
	public static function regist_mail($tomail, $username, $registcode, $regist=1){
		// メールタイトル＆本文
		if ($regist==1) {
			$modal = 'regist';
			$subject = mb_convert_encoding("ののべる - ユーザ登録メール", "jis");
			$body = "
	このメールは「ののべる」にユーザ登録を申請された方に送信しています。
	お心当たりのない方はこのメールを無視していただいて結構です。

	------------------------------------------------------------

	ユーザ登録確認画面の「確認コード」欄に下記のコードを入力していただくと
	ユーザ登録が完了します。

	・確認コード : ".$registcode."

	なお、この確認コードは当サイトにアクセスされている間だけ有効です。
	アクセスが途切れた場合、または確認コード入力画面を閉じてしまった場合は、
	下記URLにアクセスして再度メール確認を行って下さい。

	・再確認用画面 : "._DOMAIN."/registcode

	------------------------------------------------------------

	では、今後とも「ののべる」をよろしくお願い致します。

	□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□
	■ インディーズ作家の作品を、読むのも、書くのも、おまかせ！
	■ ののべる http://nonovel.jp
	□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□\n
			";
		} elseif ($regist==2) {
			$modal = 'reset';
			$subject = mb_convert_encoding("ののべる - パスワード再設定メール", "jis");
			$body = "";
		}

		// \Package::load('email');
		$email = \Email::forge();
		$email->body($body);
		$email->subject($subject);
		$email->from('info@nonovel.jp', mb_convert_encoding("ののべる.jp", "jis"));
		$email->to(array(
    	$tomail => $username,
		));
		$email->cc(array(
    	'sys@nonovel.jp',
    	'miz.takagi@gmail.com',
		));
		$tmp = array();

		try {
			// メールを送信
			$modal = null;
			$email->send();
		} catch(\EmailValidationFailedException $e) {
			$tmp['errors'][] = $regist.': 宛先メールアドレス不明';
		} catch(\Exception $e) {
			// エラーを管理者が確認できるログに記録
			logger(\Fuel::L_ERROR, $regist.' *** メール送信エラー ('.__FILE__.'#'.__LINE__.'): '.$e->getMessage());
		}
		return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// ユーザ登録確認コード入力画面
	public function action_registcode()
	{
		$tmp['modal'] = 'registagain';
		return Request::forge('index')->execute(array('res'=>$tmp))->response();
	}

	// ユーザactiveチェック
	public function activecheck()
	{
		$auth = Auth::instance();
		$active = intval($auth->get('active'));
		$tmp = array();
		if ($active < 0) {
			// 登録抹消ユーザアクティブ - 1:アクティブ 0:ユーザ登録未確認 -1:非アクティブ（登録抹消）
			$tmp['modal'] = null;
			$tmp['err_message'] = 'ユーザ登録できません。メールは送信されませんでした。';
			return Request::forge('index')->execute(array('res'=>$tmp))->response();
		} elseif ($active > 0) {
			// すでにactiveなユーザ
			$tmp['modal'] = null;
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
				$validation = $this->validate_login(Input::post()); // 入力値が正当かどうか
				$errors = $validation->error();
				if (empty($errors)) {
					$auth = Auth::instance();
					$active = $auth->get('active');
					$res = $this->activecheck(); // ユーザactiveチェック
					if (empty($res)) {
						$passwd = $password."//".$email;
						if ($auth->login($email, $passwd)) {
							$tmp['modal'] = 'registcode'; // 確認コード入力modal表示
							$tmp['email'] = $email;
							$username = $auth->get('username');
							$registcode = Common::makePassword(6);
							Session::set('registcode', $registcode); // セッション登録
							Session::set('email', $email);
							Session::set('password', $password);
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
		} else {
			$tmp['modal'] = 'registcode';
			$tmp['errors'][] = "確認コードが一致しません。";
			$tmp['email'] = Input::post('email');
			$tmp['password'] = Input::post('password');
			return Request::forge('index')->execute(array('res'=>$tmp))->response();
		}
		// active更新
		$query   = DB::update('users')
			->value('confirmed_at', Common::nowtime())
			->value('active', 1)
			->where('id', '=', Session::get('userid'))
			->execute();
		// ログインチェック
		$input = array('email'=>Session::get('email'), 'password'=>Session::get('password'));
		Session::delete('password'); // セッション保持データ削除
		return $this->action_login($input);
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
