@section('content')
<h1 class="page-header">Update Permissions of Role '{{ $role->name }}'</h1>

@include('shared.notification')

<div class="widget widget-table action-table">

	<!-- /widget-header{{ Form::open(array('url' => 'projects/store', 'class' => 'form-horizontal', 'role' => 'form')) }} -->
	{{ Form::open(array('action' => array('RolesController@putPermission',$role->id) ,'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Permission Name</th>
					<th>Permission</th>
					<th class="text-center">Allow</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($permissions as $permission)
			  	<tr>
					<td>
						{{ $permission->display_name}}
					</td>
					<td>
						{{ $permission->name }}
					</td>
					<td class="text-center">
						{{ Form::checkbox('permission_id[]', $permission->id, (in_array($permission->id, $selected) ? 1 : 0 )) }}
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<div >
		{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
		{{ HTML::link('roles', 'Back', array('class' => 'btn btn-default')) }}
	</div>
	
	{{ Form::close() }}
	<!-- /widget-content --> 
</div>
@stop
