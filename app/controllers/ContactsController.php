<?php

class ContactsController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $contacts = Contact::all();
		// $this->layout->content = View::make('contacts.index',compact('contacts'));\
		$this->layout->content = View::make('contacts.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		foreach (PhoneType::select('id', 'phone_type')->orderBy('id','asc')->get() as $phonetype)
		{
			$phonetypes[$phonetype->id] = $phonetype->phone_type;
		}
		$this->layout->content = View::make('contacts.create',compact('phonetypes'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// $input = Input::only('company_name', 'address','first_name','middle_name','last_name','title');

		$rules = array(
			'company_name' => 'required',
			'address' => 'required',
			'first_name' => 'required',
			'middle_name' => 'required',
			'last_name' => 'required',
			'title' => 'required'
		);

		$validation = Validator::make(Input::all(),$rules);

		if($validation->passes())
		{
			$contact = Contact::create($input);
			
			return Redirect::route('contacts.index');
		}else
		{
			return Redirect::route('contacts.create')
				->withInput()
				->withErrors($validation)
				->with('emails', Input::get('email'));
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
