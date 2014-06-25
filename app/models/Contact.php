<?php

class Contact extends Eloquent {
	
	protected $guarded = array('id');
	protected $fillable = array('company_name', 'address','first_name','middle_name','last_name','title');

	public static $rules = array(
		'company_name' => 'required',
		'address' => 'required',
		'first_name' => 'required',
		'middle_name' => 'required',
		'last_name' => 'required',
		'title' => 'required'
	);

	public function phones()
	{
		return $this->hasMany('Phone');
	}
}