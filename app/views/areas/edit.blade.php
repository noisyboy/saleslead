@section('content')
<h1 class="page-header">Edit {{ $area->area }}</h1>

<div class="col-sm-6">
{{ Form::open(array('route' => array('areas.update', $area->id), 'method' => 'put','class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('area', 'Area') }}
		{{ Form::errorMsg('area', $errors) }}
		{{ Form::text('area', $area->area, array('class' => 'form-control', 'placeholder' => 'Area')) }}
	</div>

	<div class="form-group">
		{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
		{{ HTML::link('areas', 'Back', array('class' => 'btn btn-default')) }}
	</div>

{{ Form::close() }}
</div>
@stop