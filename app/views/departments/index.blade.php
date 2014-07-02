@section('content')
<h1 class="page-header">Departments</h1>

<div class="page-header-button">
	{{ HTML::linkRoute('departments.create', 'New Department', array(), array('class' => 'btn btn-primary')) }}
</div>

<div class="widget widget-table action-table">
	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Department</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($departments as $department)
			  	<tr>
					<td>
						{{ HTML::linkRoute('departments.show', $department->department, $department->id ) }}
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
