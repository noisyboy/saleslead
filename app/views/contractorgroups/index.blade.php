@section('content')
<h1 class="page-header">Contractor Groups</h1>

<div class="page-header-button">
	{{ HTML::linkRoute('contractorgroups.create', 'New Contractor Group', array(), array('class' => 'btn btn-primary')) }}
</div>

<div class="widget widget-table action-table">

	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Contractor Group</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($c_groups as $c_group)
			  	<tr>
					<td>
						{{ HTML::linkRoute('contractorgroups.show', $c_group->contractor_group, $c_group->id ) }}
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
