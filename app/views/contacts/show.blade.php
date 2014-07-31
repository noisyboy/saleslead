@section('content')
<h1 class="page-header">{{ $contact->company_name }}</h1>

<div class="row">
	<div class="col-md-3">
		@include('contacts.partials.contact_details')
	</div>

	<div class="col-md-9">
		<h3 class="sub-header">Projects Involved</h3>
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
						@foreach($contact->projects as $project)
					  	<tr>
							<td>
								{{ HTML::linkAction('ProjectsController@getListing', $project->project_name, $project->id ) }}
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
	</div>
</div>

@stop