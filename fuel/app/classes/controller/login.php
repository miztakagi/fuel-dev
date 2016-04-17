<?php
/**
 * The Index Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */

use \Auth;

class Controller_Login extends Controller
{
	public function action_index() {
		// if ($_POST) {
		// 	try {
		// 		if (ログインチェック) {
		// 			// ログイン成功したとき。
					
		// 			$referrer = Session::get('referrer'); // セッションを取得。
		// 			if ( isset($referrer) ) {
		// 				$url = str_replace(Uri::base(false), "", $referrer); // URLから、必要なトコだけ取り出す。
						
		// 				if ($url == "logout" || $url == "login") {
		// 					// ログイン、ログアウトページからきたときはトップページに表示。
		// 					$url = "";
		// 				}
		// 			}
		// 			else {
		// 				// リファラなし
		// 				$url = "";
		// 			}
		// 			return Response::redirect($url); // ログイン成功した場合はリダイレクト
		// 		}
		// 		else {
		// 			// ログイン失敗したとき。
		// 		}
		// 	}
		// 	catch (SimpleUserUpdateException $e) {
		// 		$result_validate = $e->getMessage();
		// 	}
		// } else {
		// 	$ref = Input::referrer();
		// 	if (filter_var($ref, FILTER_VALIDATE_URL)) {
		// 		Session::set('referrer', $ref); // リファラを保存しておく
		// 	}
		// }
		$eee['url'] = "dbuser";
		return $eee;
	}

	private function validate_create() {
		$validation = Validation::forge();

		$validation->add('username', 'ユーザー名')
			->add_rule('required')
			->add_rule('min_length', 2)
			->add_rule('max_length', 20);
		$validation->add('password', 'パスワード')
			->add_rule('required')
			->add_rule('min_length', 6)
			->add_rule('max_length', 12);
		$validation->add('email', 'メールアドレス')
			->add_rule('required')
			->add_rule('max_length', 255);
			->add_rule('valid_email');
		$validation->add('address', '住所')
			->add_rule('required');

		$validation->run();
		return $validation;
	}

	public function action_add_user()
	{
		if ($_POST) {
			// 入力条件の設定
			$validation = $this->validate_create();
			$errors = $validation->error();

			// Authのインスタンス化
			$auth = Auth::instance();
			try {
				if (empty($errors)) {
					$input = $validation->input();
					if ($auth->create_user($input['username'], $input['password'], $input['email'], $input['address'])) {
						// 登録成功した場合
						$view = View::forge('index');
						return $view;
					}
					$result_validate = 'ユーザー作成に失敗しました。';
				} else {
					$result_validate = $validation->show_errors();
				}
			} catch (SimpleUserUpdateException $e) {
					$result_validate = $e->getMessage();
			}

			// 登録失敗：元のページにエラーを足して表示
			$view = View::forge('login/regist');
			$view->set("add_error", $result_validate, false); // htmlが格納されているので「false」を使ってタグをそのまま出力
		} else {
			$view = View::forge('login/regist');
			$view->set("add_error", "");
		}

		return $view;
	}

	public function action_check($id = 1){
		// $user = Model_Post::find_one_by('id',$id);
		// $data['name'] = $user->name;
		$data['name'] = "あおうえお";
		return View::forge('login_view',$data);
	}

	public function action_logout(){
		//
		return "dbuser";
	}

}
?>
