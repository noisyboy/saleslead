@section('content')
<h1 class="page-header">Area</h1>

<div class="col-sm-6">
	<div>
		<div class="form-group">
		{{ Form::label('area', 'Area') }}
		{{ Form::errorMsg('area', $errors) }}
		{{ Form::text('area', $area->area, array('class' => 'form-control', 'readonly')) }}
		</div>

		<div class="form-group">
			{{ HTML::linkRoute('areas.edit','Edit', $area->id,array('class' => 'btn btn-primary') ) }}
			{{ HTML::linkRoute('areas.destroy','Delete', $area->id,array('class' => 'btn btn-danger') ) }}
			{{ HTML::link('areas', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
	


</div>
@stop