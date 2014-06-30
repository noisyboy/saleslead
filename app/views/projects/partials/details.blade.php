<h3>{{ $project->project_name }}</h3>
<address>
  	{{ $project->project_address }}
</address>

<div class="form-group dropdown ">
	<a class="dropdown-toggle sub-details" data-toggle="dropdown" href="">
		{{ $project->project_classification->project_classification }}
		<span class="caret"></span>
		<span class="info-label">Project Classification</span>
	</a>
	<ul class="dropdown-menu sub-details">
		@foreach($classificatons  as $classificaton)
		<li><a href="#">{{ $classificaton->project_classification }}</a></li>
		@endforeach
	</ul>
</div>

<div class="form-group dropdown">
	<a class="dropdown-toggle sub-details" data-toggle="dropdown" href="">
		{{ $project->project_category->project_category }}
		<span class="caret"></span>
		<span class="info-label">Project Category</span>
	</a>
	<ul class="dropdown-menu sub-details">
		@foreach($categories  as $category)
		<li><a href="#">{{ $category->project_category }}</a></li>
		@endforeach
	</ul>
</div>

<div class="form-group dropdown">
	<a class="dropdown-toggle sub-details" data-toggle="dropdown" href="">
		{{ $project->project_classification->project_classification }}
		<span class="caret"></span>
		<span class="info-label">Project Sub Category</span>
	</a>
	<ul class="dropdown-menu sub-details">
		<li><a href="#">Action</a></li>
	</ul>
</div>

<div class="form-group dropdown">
	<a class="dropdown-toggle sub-details" data-toggle="dropdown" href="">
		{{ $project->project_stage->project_stage }}
		<span class="caret"></span>
		<span class="info-label">Project Stage</span>
	</a>
	<ul class="dropdown-menu sub-details">
		<li><a href="#">Action</a></li>
	</ul>
</div>

<div class="form-group dropdown">
	<a class="dropdown-toggle sub-details" data-toggle="dropdown" href="">
		{{ $project->project_status->project_status }}
		<span class="caret"></span>
		<span class="info-label">Project Status</span>
	</a>
	<ul class="dropdown-menu sub-details">
		<li><a href="#">Action</a></li>
	</ul>
</div>

<div class="form-group dropdown">
	<label>{{ date("d/m/Y",strtotime($project->updated_at)) }}</label>
	<span class="info-label">Last update</span>
</div>

<div class="form-group dropdown">
	<label>Rencie Bautista</label>
	<span class="info-label">BDO</span>
</div>