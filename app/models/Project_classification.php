<?php

class ProjectClassification extends Eloquent {
	
	protected $fillable = array('project_classification');
	public $timestamps = false;

	public static $rules = array(
		'project_classification' => 'required'
	);

	public function projects()
	{
		return $this->hasMany('Project','created_by');
	}
}