@section('content')

{{ HTML::linkRoute('projects.create', 'New Project', array(), array('class' => 'btn btn-primary')) }}

<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
	  	<h3>Projects</h3>
	</div>
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
						{{ HTML::linkRoute('projects.show', $project->project_name, $project->id ) }}
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
