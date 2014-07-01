<?php 
namespace Api;

class ContactsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function search_contact($search)
	{
		$contacts = \DB::table('contacts')
			->where('first_name','LIKE','%'.$search.'%')
			->get();

		// return \Response::json(array(
		// 	'error' => false,
		// 	'regions' => $contacts
		// 	));
		return \Response::json($contacts);
	}

}
