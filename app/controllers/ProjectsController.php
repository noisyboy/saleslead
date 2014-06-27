<?php

class ProjectsController extends BaseController {
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
			Session::flash('message', 'Successfully created contact!');
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
		$c_groups = ContractorGroup::all();
		$project = Project::find($id);

		foreach ($c_groups as $group) 
		{	
			$contact_list = ProjectContact::where('project_id',$id)
					->where('contractor_group_id',$group->id)
					->join('contacts', 'contact_id', '=', 'contacts.id')
					->get();

			if($contact_list)
			{
				foreach ($contact_list as $key => $person) {
					// echo $person->contact_id;
					$contact_list[$key]['c_list'] = Contact::with('phones.phone_type')->with('emails')->find($person->contact_id);
				}
				
			}
			$project_contacts[$group->id] = (object) array(
				'group' => $group->contractor_group, 
				'contacts_list' => (object) array('contacts' => $contact_list) 
				);
		}

		$this->layout->content = View::make('projects.show',compact('project','project_contacts'));
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
