@section('content')
<h1 class="page-header">New Project</h1>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

{{ Form::open(array('route' => 'projects.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('project_name', 'Project Name',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('project_name', '', array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('project_address', 'Project Adress',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('project_address', '', array('class' => 'form-control', 'placeholder' => 'Project Adress')) }}
		</div>
	</div>
	<div id="area-select" class="form-group">
		{{ Form::label('area_id', 'Area',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::select('area_id', $areas,0, array('class' => 'form-control')) }}
		</div>
	</div>
	<div id="region-select" class="form-group">
		{{ Form::label('region_id', 'Region',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			<select class="form-control" id="region_id" name="region_id">
				<option value="0">SELECT REGION</option>
			</select>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('projects', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop