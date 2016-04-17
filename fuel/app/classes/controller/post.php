<?php

class Controller_Post extends Controller
{

    //フォームを表示させるためのアクション（http://localhost/post/formで表示される）
    public funciton action_form(){
        return  View::forge('post/form'); //View::forege()メソッドでビューを読み込む
    }

    //フォームが送信された際に値を受け取り、DBへ書き込むアクション
    public function action_save(){
        $form = array();
        $form['title'] = Input::post('title'); //フォームの内容を配列へ格納
        $form['body'] = Input::post('body');

        $post = Model_Post::forge(); //Model_Postクラスのオブジェクトを作成
        $post->set($form); //setメソッドで、配列をpostオブジェクトに設定
        $post->save(); //saveメソッドで、テーブルにレコードを書き込む

        Response::redirect('post'); //投稿一覧ページへリダイレクト
    }

    //DBの内容を表示するアクション
    public function action_index(){

        $data = array();
        $data['rows'] = Model_Post::find_all(); //Model_Postクラスにあるfind_allメソッドでDBを検索し、結果を配列へ格納

        return View::forege('Post/list',$data); //配列をViewのlistへ渡す

    }
}