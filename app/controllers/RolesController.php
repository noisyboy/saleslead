<?php

class RolesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$roles = Role::all();
		$this->layout->content = View::make('roles.index',compact('roles'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$this->layout->content = View::make('roles.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{
		$input = Input::only('name');
		$validation = Validator::make($input, Role::$rules);

		if($validation->passes())
		{
			$role = new Role;
			$role->name = Str::upper(Input::get('name'));
			$role->save();

			Session::flash('class', 'alert alert-success');
			Session::flash('message', 'Successfully created role!');
			// return Redirect::action('RolesController@getShow',array($role->id));
			return Redirect::to('roles');
		}else
		{
			return Redirect::to('roles/create')
				->withInput()
				->withErrors($validation);
		}
	}


	// /**
	//  * Display the specified resource.
	//  *
	//  * @param  int  $id
	//  * @return Response
	//  */
	// public function getShow($id)
	// {
	// 	$role = Role::find($id);
	// 	$this->layout->content = View::make('roles.show',compact('role'));
	// }


	// *
	//  * Show the form for editing the specified resource.
	//  *
	//  * @param  int  $id
	//  * @return Response
	 
	public function getEdit($id = null)
	{
		if((is_null($id)) || (!is_numeric($id))){
			$this->missingMethod();
		}else{
			$role = Role::find($id);
			
			if(empty($role)){
				$this->missingMethod();
			}else{
				$this->layout->content = View::make('roles.edit',compact('role'));
			}

		}
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate($id = null)
	{
		if((is_null($id)) || (!is_numeric($id))){
			$this->missingMethod();
		}else{
			$role = Role::find($id);
			
			if(empty($role)){
				$this->missingMethod();
			}else{
				$input = Input::only('name');
				$validation = Validator::make($input, Role::$rules);

				if($validation->passes())
				{
					$role = Role::find($id);
					$role->name = Str::upper(Input::get('name'));
					$role->save();

					Session::flash('class', 'alert alert-success');
					Session::flash('message', 'Successfully updated role!');
					return Redirect::to('roles');
				}else
				{
					return Redirect::action('RolesController@getEdit',array($role->id))
						->withInput()
						->withErrors($validation);
				}
			}

		}

		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteDestroy($id = null)
	{
		if((is_null($id)) || (!is_numeric($id))){
			$this->missingMethod();
		}else{
			$role = Role::find($id);
			
			if(empty($role)){
				$this->missingMethod();
			}else{
				$role_users = Role::find($id)->users()->get();
				// print_r($role->toArray());
				if(count($role_users)>0){
					// redirect
					Session::flash('class', 'alert alert-danger');
					Session::flash('message', 'Cannot delete selected role!');
					return Redirect::to('roles');
				}else{
					// delete
					$role->delete();

					// redirect
					Session::flash('class', 'alert alert-success');
					Session::flash('message', 'Successfully deleted the role!');
					return Redirect::to('roles');
				}

			}

		}
	}

	// role permissions
	public function getPermission($id = null)
	{
		if((is_null($id)) || (!is_numeric($id))){
			$this->missingMethod();
		}else{
			$role = Role::with('perms')->find($id);
			if(empty($role)){
				$this->missingMethod();
			}else{
				$selected = array();
				foreach ($role->perms as $perm) {
					$selected[] = $perm->id;
				}

				$permissions = Permission::all();
				$this->layout->content = View::make('roles.permissions',compact('permissions','role','selected'));
			}

		}
		
	}

	public function putPermission($id)
	{
		if((is_null($id)) || (!is_numeric($id))){
			$this->missingMethod();
		}else{
			$role = Role::find($id);	
			if(empty($role)){
				$this->missingMethod();
			}else{
				$perms = Input::get('permission_id');
				if(!empty($perms)){
					$role->perms()->sync($perms);
				}else{
					$role->detachPermissions($role->perms);
				}
					
				Session::flash('class', 'alert alert-success');
				Session::flash('message', 'Successfully updated permission!');
				return Redirect::action('RolesController@getPermission',array($role->id));
			}

		}
		
	}


}
