<?php

class Controller_Blog extends Controller_Template
{

	public $template = 'template/template'; // テンプレートファイルの指定

	public function before()
	{
		parent::before();
		$request = $this->request;
		Log::error('controller='.$request->controller.' action='.$request->action);
	}

	public function action_blog()
	{
		$data = new stdClass();
		$data->subnav = array('blog' => 'active' );

		$this->template = View::forge('template/template');

		$this->template->iconified = _ASSET_."img/icon/iconified";
		$this->template->page_title = 'Home';
		$this->template->site_title = 'My Website';
		$this->template->username = 'Joe14';
		$this->template->title = 'Blog &raquo; Blog';

		$this->template->navi = View::forge('common/navi');

		$this->template->content = View::forge('blog/blog', $data);
	}

	public function after($response)
  {
      // アクションから返すレスポンスオブジェクトが無い場合
			if (empty($response) or  ! $response instanceof Response){
				$response = \Response::forge($this->template->render()); // 定義されたテンプレートをレンダリングします
			}
			return parent::after($response);
  }

}
