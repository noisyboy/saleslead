<?php 
namespace Api;

class ContactsController extends \BaseController {

	// /**
	//  * Display a listing of the resource.
	//  *
	//  * @return Response
	//  */
	// public function search_contact($search)
	// {
	// 	$contacts = \DB::table('contacts')
	// 		->where('first_name','LIKE','%'.$search.'%')
	// 		->get();

	// 	// return \Response::json(array(
	// 	// 	'error' => false,
	// 	// 	'regions' => $contacts
	// 	// 	));
	// 	return \Response::json($contacts);
	// }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getMyContacts()
	{
		// dd (\Input::all());
		$q = \Input::get('q');
		if (\Request::ajax())
		{
			$contacts = \Contact::
				where('created_by',\Auth::user()->id)
				->where(function($query) use ($q) {
					$query->where('first_name','LIKE','%'.$q.'%');
					$query->orWhere('middle_name','LIKE','%'.$q.'%');
					$query->orWhere('last_name','LIKE','%'.$q.'%');
				})
				->get();

			$data = array();
			if(!empty($contacts)){
				foreach ($contacts as $contact) 
				{
					$row_array['id'] = $contact->id;
					$row_array['text'] = $contact->getFullName();
					$row_array['company'] = $contact->company_name;
					$data[] = $row_array;
				}
			}
			

			return \Response::json(array(
				'status' => 'success',
				'contacts' => $data
				));
		}
		
	}

}
