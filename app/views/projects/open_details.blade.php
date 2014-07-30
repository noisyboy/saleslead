@section('content')
<h1 class="page-header">{{ $project->project_name }}</h1>

<div class="row">
	<div class="col-md-3">
		<address>
		  	{{ $project->project_address }}
		 </address>

		<div class="form-group">
			<label>{{ $project->area->area }}</label>
			<span class="info-label">Area</span>
		</div>

		<div class="form-group">
			<label>{{ $project->region->region }}</label>
			<span class="info-label">Region</span>
		</div>

		<div class="form-group">
			<label>{{ $project->project_classification->project_classification }}</label>
			<span class="info-label">Project Classification</span>
		</div>

		<div class="form-group">
			<label>{{ $project->project_category->project_category }}</label>
			<span class="info-label">Project Category</span>
		</div>

		@if($project->project_sub_category_id > 0)
		<div class="form-group">
			<label>{{ $project->project_sub_category->project_sub_category }}</label>
			<span class="info-label">Project Sub Category</span>
		</div>
		@endif
		<div class="form-group">
			<label>{{ $project->project_stage->project_stage }}</label>
			<span class="info-label">Project Stage</span>
		</div>

		<div class="form-group">
			<label>{{ $project->project_status->project_status }}</label>
			<span class="info-label">Project Status</span>
		</div>

		<div class="form-group">
			<label>{{ date("d/m/Y",strtotime($project->created_at)) }}</label>
			<span class="info-label">Added on</span>
		</div>

		<div class="form-group">
			<label>{{ date("d/m/Y",strtotime($project->updated_at)) }}</label>
			<span class="info-label">Last update</span>
		</div>

		<div class="form-group">
			<label>Rencie Bautista</label>
			<span class="info-label">BDO</span>
		</div>
	</div>

	<div class="col-md-4">
		@foreach($c_groups as $c_group)
		<div class="sidebar-contacts sidebar-section">
			<header class="sidebar-heading">
				<!-- <input class="form-control typeahead" type="text" placeholder="Add Contact"> -->
				<h6>{{ strtoupper( $c_group->contractor_group )}}</h6>
				<a id="{{  $c_group->id }} " class="add-contact-sidebar" href="#" >
					<span class="glyphicon glyphicon-plus"></span>
				</a>
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
						{{ Form::hidden('group_id', '0', array('id' => 'group_id')) }}
					  	<div class="form-group">
					  		{{ Form::label('contact', 'Contact') }}
					  		{{ Form::text('contact', '', array('class' => 'form-control typeahead', 'placeholder' => 'Contact')) }}  		
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