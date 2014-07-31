<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$users = User::all();
		$this->layout->content = View::make('users.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		foreach (Department::select('id', 'department')->orderBy('id','asc')->get() as $department)
		{
			$departments[$department->id] = $department->department;
		}
		
		foreach (Role::select('id', 'name')->orderBy('name','asc')->get() as $role)
		{
			$roles[$role->id] = $role->name;
		}

		$this->layout->content = View::make('users.create',compact('departments','roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
	    $validation = Validator::make(Input::all(), User::$rules);

		if($validation->passes())
		{
			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->middle_name = Input::get('middle_name');
			$user->last_name = Input::get('last_name');
			$user->ident = Input::get('ident');
		    $user->department_id = Input::get('department_id');
		    $user->username = Input::get('username');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->active = 1;
		    $user->save();

		    $user->roles()->attach((int)Input::get('role')); // id only
		    return Redirect::action('UsersController@getShow',array($user->id));
		}else
		{
			return Redirect::to('users/create')
				->withInput()
				->with('message', 'The following errors occurred')
				->withErrors($validation);
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{
		//
	}


}
