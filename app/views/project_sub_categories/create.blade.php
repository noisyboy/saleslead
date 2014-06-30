@section('content')
<h1 class="page-header">New Project Sub Category</h1>

@include('shared.error')

{{ Form::open(array('route' => 'projectsubcategories.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('project_category_id', 'Project Category',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::select('project_category_id', $project_categories,'', array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('project_sub_category', 'Project Sub Category',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('project_sub_category', '', array('class' => 'form-control', 'placeholder' => 'Project Sub Category')) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('projectsubcategories', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop