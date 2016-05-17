<?php
class Controller_Member_Index extends Controller
{
    public function before(){
        parent::before(); //親クラス呼び出し
        //ログインしていなければ
        if(!Auth::check()){
            //ログインページへ移動
            $this->login    = 0;
            $this->username = 'ゲスト';
            $this->userid   = null;
            Response::redirect('login');
        }
    }
    public function action_index($res=null)
    {
        //Common::_log($res,'RES');
        Common::_log($this->param('page'),'PARAM');
        $data['site_title'] = 'ののべる.jp';
        $data['page_copy']  = Common::setCopy();
        $data['page_title'] = 'ののべる | マイページ | '.Session::get('username');
        $data['login']      = 1;
        $data['username']   = Session::get('username');
        $data['modal']      = null;
        $data['errors']     = [];
        // エラーチェック
        if(!empty($res)){
            $data = array_replace_recursive($data, $res); // エラー/メッセージ情報を上書き追加
        }
        // create the layout view
        $view = View::forge('template/mypage');
        $view->set('head',View::forge('common/head'));
        $view->set('navi',View::forge('common/navi'));
        $view->set('modal',View::forge('common/modal'));
        $view->set('mypage_menu',View::forge('common/mypage_menu'));
        $view->set('footer',View::forge('common/footer'));
        // set data
        if($this->param('page')=='itemregist'){
            $data['page_name'] = ' ＞ 作品登録';
            $view->set('content',View::forge('member/itemregist'));
        }elseif($this->param('page')=='history'){
            $data['page_name'] = ' ＞ 作品管理';
            $view->set('content',View::forge('member/itemhistory'));
        }elseif($this->param('page')=='manage'){
            $data['page_name'] = ' ＞ 入出金管理';
            $view->set('content',View::forge('member/itemmanage'));
        }else{
            $data['page_name'] = '';
            $view->set('content',View::forge('member/index'));
        }
        $view->set_global($data);
        // return the view object to the Request
        return $view;
    }

}