@section('content')
<h1 class="page-header">New Project Classification</h1>

@include('shared.error')

{{ Form::open(array('route' => 'projectclassifications.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('project_classification', 'Project Classification',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('project_classification', '', array('class' => 'form-control', 'placeholder' => 'Project Classification')) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('projectclassifications', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop