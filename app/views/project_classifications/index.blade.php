@section('content')
<h1 class="page-header">Project Classification</h1>

<div class="page-header-button">
	{{ HTML::linkRoute('projectclassifications.create', 'New Project Classification', array(), array('class' => 'btn btn-primary')) }}
</div>
<div class="widget widget-table action-table">

	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Project Classification</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($p_classifications as $p_classification)
			  	<tr>
					<td>
						{{ HTML::linkRoute('projectclassifications.show', $p_classification->project_classification, $p_classification->id ) }}
					</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
