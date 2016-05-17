<?php
class Controller_Admin_Index extends Controller_Template{

	public $template = 'template/admin';   //テンプレートファイルを指定
  public $is_admin = false;   //管理者かどうかフラグ

	//アクセス制限
	public function before(){
		parent::before();
		//ログインしていなければ
		if(!Auth::check()){
			//ログインページへ移動
			Response::redirect('login');
		//ログインしていてもAdminでなければ
		}elseif(Auth::get('group')<50){
			//user/indexページへ移動
			Response::redirect('index');
		}
		$is_admin = (!empty(Session::get('admin'))) ? Session::get('admin') : false;
	}

	//トップページの表示
	public function action_index($page=0)
	{
		$data = array();
		$data['username']   = Session::get('username');
		$data['page_title']   = '管理メニュー';
		// create the layout view
		$view = View::forge('template/admin');
    $view->set('navi',View::forge('admin/navi'));
    $view->set('content',View::forge('admin/index'));
    $view->set_global($data);
    //$view->set_global(Model_Admin::pagedata(3,$page));
    return $view;
	}

	//新規ユーザー登録
	public function action_create()
	{
		//POST送信なら
		if (Input::method() == 'POST') {
			//バリデーションの初期化
			$val = Model_Admin::validate('create');
			$val->add_field('password', 'パスワード', 'required|max_length[50]');
			//バリデーションOKなら
			if ($val->run()) {
				//POSTデータを受け取る
				$username=Input::post('username');
				$email=Input::post('email');
				$password=Input::post('password');
				$group=Input::post('group');
				//重複確認
				$username_count=Model_Admin::find()->where('username',$username)->count();
				$email_count=Model_Admin::find()->where('email',$email)->count();
				//ユーザー名が重複していたら
				if ($username_count>0) {
					Session::set_flash('error', 'ユーザー名が重複しています');
					Response::redirect('admin/create');
				} else {
					//Eメールアドレスが重複していたら
					if($email_count>0){
						Session::set_flash('error', 'Eメールアドレスが重複しています');
						Response::redirect('admin/create');
					}
				}
				//Authのインスタンス化
				$auth=Auth::instance();
				//もしユーザー登録されたら
				if ($auth->create_user($username,$password,$email,$group)) {
					//登録成功のメッセージ
					Session::set_flash('success', '<span class="btn btn-primary span8">新規ユーザーの『'.$username.'』を追加しました</span><br>');
					//indexページへ移動
					Response::redirect('admin/index');
				} else {
					//データが保存されなかったら
					Session::set_flash('error', '登録されませんでした');
				}
			}
			//バリデーションNGなら
			Session::set_flash('error', $val->show_errors());
		}
		//POST送信でなければ
		//テーマのインスタンス化
		$this->theme=\Theme::forge();
		//テーマにテンプレートのセット
		$this->theme->set_template('template');
		//テーマのテンプレートにタイトルをセット
		$this->theme->get_template()->set('title','Winroad徒然草');
		//テーマのテンプレートにビューとページデータをセット
		$this->theme->get_template()->set('content',$this->theme->view('admin/create'));
		return $this->theme;
	}
}