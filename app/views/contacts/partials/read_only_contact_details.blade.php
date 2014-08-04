
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