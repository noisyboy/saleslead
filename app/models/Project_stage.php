<?php

class ProjectStage extends Eloquent{

	protected $fillable = array('project_stage','description');
	public $timestamps = false;

	public static $rules = array(
		'project_stage' => 'required',
		'description' => 'required'
	);

	public function projects()
	{
		return $this->hasMany('Project');
	}
}