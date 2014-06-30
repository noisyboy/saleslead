<?php

class Phone extends Eloquent {

	protected $fillable = array('phone', 'phone_type_id','contact_id');
	public $timestamps = false;

	public static $rules = array(
		'phone' => 'required',
		'phone_type_id' => 'required',
		'contact_id' => 'required'
	);

	public function contact()
	{
		return $this->belongsTo('Contact');
	}

	public function phone_type()
	{
		return $this->belongsTo('PhoneType');
	}
}