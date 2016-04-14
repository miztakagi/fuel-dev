<?php

class Controller_Blog1 extends Controller_Template
{

	public function before()
	{
		$request = $this->request;
		echo Log::error('controller='.$request->controller.' action='.$request->action);

	}

	public function action_blog2()
	{
		Config::load('define');
		var_dump(Config::get('_COPY_'));
		$data['iconified'] = Config::get('asset_path')."img/icon/iconified";
		$data["subnav"] = array('blog2'=> 'active' );
		$data['page_title'] = 'Home';
		$data['site_title'] = 'My Website';
		$data['username'] = 'Joe14';
		$data['title'] = 'Blog1 &raquo; Blog2';
		$data['content'] = array("コンテンツコンテンツコンテンツコンテンツコンテンツ","こんてんつこんてんつこんてんつこんてんつ");


		//$this->template->iconified = Config::get('asset_path')."img/icon/iconified";
		// $this->template->page_title = 'Home';
		// $this->template->site_title = 'My Website';
		// $this->template->username = 'Joe14';
		// $this->template->title = 'Blog &raquo; Blog';
		// $this->template->content = View::forge('blog/blog', $data['content']);

		$data["subnav"] = array('blog'=> 'active' );
		$this->template->title = 'Blog &raquo; Blog';
		$this->template->content = View::forge('blog/blog', $data);

	}

}
