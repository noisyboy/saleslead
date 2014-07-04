<?php

class Department extends Eloquent {

	protected $fillable = array('department');
	public $timestamps = false;

	public static $rules = array(
		'department' => 'required'
	);

	public function users()
	{
		return $this->hasMany('User');
	}
}