@section('content')
<h1 class="page-header">{{ $project->project_name }}</h1>

<div class="row">
	<div class="col-md-3">
		@include('projects.partials.details')
	</div>

	<div class="col-md-5">
		@include('projects.partials.history')
	</div>

	<div class="col-md-4">
		@foreach($c_groups as $c_group)
		<div class="sidebar-contacts sidebar-section">
			<header class="sidebar-heading">
				<!-- <input class="form-control typeahead" type="text" placeholder="Add Contact"> -->
				<h6>{{ strtoupper( $c_group->contractor_group )}}</h6>
				<a id="popover" class="add-contact-sidebar" href="#" data-placement="left">
					<span class="glyphicon glyphicon-plus"></span>
				</a>
				<div id="popover-content" class="hide">
				  <form>
				    <!-- my form -->
				    <input class="form-control typeahead" type="text" placeholder="Add Contact">
				  </form>
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