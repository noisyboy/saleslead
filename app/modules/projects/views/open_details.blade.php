@section('content')
<h1 class="page-header">{{ $project->project_name }}</h1>

<div class="row">
	<div class="col-md-3">
	@include('projects.partials.read_only_details')
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
			@foreach($project->contacts as $project_contact)

				@if($project_contact->pivot->contractor_group_id == $c_group->id)
				<?php $with_contact = true;?>
				<li>
					<div class="check-input">
						<span class="glyphicon glyphicon-user"></span>
					</div>
					<div>
						
						<p>
							<a class="sidebar-title-link sidebar-contact-name {{($project_contact->pivot->status_id == 1)?'for-approval':''}}" href="#">
								<strong>{{ ucwords(strtolower($project_contact->first_name.' '.$project_contact->middle_name.' '.$project_contact->last_name)) }}</strong>
							</a>
						</p>
						<p>
							<span class="sidebar-contact-company">{{ $project_contact->company_name }}</span>
							<!-- <br>
							<span class="sidebar-contact-address">Chicago</span>,
							<span class="sidebar-contact-address">IL</span> -->
						</p>
						
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