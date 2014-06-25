@section('content')

{{ HTML::linkRoute('contacts.create', 'New Contact', array(), array('class' => 'btn btn-primary')) }}

<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
	  	<h3>A Table Example</h3>
	</div>
	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Contact Person</th>
					<th>Company Name</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($contacts as $contact)
			  	<tr>
					<td>
						{{ HTML::linkRoute('contacts.show', $contact->first_name .' '. $contact->middle_name .' '. $contact->last_name, $contact->id ) }}
					</td>
					<td>{{ $contact->company_name }}</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
