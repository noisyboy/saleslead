<?php

class Project extends Eloquent {
	
	protected $guarded = array('id');
	protected $fillable = array('project_name', 'project_address','area_id','region_id');

	public static $rules = array(
		'project_name' => 'required',
		'project_address' => 'required',
		'area_id' => 'required',
		'region_id' => 'required'
	);

	public function contacts()
	{
		return $this->belongsToMany('Contact','project_contacts')->withPivot('contractor_group_id');
	}
}