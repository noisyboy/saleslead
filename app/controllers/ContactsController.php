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
	public function getCreate()
	{
		$c_groups = ContractorGroup::all();
		$this->layout->content = View::make('contacts.create',compact('c_groups'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{
		$input = Input::only('company_name',
			'number',
			'street1',
			'street2',
			'city',
			'province',
			'first_name',
			'middle_name',
			'last_name',
			'title',
			'c_group');
		
		$rules = array('company_name' => 'required',
			'first_name' => 'required',
			'middle_name' => 'required',
			'last_name' => 'required');

		$messages = array(
			'required' => 'This field is required.');

		$validation = Validator::make($input,$rules,$messages);

		if($validation->passes())
		{
			// dd(Input::all());
			$contact = new Contact;		
			$contact->company_name = Str::upper(Input::get('company_name'));

			$contact->number = Str::upper(Input::get('number'));
			$contact->street1 = Str::upper(Input::get('street1'));
			$contact->street2 = Str::upper(Input::get('street2'));
			$contact->city = Str::upper(Input::get('city'));
			$contact->province = Str::upper(Input::get('province'));
			
			$contact->first_name = Str::upper(Input::get('first_name'));
			$contact->middle_name = Str::upper(Input::get('middle_name'));
			$contact->last_name = Str::upper(Input::get('last_name'));
			$contact->title = Str::upper(Input::get('title'));
			$contact->save();

			$contact->contractorGroup()->sync(Input::get('c_group'));

			Session::flash('class', 'alert alert-success');
			Session::flash('message', 'Successfully created contact!');

			return Redirect::route('contacts.show',array($contact->id));
		}else
		{
			return Redirect::to('contacts/create')
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
