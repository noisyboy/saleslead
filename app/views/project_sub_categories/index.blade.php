@section('content')
<h1 class="page-header">Project Sub Categories</h1>

<div class="page-header-button">
	{{ HTML::linkRoute('projectsubcategories.create', 'New Project Sub Category', array(), array('class' => 'btn btn-primary')) }}
</div>

<div class="widget widget-table action-table">

	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Project Sub Categories</th>
					<th>Project Categories</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($p_sub_categories as $p_sub_category)
			  	<tr>
					<td>
						{{ HTML::linkRoute('projectsubcategories.show', $p_sub_category->project_sub_category, $p_sub_category->id ) }}
					</td>
					<td>
						{{ $p_sub_category->project_category->project_category }}
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
