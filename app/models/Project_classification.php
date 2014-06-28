<?php

class ProjectClassification extends Eloquent {

	protected $guarded = array('id');
	protected $fillable = array('project_classification');
	public $timestamps = false;

	public static $rules = array(
		'project_classification' => 'required'
	);
}