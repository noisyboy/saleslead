@section('content')
<h1 class="page-header">New User</h1>

@include('shared.error')

{{ Form::open(array('url' => 'users/create', 'class' => 'form-horizontal', 'role' => 'form')) }}

	<div class="form-group">
		{{ Form::label('first_name', 'First Name',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('first_name', '', array('class' => 'form-control', 'placeholder' => 'First Name')) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('middle_name', 'Midlle Name',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('middle_name', '', array('class' => 'form-control', 'placeholder' => 'Midlle Name')) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('last_name', 'Last Name',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('last_name', '', array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('ident', 'Employee Id',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('ident', '', array('class' => 'form-control', 'placeholder' => 'Employee Id')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Email',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email')) }}
		</div>
	</div>
	<div id="area-select" class="form-group">
		{{ Form::label('department_id', 'Department',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::select('department_id', $departments,0, array('class' => 'form-control')) }}
		</div>
	</div>
	<br>
	<div class="form-group">
		{{ Form::label('username', 'Username',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'Username')) }}
		</div>
	</div>


	<div class="form-group">
		{{ Form::label('password', 'Password',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
		</div>
	</div>

		<div class="form-group">
		{{ Form::label('password_confirmation', 'Confirm Password',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) }}
		</div>
	</div>
	

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('users', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop