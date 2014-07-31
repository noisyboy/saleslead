<?php
namespace Api;

class ProjectsController extends \BaseController {
	

	/**
	 * add contacts to existring project
	 */
	public function postAddContact($id = null){
		if(is_null($id)){
			return \Response::json(array(
			'status' => 'error occured'));
		}else{
			$rules = array('contact' => 'required|integer|min:1',
				'group_id' => 'required|integer|min:1',
				'project_id' => 'required|integer|min:1',
				'role' => 'required',
				);
			$validator = \Validator::make(\Input::only('contact', 'group_id', 'project_id', 'role'), $rules);

			if($validator->passes())
			{
				$prjContact = new \ProjectContact();
				$prjContact->project_id = \Input::get('project_id');
				$prjContact->contact_id = \Input::get('contact');
				$prjContact->contractor_group_id = \Input::get('group_id');
				$prjContact->role = \Input::get('role');
				$prjContact->save();

				// redirect
				return \Response::json(array(
				'status' => 'success'));
			}
			else
			{
				return \Response::json(array(
				'status' => 'error occured'));
			}


			
		}
		
	}
}
