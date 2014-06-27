<?php

class HellosController extends \BaseController {

	/**
	 * Display a listing of hellos
	 *
	 * @return Response
	 */
	public function index()
	{
		$hellos = Hello::all();

		return View::make('hellos.index', compact('hellos'));
	}

	/**
	 * Show the form for creating a new hello
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('hellos.create');
	}

	/**
	 * Store a newly created hello in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Hello::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Hello::create($data);

		return Redirect::route('hellos.index');
	}

	/**
	 * Display the specified hello.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$hello = Hello::findOrFail($id);

		return View::make('hellos.show', compact('hello'));
	}

	/**
	 * Show the form for editing the specified hello.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$hello = Hello::find($id);

		return View::make('hellos.edit', compact('hello'));
	}

	/**
	 * Update the specified hello in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$hello = Hello::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Hello::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$hello->update($data);

		return Redirect::route('hellos.index');
	}

	/**
	 * Remove the specified hello from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Hello::destroy($id);

		return Redirect::route('hellos.index');
	}

}
