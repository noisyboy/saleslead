<?php

class PhonesController extends BaseController {

	public function store()
	{
		$input = Input::only('phone', 'phone_type_id','contact_id');
		$validation = Validator::make($input, Phone::$rules);

		if($validation->passes())
		{
			Phone::create($input);
			echo 'success';
		}
	}
}