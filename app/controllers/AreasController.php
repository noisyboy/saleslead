<?php 

class AreasController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$filter = Input::get('q');
		$areas = Area::where('area','LIKE','%'.$filter.'%')
			->orderBy('area')
			->paginate(10);

		$query = array_except( Input::query(), Paginator::getPageName());
		$areas->appends($query);

		$this->layout->content = View::make('areas.index',compact('areas'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('areas.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('area');
		
		$rules = array('area' => 'required|unique:areas');

		$messages = array(
			'required' => 'This field is required.',
			'integer' => 'This field is required.',
			'min' => 'This field is required.');

		$validator = Validator::make($input,$rules,$messages);

		if ($validator->fails())
		{
			return Redirect::route('areas.create')
				->withInput()
				->withErrors($validator);
		}

		Area::create($input);
		Session::flash('class', 'alert alert-success');
		Session::flash('message', 'Successfully created area!');
		return Redirect::route('areas.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// return Redirect::route('areas.edit',array($id));
		$this-> missingMethod();
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$area = Area::findOrFail($id);
		$this->layout->content = View::make('areas.edit', compact('area'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$area = Area::findOrFail($id);

		$input = Input::only('area');
		
		$rules = array('area' => 'required|unique:areas');

		$messages = array(
			'required' => 'This field is required.',
			'integer' => 'This field is required.',
			'min' => 'This field is required.');

		$validator = Validator::make($input,$rules,$messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$area->update($input);

		Session::flash('class', 'alert alert-success');
		Session::flash('message', 'Successfully updated area!');
		return Redirect::route('areas.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$area = Area::findOrFail($id);
		
		$area->destroy($id);

		Session::flash('class', 'alert alert-success');
		Session::flash('message', 'Successfully deleted area!');
		return Redirect::route('areas.index');
	}


}
