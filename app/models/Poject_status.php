<?php

class ProjectStatus extends Eloquent {

	protected $fillable = array('project_status','description');
	public $timestamps = false;

	public static $rules = array(
		'project_status' => 'required',
		'description' => 'required'
	);

	public function projects()
	{
		return $this->hasMany('Project');
	}
}