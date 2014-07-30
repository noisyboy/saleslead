<?php
namespace Api;

class ProjectsController extends \BaseController {
	

	/**
	 * add contacts to existring project
	 */
	public function postAddContact($id = null){
		if(!is_null($id)){
			
			return \Response::json(array(
			'error' => false));
		}else{
			return \Response::json(array(
			'error' => true));
		}
		
	}
}
