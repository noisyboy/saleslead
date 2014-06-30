@section('content')
<h1 class="page-header">New Project Status</h1>

@include('shared.error')

{{ Form::open(array('route' => 'projectstatuses.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('project_status', 'Project Status',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('project_status', '', array('class' => 'form-control', 'placeholder' => 'Project Status')) }}
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
			{{ HTML::link('projectstatuses', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop