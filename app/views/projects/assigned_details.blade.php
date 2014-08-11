@section('content')
<h1 class="page-header">{{ $project->project_name }}</h1>

@include('shared.notification')

<div class="row">
	<div class="col-md-12">
		<div class="project">
			<ul>
				<li>
					<div class="info">{{ $project->project_name }}</div>
					<span class="info-label">Project Name / Location / Address</span>
				</li>
				<li>
					<div class="info">Sample Project</div>
					<span class="info-label">Project Owner / Address</span>
				</li>
				<li>
					<div class="info">{{ $project->projectClassification->project_classification }}</div>
					<span class="info-label">Project Classification</span>
				</li>
				<li>
					<div class="info">Sample Project</div>
					<span class="info-label">Project Category</span>
				</li>
				<li>
					<div class="info">Sample Project</div>
					<span class="info-label">Project Stage</span>
				</li>
				<li>
					<div class="info">Sample Project</div>
					<span class="info-label">Project Status</span>
				</li>
				<li>
					<div class="info">Sample Project</div>
					<span class="info-label">Project Details</span>
				</li>
			</ul>
		</div>
	</div>
</div>
@stop