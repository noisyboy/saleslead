@section('content')
<h1 class="page-header">My Contacts</h1>

<div class="page-header-button">
	{{ HTML::linkRoute('contacts.create', 'New Contact', array(), array('class' => 'btn btn-primary')) }}
</div>

<div class="widget widget-table action-table">
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
