@section('content')
<h1 class="page-header">Project Categories</h1>

<div class="page-header-button">
	{{ HTML::linkRoute('projectcategories.create', 'New Project Category', array(), array('class' => 'btn btn-primary')) }}
</div>

<div class="widget widget-table action-table">
	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Project Categories</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($project_categories as $project_category)
			  	<tr>
					<td>
						{{ HTML::linkRoute('projectcategories.show', $project_category->project_category, $project_category->id ) }}
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
