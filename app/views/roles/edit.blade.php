@section('content')
<h1 class="page-header">Edit {{ $role->name }}</h1>

@if ($errors->any())
<div class="col-md-offset-2 alert alert-danger " >
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
</div>
@endif

{{ Form::open(array('action' => array('RolesController@putUpdate',$role->id) ,'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('name', 'Role',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('name', $role->name , array('class' => 'form-control', 'placeholder' => 'Role')) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('roles', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop