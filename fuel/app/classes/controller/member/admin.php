<?php

class Controller_Member_Admin extends Controller_Member
{
    public $template = 'member/admin/template'; //テンプレートを指定

    public function before(){
        parent::before(); //親クラス呼び出し
        if(!$this->is_admin){ //管理者フラグが立ってなければmemberコントローラへリダイレクト
            Response::redirect('member')+
        }
    }
    public function index(){
        $this->template->title = Auth::get_screen_name();
        $this->template->content = View::forege('member/admin/index');
    }
}