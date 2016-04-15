<?php
/**
 * The Holy Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Holy extends Controller
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$route = Router::get('welcome');
		Cache::set('holy', $route, 3600);
		$content = Cache::get('holy');
		Cache::delete_all();
		
		return Response::forge(View::forge('holy/index'));
	}
}
