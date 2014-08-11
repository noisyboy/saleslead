@section('content')
<h1 class="page-header">New Task</h1>

<div class="col-md-6">

{{ Form::open(array('route' => 'areas.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('title', 'Task Title') }}
		{{ Form::errorMsg('title', $errors) }}
		{{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Task Title')) }}
	</div>

	<div class="form-group">
		{{ Form::label('details', 'Details') }}
		{{ Form::errorMsg('details', $errors) }}
		{{ Form::textarea('details', '', array('class' => 'form-control', 'placeholder' => 'Details')) }}
	</div>

	<div class="form-group">
    	<label>
      		<input type="checkbox"> Recurring
    	</label>
  	</div>

  	<div class="form-group">
  		    <div class="input-daterange input-group" id="datepicker">
    <input type="text" class="input-sm form-control" name="start" />
    <span class="input-group-addon">to</span>
    <input type="text" class="input-sm form-control" name="end" />
    </div>
	</div>


	<div class="form-group">
		{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
		{{ HTML::link('areas', 'Back', array('class' => 'btn btn-default')) }}
	</div>

{{ Form::close() }}
</div>
@stop