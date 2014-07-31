<?php

class ProjectsController extends BaseController {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		// $projects = Project::all();
		// $projects = Project::where('created_by', Auth::user()->id)->get();
		// $this->layout->content =  View::make('projects.index',compact('projects'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
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
	public function postStore()
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
			// $project = Project::create($input);

			$project = new Project;
			$project->project_name = Str::upper(Input::get('project_name'));
			$project->project_address = Str::upper(Input::get('project_address'));
			$project->area_id = Input::get('area_id');
			$project->region_id = Input::get('region_id');
		    $project->project_classification_id = Input::get('project_classification_id');
		    $project->project_category_id = Input::get('project_category_id');
		    $project->project_stage_id = Input::get('project_stage_id');
		    $project->project_details = Input::get('project_details');
		    $project->project_status_id = Input::get('project_status_id');
		    $project->created_by = Auth::user()->id;
		    $project->save();

			Session::flash('message', 'Successfully created project!');
			return Redirect::action('ProjectsController@getShow',array($project->id));
		}
		else
		{
			return Redirect::to('projects/create')
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
		$c_groups = ContractorGroup::orderBy('contractor_group')->get();
		$project = Project::find($id);
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
	public function getEdit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDestroy($id)
	{
		//
	}


	/**
	 * list of projects for assigning
	 */
	public function getAssign($id = null)
	{
		if(is_null($id)){
			$projects = Project::where('status_id',1)->get();
			$this->layout->content =  View::make('projects.assign',compact('projects'));
		}else{
			if(!is_numeric($id)){
				$this->missingMethod();
			}else{
				$project = Project::where('id',$id)
					->where('status_id',1)
					->first();

				if(empty($project)){
					$this->missingMethod();
				}else{
					$users['0'] = 'SELECT BDO';

					foreach (User::where('active','1')->orderBy('first_name')->get() as $user) 
					{
						$users[$user->id] = Str::upper($user->getFullName());
					}
					$this->layout->content =  View::make('projects.assign_details',compact('project','users'));	
				}
			}
		}
		
	}

	public function postAssign($id = null)
	{
		if((is_null($id)) || (!is_numeric($id))){
			$this->missingMethod();
		}else{
			$project = Project::where('id',$id)
					->where('status_id',1)
					->first();
			if(empty($project)){
				$this->missingMethod();
			}else{
				$rules = array('assign_to_id' => 'required|integer|min:1');
				$validator = Validator::make(Input::only('assign_to_id'), $rules);

				if($validator->passes())
				{
					$project->assigned_to = Input::get('assign_to_id');
					$project->assigned_by = Auth::user()->id;
					$project->status_id = 2;
					$project->save();

					// redirect
					Session::flash('class', 'alert alert-success');
					Session::flash('message', 'Successfully assigned project!');
					return Redirect::to('projects/assign');
				}
				else
				{
					return Redirect::action('ProjectsController@postAssign',array($project->id))
						->withInput()
						->withErrors($validator);
				}
			}
		}
	}

	/**
	 * list of assigned projects
	 */
	public function getAssigned()
	{
		$projects = Project::where('status_id',2)
			->where('assigned_to',Auth::user()->id)->get();
		
		$this->layout->content =  View::make('projects.assigned',compact('projects'));
		
	}

	/**
	 * list of open projects
	 */
	public function getListing($id = null)
	{
		if(is_null($id))
		{
			$projects = Project::where('status_id',2)->get();
			$this->layout->content =  View::make('projects.listing',compact('projects'));
		}
		else
		{
			$c_groups = ContractorGroup::orderBy('contractor_group')->get();

			$project = Project::find($id);
			
			$project_contacts = $project->contacts;
			$this->layout->content = View::make('projects.open_details',compact('c_groups','project','project_contacts','contacts'));
			
		}
	}

	

}
