<?php

class ContractorGroup extends Eloquent {
	
	protected $table = 'project_contractor_groups';

	protected $fillable = array('contractor_group');
	public $timestamps = false;

	public static $rules = array(
		'contractor_group' => 'required'
	);

	public function projectContacts()
	{
		return $this->hasMany('ProjectContact');
	}
}