@section('content')
<h1 class="page-header">New Region</h1>

@include('shared.error')

{{ Form::open(array('route' => 'regions.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('area_id', 'Area',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::select('area_id', $areas,'', array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('region', 'Region Name',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('region', '', array('class' => 'form-control', 'placeholder' => 'Region Name')) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('regions', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop