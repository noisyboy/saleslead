<?php

class ProjectSubCategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$p_sub_categories = ProjectSubCategory::all();
		$this->layout->content = View::make('project_sub_categories.index',compact('p_sub_categories'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		foreach (ProjectCategory::select('id', 'project_category')->orderBy('project_category','asc')->get() as $project_category)
		{
			$project_categories[$project_category->id] = $project_category->project_category;
		}
		$this->layout->content = View::make('project_sub_categories.create',compact('project_categories'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('project_category_id','project_sub_category');
		$validation = Validator::make($input, ProjectSubCategory::$rules);

		if($validation->passes())
		{
			ProjectSubCategory::create($input);
			Session::flash('message', 'Successfully created project sub category!');
			return Redirect::route('projectsubcategories.index');
		}else
		{
			return Redirect::route('projectsubcategories.create')
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
