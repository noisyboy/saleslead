@section('content')
<h1 class="page-header">My Projects</h1>

<div class="page-header-button">
	{{ HTML::link('projects/create','New Project',array('class' => 'btn btn-primary')) }}
</div>

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
						{{ HTML::linkAction('ProjectsController@getShow', $project->project_name, $project->id ) }}
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
