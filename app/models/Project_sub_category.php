<?php

class ProjectSubCategory extends Eloquent{

	protected $fillable = array('project_sub_category','project_category_id');
	public $timestamps = false;

	public static $rules = array(
		'project_sub_category' => 'required',
		'project_category_id' => 'required'
	);	

	public function projectCategory(){
		return $this->belongsTo('ProjectCategory');
	}

	public function projects()
	{
		return $this->hasMany('Project');
	}
}
