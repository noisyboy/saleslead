<?php

class ProjectCategory extends Eloquent {

	protected $fillable = array('project_category');
	public $timestamps = false;

	public static $rules = array(
		'project_category' => 'required'
	);

	public function projectSubCategories()
	{
		return $this->hasMany('ProjectSubCategory');
	}

	public function projects()
	{
		return $this->hasMany('Project');
	}
}