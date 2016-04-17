<?php

//echo Router::get('_404_');
	

/**
 * The Error Controller.
 * @package  app
 * @extends  Controller
 */
class Errors extends Controller
{
	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return Response::forge(Presenter::forge('error/404'), 404);
	}

}
