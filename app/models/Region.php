<?php

class Region extends Eloquent {

	protected $fillable = array('region','area_id');
	public $timestamps = false;

	public static $rules = array(
		'region' => 'required',
		'area_id' => 'required'
	);	

	public function area(){
		return $this->belongsTo('Area');
	}
}