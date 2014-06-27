@section('content')
<h1>{{ $project->project_name }}</h1>
<div class="row">
	<div class="col-md-3">

		<h2>Heading</h2>
		<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
		<p>
			<a class="btn btn-default" role="button" href="#">View details »</a>
		</p>
	</div>

	<div class="col-md-5">
		<h2>Heading</h2>
		<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
		<p>
			<a class="btn btn-default" role="button" href="#">View details »</a>
		</p>
	</div>

	<div class="col-md-4">

		@foreach($project_contacts as $c_group)
		<div class="sidebar-contacts sidebar-section">
			<header class="sidebar-heading">
				<!-- <input class="form-control typeahead" type="text" placeholder="Add Contact"> -->
				<h6>{{ strtoupper( $c_group->group )}}</h6>
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
			@if( count($c_group->contacts_list->contacts) > 0)
			<ul class="sidebar-box-list contact-list">
				@foreach($c_group->contacts_list->contacts as $contacts)
				<li>
				</pre>
					<div class="check-input">
						<span class="glyphicon glyphicon-user"></span>
					</div>
					<div>
						<p>
							<a class="sidebar-title-link sidebar-contact-name" href="#">
								<strong>{{ ucwords(strtolower($contacts->first_name)) .' '. ucwords(strtolower($contacts->middle_name)) . ' ' .ucwords(strtolower($contacts->last_name))}}</strong>
							</a>
						</p>
						<p>
							<span class="sidebar-contact-address">{{ $contacts->address }}</span>
							<!-- <br>
							<span class="sidebar-contact-address">Chicago</span>,
							<span class="sidebar-contact-address">IL</span> -->
						</p>
						@foreach($contacts->c_list->phones as $phone)
						
						<p>
							
							<span class="sidebar-contact-phone">
								<span>
								<a class="call-btn contact-btn btn-mini" href="callto:+18009409650">
								<span class="glyphicon glyphicon-earphone"></span>
								{{ $phone->phone }}
								</a>
								</span>
							</span>
							<small>{{ $phone->phone_type->phone_type }}</small>
							<br>
						</p>
						@endforeach
						<br>
						@foreach($contacts->c_list->emails as $email)
						
						<p>
							
							<span class="sidebar-contact-phone">
								<span>
								<a class="call-btn contact-btn btn-mini" href="callto:+18009409650">
								<span class="glyphicon glyphicon-earphone"></span>
								{{ $email->email }}
								</a>
								</span>
							</span>
							<br>
						</p>
						@endforeach
					</div>
				</li>
				@endforeach
			</ul>
			@else
			<div class="emptyRepository">
				<div class="empty-info">
					<div class="empty-text">No Developer</div>
				</div>
			</div>
			@endif
		</div>
		@endforeach
		
	</div>
</div>
@stop