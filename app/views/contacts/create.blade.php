@section('content')
<h1 class="page-header">Add Contact</h1>

@if ($errors->any())
<div class="col-md-offset-2 alert alert-danger " >
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
</div>
@endif

{{ Form::open(array('route' => 'contacts.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('company_name', 'Company Name',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('company_name', '', array('class' => 'form-control', 'placeholder' => 'Company Name')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('address', 'Address',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('address', '', array('class' => 'form-control', 'placeholder' => 'Address')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('first_name', 'First Name',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('first_name', '', array('class' => 'form-control', 'placeholder' => 'First Name')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('middle_name', 'Middle Name',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('middle_name', '', array('class' => 'form-control', 'placeholder' => 'Middle Name')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('last_name', 'Last Name',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('last_name', '', array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('title', 'Title',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Title')) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('contacts', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop