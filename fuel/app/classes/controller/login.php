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
