@section('content')
<h1 class="page-header">Regions</h1>

<div class="page-header-button">
	{{ HTML::linkRoute('regions.create', 'New Region', array(), array('class' => 'btn btn-primary')) }}
</div>

<div class="widget widget-table action-table">

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
