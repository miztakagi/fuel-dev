<?php

class Controller_Blog extends Controller_Template
{

	public $template = 'template';

	public function before()
	{

		parent::before();
		Config::load('define');

		$request = $this->request;
		Log::error('controller='.$request->controller.' action='.$request->action);
	}

	public function action_blog()
	{
		//echo Config::get('_ASSET_');
		$data["subnav"] = array('blog' => 'active' );
		$this->template->iconified = Config::get('_ASSET_')."img/icon/iconified";
		$this->template->page_title = 'Home';
		$this->template->site_title = 'My Website';
		$this->template->username = 'Joe14';
		$this->template->title = 'Blog &raquo; Blog';

		$this->template->navi = View::forge('common/navi');

		$this->template->content = View::forge('blog/blog', $data);
	}

	public function after($response)
  {
      return parent::after($response);
  }

}
