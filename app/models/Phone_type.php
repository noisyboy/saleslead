<?php 

class PhoneType extends Eloquent {
	public $timestamps = false;

	public function phones()
	{
		return $this->hasMany('Phone');
	}
}
