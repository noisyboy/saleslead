<?php

class EmailsController extends BaseController {

	public function putStore()
	{
		$input = Input::only('email', 'contact_id');
		$validation = Validator::make($input, Email::$rules);

		if($validation->passes())
		{
			Email::create($input);
			echo 'success';
		}
	}
}