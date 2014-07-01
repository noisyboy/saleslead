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

		$project_classifications['0'] = 'SELECT CLASSIFICATION';
		foreach (ProjectClassification::select('id','project_classification')->orderBy('project_classification')->get() as $project_classification) 
		{
			$project_classifications[$project_classification->id] = $project_classification->project_classification;
		}

		$project_categories['0'] = 'SELECT CATEGORY';
		foreach (ProjectCategory::select('id','project_category')->orderBy('project_category')->get() as $project_category) 
		{
			$project_categories[$project_category->id] = $project_category->project_category;
		}

		$project_stages['0'] = 'SELECT STAGE';
		foreach (ProjectStage::select('id','project_stage')->orderBy('project_stage')->get() as $project_stage) 
		{
			$project_stages[$project_stage->id] = $project_stage->project_stage;
		}

		$project_statuses['0'] = 'SELECT STAGE';
		foreach (ProjectStatus::select('id','project_status')->orderBy('project_status')->get() as $project_status) 
		{
			$project_statuses[$project_status->id] = $project_status->project_status;
		}

		$this->layout->content = View::make('projects.create',compact('areas',
			'project_classifications','project_categories','project_stages','project_statuses'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('project_name',
		 	'project_address',
		 	'area_id',
		 	'region_id',
		 	'project_classification_id',
			'project_category_id',
			'project_sub_category_id',
			'project_stage_id',
			'project_details',
			'project_status_id');
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
		$project = Project::with('project_classification')
			->with('project_category')
			->with('project_sub_category')
			->with('project_stage')
			->with('project_status')
			->with('area')
			->with('region')
			->find($id);
		$project_contacts = $project->contacts;

		$areas['0'] = 'SELECT AREA';
		foreach (Area::select('id','area')->orderBy('area')->get() as $area) 
		{
			$areas[$area->id] = $area->area;
		}

		$project_classifications['0'] = 'SELECT CLASSIFICATION';
		foreach (ProjectClassification::select('id','project_classification')->orderBy('project_classification')->get() as $project_classification) 
		{
			$project_classifications[$project_classification->id] = $project_classification->project_classification;
		}

		$project_categories['0'] = 'SELECT CATEGORY';
		foreach (ProjectCategory::select('id','project_category')->orderBy('project_category')->get() as $project_category) 
		{
			$project_categories[$project_category->id] = $project_category->project_category;
		}

		$project_stages['0'] = 'SELECT STAGE';
		foreach (ProjectStage::select('id','project_stage')->orderBy('project_stage')->get() as $project_stage) 
		{
			$project_stages[$project_stage->id] = $project_stage->project_stage;
		}

		$project_statuses['0'] = 'SELECT STAGE';
		foreach (ProjectStatus::select('id','project_status')->orderBy('project_status')->get() as $project_status) 
		{
			$project_statuses[$project_status->id] = $project_status->project_status;
		}

		$this->layout->content = View::make('projects.show',compact('c_groups',
			'project','project_contacts','areas','project_classifications',
			'project_categories','project_stages','project_statuses'));
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
