<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Index Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Index extends Controller
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		Common::dump(_SITENAME_); // dump() はDEVELOPMENT の時のみ出力される

		//assign variables
		$data = array();
		$data['iconified'] = _ASSET_."img/icon/iconified";
		$data['page_title'] = 'Home';
		$data['site_title'] = 'My Website';
		$data['username'] = 'Joe14';

		// create the layout view
		$view = View::forge('common/layout', $data);

		$view = Common::setLayout($view, $data);

		// //assign views as variables, lazy rendering
		// $view->css1 = View::forge('common/css1', $data);
		// $view->navi = View::forge('common/navi', $data);
		// $view->wrap = View::forge('common/wrap', $data);
		// $view->footer = View::forge('common/footer', $data);
		// $view->script1 = View::forge('common/script1', $data);

		$view->content = static::setData();

		// return the view object to the Request
		return $view;

		//return Response::forge(View::forge('index/index'));
	}

	static function setData(){
		return "CONTENT";
	}

}
