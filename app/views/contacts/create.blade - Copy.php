@section('content')
<h1>Add Contact</h1>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

{{ Form::open(array('url' => 'contacts/store', 'class' => 'form-horizontal', 'role' => 'form')) }}
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
	<div id="phone-wrapper">
		<div class="form-group">
			<label class="col-sm-2 text-right">
				<a class="btn btn-success" id="add-phone" href="#">
					<span class="glyphicon glyphicon-plus"></span>
				</a>
			</label>
			<div class="col-sm-5">
				<!-- {{ Form::select('phonetype[]', $phonetypes,'', array('class' => 'form-control')) }} -->
			</div>
			<div class="col-sm-5">
				<!-- {{ Form::text('phone[]', '', array('class' => 'form-control', 'placeholder' => 'Add Phone')) }} -->
			</div>	
		</div>
	</div>
	<div id="email-wrapper">
		<div class="form-group">
			<label class="col-sm-2 text-right">
				<a class="btn btn-success" id="add-email" href="#">
					<span class="glyphicon glyphicon-plus"></span>
				</a>
			</label>
			<div class="col-sm-10">
				{{ Form::text('email[0]', '', array('class' => 'form-control', 'placeholder' => 'Add Email')) }}
			</div>
		</div>
	@if(Session::get('emails'))
		@foreach (Session::get('emails') as $key => $row)
		@if($key != 0)
		<div class="form-group">
			<label class="col-sm-2 text-right">
				<a class="btn btn-danger remove-email" id="add-email" href="#">
					<span class="glyphicon glyphicon-minus"></span>
				</a>
			</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" value="{{ $row }}" name="email[{{ $key }}]" placeholder="Add Email">
			</div>
		</div>
		@endif
		@endforeach
	@endif

	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('contacts', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop