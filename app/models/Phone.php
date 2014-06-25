<?php

class Phone extends Eloquent() {

	public function contact()
	{
		return $this->belongsTo('Contact');
	}
}