@section('content')
<h1 class="page-header">{{ $project->project_name }}</h1>

@include('shared.notification')

<div class="row">
	<div class="col-md-3">
		@include('projects.partials.read_only_details')
	</div>

	<div class="col-md-5">
		<div class="form-group">
			<span>{{ nl2br($project->project_details) }}</span>
			<a class="pull-right" href="#" data-toggle="modal" data-target="#edit-class">Edit</a>
		</div>
		@include('projects.partials.history')
	</div>

	<div class="col-md-4">
		<?php $new_contact = false;?>
		@foreach($project->contacts as $contact)
			@if($contact->pivot->status_id == 1)
			<?php $new_contact = true;?>
			@endif
		@endforeach

		@if($new_contact)
		<div class="sidebar-contacts sidebar-section">
			<header class="sidebar-heading">
				<h6>Tagged Contacts</h6>
			</header>
			<ul class="sidebar-box-list">
			@foreach($project->contacts as $contact)
				@if($contact->pivot->status_id == 1)
				<li>
					<div class="contact-group">
						{{ Form::open(array('action' => array('ProjectsController@putTaggedcontact',$contact->pivot->id) ,'method' => 'put')) }}
						{{ Form::hidden('project_id', $project->id) }}
						<div class="contact-detail">
							<p>
								<div class="check-input">
									<span class="glyphicon glyphicon-user"></span>
								</div>
								<strong>{{ ucwords(strtolower($contact->getFullName())) }}</strong>
							</p>
							<p>
								<span class="sidebar-contact-company info-label">{{ $contact->company_name }}</span>
							</p>
							<p class="text-right">
								{{ Form::submit('Confirm', array('class' => 'btn btn-primary btn-xs','name' => 'submit')) }}
								{{ Form::submit('Decline', array('class' => 'btn btn-default btn-xs','name' => 'submit')) }}
							</p
						</div>
						{{ Form::close() }}
					</div>
				</li>
				@endif
			@endforeach
			</ul>
		</div>
		@endif


		@foreach($c_groups as $c_group)
		<div class="sidebar-contacts sidebar-section">
			<header class="sidebar-heading">
				<h6>{{ ucwords(strtolower($c_group->contractor_group))}}</h6>
				<a id="{{  $c_group->id }} " class="add-contact-sidebar" href="#" >
					<span class="glyphicon glyphicon-plus"></span>
				</a>
			</header>
			
			<ul class="sidebar-box-list">
				<?php $with_contact = false;?>
			@foreach($project->contacts as $project_contact)

				@if(($project_contact->pivot->contractor_group_id == $c_group->id) && ($project_contact->pivot->status_id == 2))
				<?php $with_contact = true;?>
				<li>
					
					<div class="contact-detail">
						<p>
							<div class="check-input">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<a class="sidebar-title-link sidebar-contact-name {{ ($project_contact->pivot->status_id == 1) ? 'for-approval' : '' }}" href="#">
								<strong>{{ ucwords(strtolower($project_contact->getFullName())) }}</strong>
							</a>
						</p>
						<p>
							<span class="sidebar-contact-company">{{ $project_contact->company_name }}</span>
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
						<br>
						@endforeach
						
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

	<!-- Modal -->
	<div class="modal fade" id="add-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	 	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body">
					<form role="form" class="project-contact" name="phone">
						{{ Form::hidden('project_id', $project->id ) }}
						{{ Form::hidden('group_id', '0', array('id' => 'group_id')) }}
					  	<div class="form-group">
					  		{{ Form::label('contact_id', 'Contact') }}
					  		{{ Form::text('contact', '', array('class' => 'form-control', 'placeholder' => 'Contact','id' => 'select-contact')) }}  		
					  		
					    </div>
					    <div class="form-group">
					  		{{ Form::label('role', 'Role') }}
					  		{{ Form::text('role', '', array('class' => 'form-control', 'placeholder' => 'Role')) }}  		
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

</div>
@stop