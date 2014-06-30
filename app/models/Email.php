<?php

class Email extends Eloquent {

	protected $fillable = array('email','contact_id');
	public $timestamps = false;

	public static $rules = array(
		'email' => 'required',
		'contact_id' => 'required'
	);

	public function contact()
	{
		return $this->belongsTo('Contact');
	}

}