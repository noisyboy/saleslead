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
		'project_status_id',
		'created_by',
		'assigned_to',
		'assigned_by',
		'status_id');

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

	// auto add of created by
	public function save(array $options = array())
    {
        if( ! $this->created_by)
        {
            $this->created_by = Auth::user()->id;
        }
        parent::save($options);
    }

	public function contacts()
	{
		return $this->belongsToMany('Contact','project_contacts')->withPivot('contractor_group_id','role','status_id','id');
	}

	public function projectClassification()
	{
		return $this->belongsTo('ProjectClassification');
	}

	public function projectCategory()
	{
		return $this->belongsTo('ProjectCategory');
	}

	public function projectSubCategory()
	{
		return $this->belongsTo('ProjectSubCategory');
	}

	public function projectStage()
	{
		return $this->belongsTo('ProjectStage');
	}

	public function createdBy(){
		return $this->belongsTo('User','created_by');
	}


	public function area()
	{
		return $this->belongsTo('Area');
	}

	public function region()
	{
		return $this->belongsTo('Region');
	}

	public function projectStatus()
	{
		return $this->belongsTo('ProjectStatus');
	}

	public function getAddress()
	{
		return $this->attributes['number'] 
			.' '.$this->attributes['street1']
			.' '.$this->attributes['street2']
			.' '.$this->attributes['city']
			.' '.$this->attributes['province'];
	}
}