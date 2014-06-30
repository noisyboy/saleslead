@section('content')
<h1 class="page-header">New Contractor Group</h1>

@include('shared.error')

{{ Form::open(array('route' => 'contractorgroups.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('', 'Contractor Group',array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('contractor_group', '', array('class' => 'form-control', 'placeholder' => 'Contractor Group')) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('contractorgroups', 'Back', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop