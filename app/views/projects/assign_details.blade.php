@section('content')
<h1 class="page-header">{{ $project->project_name }}</h1>

@include('shared.error')
	<div class="form-horizontal">
		<div class="form-group">
			{{ Form::label('project_address', 'Project Adress',array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('project_address', $project->project_address, array('class' => 'form-control', 'readonly')) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('area', 'Area',array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('area', $project->area->area, array('class' => 'form-control', 'readonly')) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('region', 'Region',array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('region', $project->region->region, array('class' => 'form-control', 'readonly')) }}
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('project_classification', 'Project Classification',array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('project_classification', $project->project_classification->project_classification, array('class' => 'form-control', 'readonly')) }}
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('project_category', 'Project Category',array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('project_category', $project->project_category->project_category, array('class' => 'form-control', 'readonly')) }}
			</div>
		</div>
		@if($project->project_sub_category_id > 0)
		<div class="form-group"> 
			{{ Form::label('project_sub_category', 'Sub Category',array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('project_sub_category', $project->project_sub_category->project_sub_category, array('class' => 'form-control', 'readonly')) }}
			</div>
		</div>
		@endif

		<div class="form-group">
			{{ Form::label('project_stage', 'Project Stage',array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('project_stage', $project->project_stage->project_stage, array('class' => 'form-control', 'readonly')) }}
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('project_details', 'Project Details',array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::textarea('project_details', $project->project_details, array('class' => 'form-control', 'readonly')) }}
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('project_status', 'Project Status',array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('project_status', $project->project_status->project_status, array('class' => 'form-control', 'readonly')) }}
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('created_by', 'Created By',array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('created_by',$project->createdBy->getFullName(), array('class' => 'form-control', 'readonly')) }}
			</div>
		</div>

		{{ Form::open(array('action' => array('ProjectsController@postAssign',$project->id), 'class' => 'form-horizontal', 'role' => 'form')) }}

		<div id="assign_to_id" class="form-group">
			{{ Form::label('assign_to_id', 'Assign To',array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::select('assign_to_id', $users,0, array('class' => 'form-control')) }}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
				{{ HTML::link('projects/assign', 'Back', array('class' => 'btn btn-default')) }}
			</div>
		</div>
		{{ Form::close() }}
	</div>
@stop