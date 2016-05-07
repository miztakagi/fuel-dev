<?php

class Controller_Member extends Controller_Template
{
    public $template = 'template/template';   //テンプレートファイルを指定
    public $is_admin = false;   //管理者かどうかフラグ

    public function before(){
        parent::before(); //before()をオーバーライドするので、親クラスのbefore()を呼び出す

        if(!Auth::check() and Request::active()->action != 'login'){ //認証通らず、現在リクエストされてるアクションがloginでない場合にログインフォームへリダイレクト
            Response::redirect('member/login');
        }
        if(Auth::member(100)){ //ユーザが管理者なら、管理者フラグ立てる
            $this->is_admin = true;
        }

        View::set_global('is_admin',$this->is_admin); //ビューに管理者フラグを渡す 
    }

    public function index(){
        $this->template->title = 'ようこそ'.Auth::get_screen_name().'さん';
        $this->template->content = View::forge('member/index');
    }

    public function action_login(){
        //既にログイン済みなら会員トップへリダイレクト
        Auth::check() and Response::redirect('member');

        //usernameとpassが送信されていたなら、認証をする
        if(Input::post('username') and Input::post('password')){
            $username = Input::post('username');
            $pass = Input::post('password');
            $auth = Auth::instance();

            //認証に成功したら会員トップページにリダイレクト
            if($auth->login($username, $password)){
                Response::redirect('member');
            }
        }

        //ログインフォームの表示
        $this->template->title = 'ログインページ';
        $this->template->content = View::forege('member/form');
    }

    public function action_logout(){ //ログアウト
        $auth = Auth::instance();
        $auth->logout();
        Response::redirect('member');
    }
}