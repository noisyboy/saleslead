<?php

class ProjectsController extends BaseController {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();
		$this->layout->content =  View::make('projects.index',compact('projects'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$areas['0'] = 'SELECT AREA';
		foreach (Area::select('id','area')->orderBy('area')->get() as $area) 
		{
			$areas[$area->id] = $area->area;
		}
		$this->layout->content = View::make('projects.create',compact('areas'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('project_name', 'project_address','area_id','region_id');
		$validation = Validator::make($input, Project::$rules);

		if($validation->passes())
		{
			$project = Project::create($input);
			// return Redirect::route('contacts.index');
			// redirect
			Session::flash('message', 'Successfully created project!');
			return Redirect::route('projects.show',array($project->id));
		}else
		{
			return Redirect::route('projects.create')
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
		$c_groups = ContractorGroup::orderBy('contractor_group')->get();
		$project = Project::find($id);
		$project_contacts = $project->contacts;
		
		$this->layout->content = View::make('projects.show',compact('c_groups','project','project_contacts'));
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
