@section('content')

{{ HTML::linkRoute('contractorgroups.create', 'New Contractor Group', array(), array('class' => 'btn btn-primary')) }}

<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
	  	<h3>Contractor Groups</h3>
	</div>
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
