@section('content')
<h1 class="page-header">Roles</h1>

<div class="page-header-button">
	{{ HTML::link('roles/create', 'New Role', array('class' => 'btn btn-primary')) }}
</div>

<div class="widget widget-table action-table">

	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Role</th>
					<th>Area</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
			  	<tr>
					<td>
						{{ HTML::linkAction('RolesController@getCreate', $role->name, $role->id ) }}
					</td>
					<td>
						
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
