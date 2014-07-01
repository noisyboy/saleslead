<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
   <li class="active"><a href="#specs" role="tab" data-toggle="tab">Specifications</a></li>
  <li><a href="#files" role="tab" data-toggle="tab">Files</a></li>
  <li><a href="#note" role="tab" data-toggle="tab">Add a Note</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane tabbed-action-content active" id="specs">...</div>
  <div class="tab-pane tabbed-action-content" id="files">...</div>
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
						
						<li><a href="#">asdasd</a></li>

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