@section('content')
<h1 class="page-header">My Contacts</h1>

<div class="page-header-button">
	{{ HTML::link('contacts/create', 'New Contact', array('class' => 'btn btn-primary')) }}
</div>

<div class="widget widget-table action-table">
	<!-- /widget-header -->
	<div class="widget-content">
	  	<table class="table table-striped table-bordered">
			<thead>
			  	<tr>
					<th>Contact Person</th>
					<th>Title</th>
					<th>Company Name</th>
			  	</tr>
			</thead>
			<tbody>
				@foreach($contacts as $contact)

			  	<tr>
					<td>
						{{ HTML::linkAction('contacts.show', $contact->getFullName(), $contact->id ) }}
					</td>
					<td>{{ $contact->title }}</td>
					<td>{{ $contact->company_name }}</td>
			  	</tr>
			  	@endforeach
			</tbody>
	  	</table>
	</div>
	<!-- /widget-content --> 
</div>
@stop
