@section('content')
<h1 class="page-header">{{ $project->project_name }}</h1>

<div class="row">
	<div class="col-md-3">
		@include('projects.partials.details')
	</div>

	<div class="col-md-5">
		<div class="form-group">
			<span>{{ nl2br($project->project_details) }}</span>
			<a class="pull-right" href="#" data-toggle="modal" data-target="#edit-class">Edit</a>
		</div>
		@include('projects.partials.history')
	</div>

	<div class="col-md-4">
		


		@foreach($c_groups as $c_group)
		<div class="sidebar-contacts sidebar-section">
			<header class="sidebar-heading">
				<!-- <input class="form-control typeahead" type="text" placeholder="Add Contact"> -->
				<h6>{{ strtoupper( $c_group->contractor_group )}}</h6>
				<a class="add-contact-sidebar" href="#" data-placement="left" data-toggle="modal" data-target="#add-{{ $c_group->id }} ">
					<span class="glyphicon glyphicon-plus"></span>
				</a>
				<!-- Modal -->
				<div class="modal fade" id="add-{{ $c_group->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				 	<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Add Contact to {{ ucwords(strtolower( $c_group->contractor_group )) }}</h4>
							</div>
							<div class="modal-body">
								<form role="form" class="contact-phone" name="phone">
								  	<div class="form-group">
								  		{{ Form::label('project_name', 'Contact') }}
								  		{{ Form::text('project_name', '', array('class' => 'form-control typeahead', 'placeholder' => 'Contact')) }}  		
								    </div>
								    <div class="form-group">
								  		{{ Form::label('project_address', 'Role') }}
								  		{{ Form::text('project_address', '', array('class' => 'form-control', 'placeholder' => 'Role')) }}  		
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
			</header>
			
			<ul class="sidebar-box-list contact-list">
				<?php $with_contact = false;?>
			@foreach($project_contacts as $project_contact)

				@if($project_contact->pivot->contractor_group_id == $c_group->id)
				<?php $with_contact = true;?>
				<li>
					<div class="check-input">
						<span class="glyphicon glyphicon-user"></span>
					</div>
					<div>
						<p>
							<a class="sidebar-title-link sidebar-contact-name" href="#">
								<strong>{{ ucwords(strtolower($project_contact->first_name.' '.$project_contact->middle_name.' '.$project_contact->last_name)) }}</strong>
							</a>
						</p>
						<p>
							<span class="sidebar-contact-address"></span>
							<!-- <br>
							<span class="sidebar-contact-address">Chicago</span>,
							<span class="sidebar-contact-address">IL</span> -->
						</p>
						
						@foreach($project_contact->phones as $phone)
						<p>
							<span class="sidebar-contact-phone">
								<span>
								<a class="call-btn contact-btn btn-mini" href="callto:+18009409650">
								<span class="glyphicon glyphicon-earphone"></span>
								+ {{ $phone->phone }}
								</a>
								</span>
							</span>
							<small>{{ $phone->phone_type->phone_type }}</small>
							<br>
						</p>
						@endforeach
						<br>
						@foreach($project_contact->emails as $email)
						<p>
							<span class="sidebar-contact-email">
								<span>
								<a class="call-btn contact-btn btn-mini" href="mailto:{{ $email->email }}">
									<span class="glyphicon glyphicon-envelope"></span>
									{{ $email->email }}
								</a>
								</span>
							</span>
							<br>
						</p>
						@endforeach
					</div>
				</li>
				@endif
			@endforeach
			</ul>
			@if(!$with_contact)
			<div class="emptyRepository">
				<div class="empty-info">
					<div class="empty-text">No {{ ucwords(strtolower($c_group->contractor_group)) }}</div>
				</div>
			</div>
			@endif
		</div>
		@endforeach
		
	</div>
</div>
@stop