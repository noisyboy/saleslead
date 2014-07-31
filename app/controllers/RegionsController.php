<?php

class RegionsController extends \BaseController {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$regions = Region::all();
		$this->layout->content = View::make('regions.index',compact('regions'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		foreach (Area::select('id', 'area')->orderBy('id','asc')->get() as $area)
		{
			$areas[$area->id] = $area->area;
		}
		$this->layout->content = View::make('regions.create',compact('areas'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('region','area_id');
		$validation = Validator::make($input, Region::$rules);

		if($validation->passes())
		{
			Region::create($input);
			Session::flash('message', 'Successfully created region!');
			return Redirect::route('regions.index');
		}else
		{
			return Redirect::route('regions.create')
				->withInput()
				->withErrors($validation);
		}//
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
