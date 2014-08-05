@section('content')
<h1 class="page-header">{{ $project->project_name }}</h1>

@include('shared.notification')

<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			{{ HTML::link('projects/assigned/', 'Back', array('class' => 'btn btn-default')) }}
		</div>
		@include('projects.partials.read_only_details')
	</div>

	<div class="col-md-9">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li class="active"><a href="#details" role="tab" data-toggle="tab">Details</a></li>
			<li><a href="#specifications" role="tab" data-toggle="tab">Painting Specification</a></li>
			<li><a href="#files" role="tab" data-toggle="tab">Photo Files</a></li>
			<li><a href="#contacts" role="tab" data-toggle="tab">Contacts</a></li>
		</ul>
		<!-- End Nav tabs -->

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane tabbed-action-content active" id="details">
				<div class="row" style="padding:10px;">
					<div class="col-md-12">
						<p>
						Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
						weebly ning heekya handango imeem plugg dopplr jibjab, movity
						jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
						quora plaxo ideeli hulu weebly balihoo...
						</p>
					</div>
				</div>
			</div>

			<div class="tab-pane tabbed-action-content" id="specifications">
				<div class="col-md-12">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Category</th>
								<th>Specification</th>
								<th>Area(Sq m)</th>
								<th>Paint Requirement(ltrs.)</th>
								<th>Painting Cost(PHP)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Exterior</td>
								<td>Otto</td>
								<td>@mdo</td>
								<td>Otto</td>
								<td>@mdo</td>
							</tr>
							<tr>
								<td>Interior</td>
								<td>Thornton</td>
								<td>@fat</td>
								<td>Otto</td>
								<td>@mdo</td>
							</tr>
							<tr>
								<td>Others</td>
								<td>Thornton</td>
								<td>@fat</td>
								<td>Otto</td>
								<td>@mdo</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="tab-pane tabbed-action-content active" id="files">
				<div class="row" style="padding:10px;">
					<div class="col-md-12">
						<!-- The time line -->
						<ul class="timeline">
							<!-- timeline time label -->
							<li class="time-label">
								<span class="bg-green">
									3 Jan. 2014
								</span>
							</li>
							<!-- /.timeline-label -->
							<!-- timeline item -->
							<li>
								<i class="fa fa-camera bg-purple"></i>
								<div class="timeline-item">
									<span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
									<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
									<div class="timeline-body">
										<img src="http://placehold.it/150x100" alt="..." class='margin' />
										<img src="http://placehold.it/150x100" alt="..." class='margin'/>
										<img src="http://placehold.it/150x100" alt="..." class='margin'/>
										<img src="http://placehold.it/150x100" alt="..." class='margin'/>
									</div>
								</div>
							</li>
							<!-- END timeline item -->
							<!-- timeline time label -->
							<li class="time-label">
								<span class="bg-green">
									3 Jan. 2014
								</span>
							</li>
							<!-- /.timeline-label -->
							<!-- timeline item -->
							<li>
								<i class="fa fa-camera bg-purple"></i>
								<div class="timeline-item">
									<span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
									<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
									<div class="timeline-body">
										<img src="http://placehold.it/150x100" alt="..." class='margin' />
										<img src="http://placehold.it/150x100" alt="..." class='margin'/>
										<img src="http://placehold.it/150x100" alt="..." class='margin'/>
										<img src="http://placehold.it/150x100" alt="..." class='margin'/>
									</div>
								</div>
							</li>
							<!-- END timeline item -->
							<li>
								<i class="fa fa-clock-o"></i>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="tab-pane tabbed-action-content" id="contacts">
				<div class="row" style="padding:10px;">
					<div class="col-md-12">
						@foreach($c_groups as $c_group)
						<div class="sidebar-contacts sidebar-section">
							<header class="sidebar-heading">
								<h6>{{ ucwords(strtolower($c_group->contractor_group))}}</h6>
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

											<a class="sidebar-title-link sidebar-contact-name {{ ($project_contact->pivot->status_id == 1) ? 'for-approval' : '' }}" href="{{ action('ProjectContactsController@getShow',$project_contact->pivot->id) }}">
												<strong>{{ ucwords(strtolower($project_contact->getFullName())) }}</strong>
											</a>
										</p>
										<p>
											<span class="sidebar-contact-company">{{ $project_contact->company_name }}</span>
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
				</div>
			</div>

			<div class="tab-pane tabbed-action-content" id="taggedcontacts">
				<div class="row" style="padding:10px;">
					<div class="col-md-12">
						<div class="sidebar-contacts sidebar-section">
							<header class="sidebar-heading">
								<h6>Tagged Contacts</h6>
							</header>
							<?php $new_contact = false;?>
							@foreach($project->contacts as $contact)
								@if($contact->pivot->status_id == 1)
								<?php $new_contact = true;?>
								@endif
							@endforeach
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
							@if(!$new_contact)
							<div class="emptyRepository">
								<div class="empty-info">
									<div class="empty-text">No Tagged Contacts</div>
								</div>
							</div>
							@endif
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane tabbed-action-content" id="calendar">
				<div class="row" style="padding:10px;">
					<div class="col-md-12">
						<div id="calendar"></div>
					</div>
				</div>
			</div>

			<div class="tab-pane tabbed-action-content" id="note">
				<form role="form">
					<div class="form-container">
						<div class="form-group">
							{{ Form::textarea('note', '', array('class' => 'form-control', 'placeholder' => 'Notes')) }}
						</div>
						<div class="form-group">
							{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- End Tab panes -->
	</div>

</div>
@stop