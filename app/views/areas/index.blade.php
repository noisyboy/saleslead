@section('content')
<h1 class="page-header">Areas</h1>

@include('shared.notification')

<div class="row">
	<div class="col-md-12">

		<div class="sub-menu">
      		<form role="search">
				<div class="form-group">
					{{ HTML::linkRoute('areas.create', 'New Area', array(), array('class' => 'btn btn-primary')) }}
				</div>
				
	       		<div class="form-group">
	          		<input type="text" name="q" class="form-control" placeholder="Search">
	        	</div>

	        	<div class="form-group">
	          		<button type="submit" class="btn btn-default">Submit</button>
	        	</div>

	        	<div class="sub-menu-links">
	          		{{ $areas->links() }}
	        	</div>
	      	</form>

      	</div>
      	
	</div>
	
	<div class="col-md-12">
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
				  	<tr>
						<th>Area</th>
						<th class="text-center" style="width:150px;">Actions</th>
				  	</tr>
				</thead>
				<tbody>
					@foreach($areas as $area)
				  	<tr>
						<td>
							{{ $area->area }}
						</td>
						<td>
						{{ HTML::linkRoute('areas.edit','Edit', $area->id, array('class' => 'btn btn-info') ) }}
						{{ Form::open(array('route' => array('areas.destroy', $area->id), 'method' => 'delete','class' => 'pull-right')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger', 'onclick' => "if(!confirm('Are you sure to delete this item?')){return false;};")) }}
						{{ Form::close() }}
						</td>
				  	</tr>
				  	@endforeach
				</tbody>
		  	</table>
		</div>
	</div>
	
</div>


@stop
