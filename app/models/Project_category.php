<?php

class ProjectCategory extends Eloquent {

	protected $guarded = array('id');
	protected $fillable = array('project_category');
	public $timestamps = false;

	public static $rules = array(
		'project_category' => 'required'
	);
}