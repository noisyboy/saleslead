@section('content')
<h1 class="page-header">Users</h1>

<div class="page-header-button">
	{{ HTML::link('users/create','New User',array('class' => 'btn btn-primary')) }}
</div>

<div class="widget widget-table action-table">
	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Employee Name</th>
					<th>Department</th>
					<th>Role</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
			  	<tr>
					<td>
						{{ HTML::link('users/show/'.$user->id, $user->first_name.' '.$user->middle_name.' '.$user->last_name ) }}
					</td>
					<td>
						{{ $user->department->department }}
					</td>	
					<td></td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>

@stop
