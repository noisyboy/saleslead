<?php

class ProjectContact extends Eloquent {
	
	public function contractor_group(){
		return $this->belongsTo('ContractorGroup');
	}

}