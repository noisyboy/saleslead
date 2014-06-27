<?php

class ContractorGroup extends Eloquent {
	
	protected $table = 'project_contractor_groups';

	protected $guarded = array('id');
	protected $fillable = array('contractor_group');
	public $timestamps = false;

	public static $rules = array(
		'contractor_group' => 'required'
	);

	public function project_contacts()
	{
		return $this->hasMany('ProjectContact');
	}
}