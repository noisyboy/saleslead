<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#note" role="tab" data-toggle="tab">Add a Note</a></li>
  <li><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
  <li><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
  <li><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active tabbed-action-content" id="note">
  	<form role="form">
  		<div class="form-container">
	  		<div class="form-group">
	    		{{ Form::textarea('project_details', '', array('class' => 'form-control', 'placeholder' => 'Project Details')) }}
	 		</div>
	 		<div class="form-group">
	    		{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
	 		</div>
	  		
	  </div>
	</form>

  </div>
  <div class="tab-pane" id="profile">...</div>
  <div class="tab-pane" id="messages">...</div>
  <div class="tab-pane" id="settings">...</div>
</div>

<div class="history-list">
	<div class="list-container">
		<div class="list-head clearfix">
			<div class="feed-navigation pull-left">
				Displaying 
				<span class="dropdown filter-type">
					<a class="dropdown-toggle" data-toggle="dropdown" href="">
					<span>all activity</span>
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						@foreach($categories  as $category)
						<li><a href="#">{{ $category->project_category }}</a></li>
						@endforeach
					</ul>
				</span>
			</div>
		</div>

		<ul class="history-items">
			<li class="item activity">
				<div class="item-heading ">
					<p class="timestamp">27/06/2014 13:21</p>
					<p class="info-label">
					Rencie Bautista scheduled an appointment:
					<a class="show-appointment" href="#">sample</a>
					<br>
					for 27/06/2014 14:00
					</p>
				</div>
			</li>
			<li class="item activity">
				<div class="item-heading ">
					<p class="timestamp">27/06/2014 13:21</p>
					<p class="info-label">
					Rencie Bautista scheduled an appointment:
					<a class="show-appointment" href="#">sample</a>
					<br>
					for 27/06/2014 14:00
					</p>
				</div>
			</li>
		</ul>
	</div>
</div>