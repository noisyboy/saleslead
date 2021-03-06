<?php

class BaseController extends Controller {

	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	}

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	

	public function missingMethod($parameters = array())
	{
	    $this->layout->content =  View::make('errors.404_error');
	}

	
}
