@section('content')
<h1 class="page-header">Project Stages</h1>

<div class="page-header-button">
	{{ HTML::linkRoute('projectstages.create', 'New Project Stage', array(), array('class' => 'btn btn-primary')) }}
</div>

<div class="widget widget-table action-table">
	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Project Stage</th>
					<th>Description</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($project_stages as $project_stage)
			  	<tr>
					<td>
						{{ HTML::linkRoute('areas.show', $project_stage->project_stage, $project_stage->id ) }}
					</td>
					<td>
						{{ $project_stage->description }}
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
