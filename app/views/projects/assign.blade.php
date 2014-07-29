@section('content')
<h1 class="page-header">Assign Projects</h1>

@include('shared.notification')

<div class="widget widget-table action-table">
	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Project Name</th>
					<th>Project Address</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($projects as $project)
			  	<tr>
					<td>
						{{ HTML::linkAction('ProjectsController@getAssign', $project->project_name, $project->id ) }}
					</td>
					<td>
						{{ $project->project_address }}
					</td>	
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
