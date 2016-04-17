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

	public function action_index()
	{
		$data = new stdClass();
		$data->subnav = array('blog' => 'active' );
		$data->page_copy = Common::setCopy();

		$this->template->iconified = _ASSET."img/icon/iconified";
		$this->template->page_title = 'ブログ';
		$this->template->username = 'Joe14';
		$this->template->title = 'Blog &raquo; Blog';

		$this->template->navi = View::forge('common/navi', $data);
		$this->template->footer = View::forge('common/footer', $data);

		$this->template->content = View::forge('blog/index', $data);
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
