<?php

class AuthController extends \BaseController {

	public function getLogin()
	{
		$this->layout = View::make('layouts.front_end');
		$this->layout->content = View::make('users.login.login');
	}

	public function getLogout()
	{
		Auth::logout();
		// return Redirect::back()
		return Redirect::intended('/')
			->with(array('flash_message' => 'Invalid credentials, please try again','flash_type' =>'danger'))
			->withInput();
	}
	public function postLogin()
	{	
		$input = Input::all();
		$remember = (isset($input['remember'])) ? true : null;
		$rules = array('email_or_username' => 'required', 'password' => 'required|min:6');

		$validator = Validator::make($input, $rules);
		 
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		 
		// get model based on username_or_email, returns null if not present
		$user = User::where('email', $input['email_or_username'])
		->orWhere('username', $input['email_or_username'])
		->first();
		 
		 
		if(!$user) {
			$attempt = false;
		} else {
			$attempt = Auth::attempt(array(	'email' => $user->email,'password' => $input['password']),$remember);
		}	
		 
		if($attempt) {
			return Redirect::intended('/')
			->with(array('flash_message' => 'Successfully logged in',
			'flash_type' => 'success') );
		}
		 
		Auth::logout();
		return Redirect::back()
			->with(array('flash_message' => 'Invalid credentials, please try again','flash_type' =>'danger'))
			->withInput();
	}

}
