<?php

class ProjectCategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$project_categories = ProjectCategory::all();
		$this->layout->content = View::make('project_categories.index',compact('project_categories'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('project_categories.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('project_category');
		$validation = Validator::make($input, ProjectCategory::$rules);

		if($validation->passes())
		{
			$p_category = ProjectCategory::create($input);
			Session::flash('message', 'Successfully created project category!');
			return Redirect::route('projectcategories.show',array($p_category->id));
		}else
		{
			return Redirect::route('projectcategories.create')
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
	public function show($id)
	{
		$p_category = ProjectCategory::find($id);
		$this->layout->content = View::make('project_categories.show',compact('p_category'));
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
