<?php

class Contact extends Eloquent {
	
	protected $fillable = array('company_name','address','first_name','middle_name','last_name','title');

	public static $rules = array(
		'company_name' => 'required',
		'address' => 'required',
		'first_name' => 'required',
		'middle_name' => 'required',
		'last_name' => 'required',
		'title' => 'required'
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

	public function phones()
	{
		return $this->hasMany('Phone')->with('phone_type');
	}

	public function emails()
	{
		return $this->hasMany('Email');
	}

	public function projects()
	{
		return $this->belongsToMany('Projects','project_contacts')->withPivot('contractor_group_id');
	}
}