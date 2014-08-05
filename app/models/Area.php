<?php 

class Area extends Eloquent {

	protected $fillable = array('area');
	public $timestamps = false;

	public static $rules = array(
		'area' => 'required'
	);

	public function projects()
	{
		return $this->hasMany('Project');
	}

	public function regions()
	{
		return $this->hasMany('Region');
	}

	
}