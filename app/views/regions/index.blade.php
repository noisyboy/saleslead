@section('content')

{{ HTML::linkRoute('regions.create', 'New Region', array(), array('class' => 'btn btn-primary')) }}

<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
	  	<h3>Regions</h3>
	</div>
	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Region</th>
					<th>Area</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($regions as $region)
			  	<tr>
					<td>
						{{ HTML::linkRoute('regions.show', $region->region, $region->id ) }}
					</td>
					<td>
						{{ $region->area }}
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
