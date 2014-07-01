<?php

class Project extends Eloquent {
	
	protected $fillable = array('project_name', 
		'project_address',
		'area_id',
		'region_id',
		'project_classification_id',
		'project_category_id',
		'project_sub_category_id',
		'project_stage_id',
		'project_details',
		'project_status_id');

	public static $rules = array(
		'project_name' => 'required',
		'project_address' => 'required',
		'area_id' => 'required',
		'region_id' => 'required',
		'project_classification_id' => 'required',
		'project_category_id' => 'required',
		'project_stage_id' => 'required',
		'project_details' => 'required',
		'project_status_id' => 'required',
	);

	public function contacts()
	{
		return $this->belongsToMany('Contact','project_contacts')->withPivot('contractor_group_id');
	}

	public function project_classification()
	{
		return $this->belongsTo('ProjectClassification');
	}

	public function project_category()
	{
		return $this->belongsTo('ProjectCategory');
	}

	public function project_sub_category()
	{
		return $this->belongsTo('ProjectSubCategory');
	}

	public function project_stage()
	{
		return $this->belongsTo('ProjectStage');
	}

	public function project_status()
	{
		return $this->belongsTo('ProjectStatus');
	}

	public function area()
	{
		return $this->belongsTo('Area');
	}

	public function region()
	{
		return $this->belongsTo('Region');
	}
}