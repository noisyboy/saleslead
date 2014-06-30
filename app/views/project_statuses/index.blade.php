@section('content')
<h1 class="page-header">Project Statuses</h1>

<div class="page-header-button">
	{{ HTML::linkRoute('projectstatuses.create', 'New Project Status', array(), array('class' => 'btn btn-primary')) }}
</div>

<div class="widget widget-table action-table">
	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Project Status</th>
					<th>Description</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($project_statuses as $project_status)
			  	<tr>
					<td>
						{{ HTML::linkRoute('projectstatuses.show', $project_status->project_status, $project_status->id ) }}
					</td>
					<td>
						{{ $project_status->description }}
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
