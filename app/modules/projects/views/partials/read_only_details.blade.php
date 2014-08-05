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