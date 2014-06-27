@section('content')

{{ HTML::linkRoute('areas.create', 'New Area', array(), array('class' => 'btn btn-primary')) }}

<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
	  	<h3>Areas</h3>
	</div>
	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Area</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($areas as $area)
			  	<tr>
					<td>
						{{ HTML::linkRoute('areas.show', $area->area, $area->id ) }}
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
