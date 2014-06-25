<?php

class PhoneTypesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response (json)
	 */
	public function Json()
	{
		$phonetypes = PhoneType::orderBy('phone_type')->get();
		return Response::json($phonetypes);
	}
}