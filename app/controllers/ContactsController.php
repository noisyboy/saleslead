<?php

class ContactsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$contacts = Contact::where('created_by',Auth::user()->id)->get();
		$this->layout->content = View::make('contacts.index',compact('contacts'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('contacts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('company_name', 'address','first_name','middle_name','last_name','title');
		$validation = Validator::make($input, Contact::$rules);

		if($validation->passes())
		{
			// $user_id = Auth::user()->id;
			// $contact = Contact::create($input);
			$contact = new Contact;
			$contact->created_by =  Auth::user()->id;
			$contact->company_name = Str::upper(Input::get('company_name'));
			$contact->address = Str::upper(Input::get('address'));
			$contact->first_name = Str::upper(Input::get('first_name'));
			$contact->middle_name = Str::upper(Input::get('middle_name'));
			$contact->last_name = Str::upper(Input::get('last_name'));
			$contact->title = Str::upper(Input::get('title'));
			$contact->save();

			Session::flash('message', 'Successfully created contact!');
			return Redirect::route('contacts.show',array($contact->id));
		}else
		{
			return Redirect::route('contacts.create')
				->withInput()
				->withErrors($validation);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{
		// $contact = Contact::find($id);
		$contact = Contact::with('projects')->find($id);

		foreach (PhoneType::select('id', 'phone_type')->orderBy('id','asc')->get() as $phonetype)
		{
			$phonetypes[$phonetype->id] = $phonetype->phone_type;
		}

		$this->layout->content = View::make('contacts.show',compact('contact','phonetypes'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
