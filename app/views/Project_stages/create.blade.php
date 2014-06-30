@section('content')
<h1 class="page-header">New Project Stage</h1>

@include('shared.error')

{{ Form::open(array('route' => 'projectstages.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('project_stage', 'Project Stage',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('project_stage', '', array('class' => 'form-control', 'placeholder' => 'Project Stage')) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::textarea('description', '', array('class' => 'form-control', 'placeholder' => 'Description')) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('projectstages', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop