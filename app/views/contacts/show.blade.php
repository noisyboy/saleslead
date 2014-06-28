@section('content')
<h1 class="page-header">{{ $contact->company_name }}</h1>

<div class="form-group">
	<button class="btn btn-primary" data-toggle="modal" data-target="#phone-modal">
		New Phone
	</button>
	<button class="btn btn-primary" data-toggle="modal" data-target="#email-modal">
		New Email
	</button>
	{{ HTML::linkRoute('contacts.index', 'Back', array(), array('class' => 'btn btn-default')) }}
</div>

<!-- Modal -->
<div class="modal fade" id="phone-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">New Phone</h4>
			</div>
			<div class="modal-body">
				<form role="form" class="contact-phone" name="phone">
					{{ Form::hidden('contact_id', $contact->id) }}
				  	<div class="form-group">
				  		{{ Form::label('phone_type_id', 'Phone Type') }}
				    	{{ Form::select('phone_type_id', $phonetypes,'', array('class' => 'form-control')) }}
				  	</div>
				  	<div class="form-group">
				  		{{ Form::label('phone', 'Phone') }}
				    	{{ Form::text('phone', '', array('class' => 'form-control', 'placeholder' => 'Phone')) }}
				  	</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input class="btn btn-primary" type="submit" value="Submit" id="submit">
			</div>
		</div>
  	</div>
</div>

<div class="modal fade" id="email-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">New Email</h4>
			</div>
			<div class="modal-body">
				<form role="form" class="contact-email" name="email">
					{{ Form::hidden('contact_id', $contact->id) }}
				  	<div class="form-group">
				  		{{ Form::label('email', 'Email') }}
				    	{{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email')) }}
				  	</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input class="btn btn-primary" type="submit" value="Submit" id="submit">
			</div>
		</div>
  	</div>
</div>

<div>
	<address>
		<strong>{{ $contact->company_name }}</strong><br>
		{{ $contact->address }}<br>
	</address>

	<address>
		<strong>{{ $contact->first_name }} {{ $contact->middle_name }} {{ $contact->last_name }}</strong><br>
		{{ $contact->title }}<br>
	</address>

	<address>
		@foreach($contact->phones as $phone)
		<abbr title="{{ $phone->phone_type->phone_type}}">{{ $phone->phone_type->phone_type}} :</abbr> {{ $phone->phone }}<br>
		@endforeach
	</address>

	<address>
		@foreach($contact->emails as $email)
		<a href="mailto:#">{{ $email->email }}</a><br>
		@endforeach
	</address>
</div>

@stop