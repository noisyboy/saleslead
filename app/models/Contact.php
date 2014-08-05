<?php

class Contact extends Eloquent {
	
	protected $fillable = array(
		'company_name',
		'number',
		'street1',
		'street2',
		'city',
		'province',
		'first_name',
		'middle_name',
		'last_name',
		'title',);

	// public static $rules = array(
	// 	'company_name' => 'required',
	// 	'address' => 'required',
	// 	'first_name' => 'required',
	// 	'middle_name' => 'required',
	// 	'last_name' => 'required',
	// 	'title' => 'required'
	// );

	// auto add of created by
	public function save(array $options = array())
    {
        if( ! $this->created_by)
        {
            $this->created_by = Auth::user()->id;
        }
        parent::save($options);
    }

	public function phones()
	{
		return $this->hasMany('Phone')->with('phonetype');
	}

	public function emails()
	{
		return $this->hasMany('Email');
	}

	public function projects()
	{
		return $this->belongsToMany('Project','project_contacts')->withPivot('contractor_group_id','role','status_id','id');
	}

	public function getFullName()
	{
	    return $this->attributes['first_name'] .' '.$this->attributes['middle_name'].' '.$this->attributes['last_name'];
	}

	public function getAddress()
	{
		return $this->attributes['number'] 
			.' '.$this->attributes['street1']
			.' '.$this->attributes['street2']
			.' '.$this->attributes['city']
			.' '.$this->attributes['province'];
	}
	
	public function user(){
		return $this->belongsTo('User');
	}


	public function contractorGroup(){
		return $this->belongsToMany('ContractorGroup', 'contact_groups');
	}

}