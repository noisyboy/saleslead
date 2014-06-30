@section('content')
<h1 class="page-header">New Project Category</h1>

@include('shared.error')

{{ Form::open(array('route' => 'projectcategories.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('project_category', 'Project Category',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('project_category', '', array('class' => 'form-control', 'placeholder' => 'Project Category')) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('projectcategories', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop