@section('content')
<h1 class="page-header">{{ $contact->getFullName() }}</h1>

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
							<th>Role</th>
					  	</tr>
					</thead>
					<tbody>
						@foreach($contact->projects as $project)
					  	<tr>
							<td>
								{{ HTML::linkAction('contacts.project', $project->project_name, $project->pivot->id ) }}
							</td>
							<td>
								{{ $project->getAddress() }}
							</td>	
							<td>
								{{ $project->pivot->role }}
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