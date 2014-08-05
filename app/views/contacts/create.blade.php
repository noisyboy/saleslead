@section('content')
<h1 class="page-header">Add Contact</h1>

<div class="col-sm-6">

{{ Form::open(array('route' => 'contacts.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('company_name', 'Company Name') }}
		{{ Form::errorMsg('company_name', $errors) }}
		{{ Form::text('company_name', '', array('class' => 'form-control', 'placeholder' => 'Company Name')) }}
	</div>
		

	<div class="form-group">
			<label>Company Address</label>
	</div>

	<div class="form-group">
		<div class="col-sm-6">
			{{ Form::label('number', 'Lot / Blk / House No. / Unit No.') }}
			{{ Form::text('number', '', array('class' => 'form-control', 'placeholder' => 'Lot / Blk / House No. / Unit No.')) }}
		</div>
		<div class="col-sm-6">
			{{ Form::label('street1', 'Street') }}
			{{ Form::text('street1', '', array('class' => 'form-control', 'placeholder' => 'Street')) }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-6">
			{{ Form::label('street2', 'Brgy. / Subdivision') }}
			{{ Form::text('street2', '', array('class' => 'form-control', 'placeholder' => 'Brgy. / Subdivision')) }}
		</div>

		<div class="col-sm-6">
			{{ Form::label('city', 'Town / City') }}
			{{ Form::text('city', '', array('class' => 'form-control', 'placeholder' => 'Town / City')) }}
		</div>
	
	</div>
	<div class="form-group">
		<div class="col-sm-6">
			{{ Form::label('province', 'Province') }}
			{{ Form::text('province', '', array('class' => 'form-control', 'placeholder' => 'Province')) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('first_name', 'First Name') }}
		{{ Form::errorMsg('first_name', $errors) }}
		{{ Form::text('first_name', '', array('class' => 'form-control', 'placeholder' => 'First Name')) }}
	</div>

	<div class="form-group">
		{{ Form::label('middle_name', 'Middle Name') }}
		{{ Form::errorMsg('middle_name', $errors) }}
		{{ Form::text('middle_name', '', array('class' => 'form-control', 'placeholder' => 'Middle Name')) }}
	</div>

	<div class="form-group">
		{{ Form::label('last_name', 'Last Name') }}
		{{ Form::errorMsg('last_name', $errors) }}
		{{ Form::text('last_name', '', array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
	</div>

	<div class="form-group">
		{{ Form::label('title', 'Title / Posistion') }}
		{{ Form::errorMsg('title', $errors) }}
		{{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Title / Posistion')) }}
	</div>


	<div class="form-group">
		{{ Form::label('c_groups', 'Service Offered') }}
		@foreach($c_groups as $group)
		<div class="checkbox">
		  	<label>
		    	<input name="c_group[]" type="checkbox" value="{{ $group->id }}">{{ $group->contractor_group }}
		  	</label>
		</div>
		@endforeach
	</div>

	<div class="form-group">
		{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
		{{ HTML::link('contacts', 'Back', array('class' => 'btn btn-default')) }}
	</div>

{{ Form::close() }}
</div>
@stop