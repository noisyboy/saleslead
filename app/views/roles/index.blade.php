@section('content')
<h1 class="page-header">Roles</h1>

@include('shared.notification')


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
					<th>Role Permissions</th>
					<th class="text-center" style="width:150px;">Actions</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
			  	<tr>
					<td>
						{{ $role->name }}
					</td>
					<td>
						{{ HTML::linkAction('RolesController@getPermission','Manage', $role->id ) }}
					</td>
					<td class="text-center">
						{{ HTML::linkAction('RolesController@getEdit','Edit', $role->id, array('class' => 'btn btn-info') ) }}
						{{ Form::open(array('url' => 'roles/destroy/' . $role->id, 'class' => 'pull-right')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger', 'onclick' => "if(!confirm('Are you sure to delete this item?')){return false;};")) }}
						{{ Form::close() }}
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
