<h3>{{ $project->project_name }}</h3>
<address>
  	{{ $project->project_address }}
  	<a class="pull-right" href="#" data-toggle="modal" data-target="#edit-main">Edit</a>
</address>

<div class="form-group">
	<label>{{ $project->area->area }}</label>
	<span class="info-label">Area</span>
	<a class="pull-right" href="#" data-toggle="modal" data-target="#edit-category">Edit</a>
</div>

<div class="form-group">
	<label>{{ $project->region->region }}</label>
	<span class="info-label">Region</span>
</div>

<div class="form-group">
	<label>{{ $project->project_classification->project_classification }}</label>
	<span class="info-label">Project Classification</span>
	<a class="pull-right" href="#" data-toggle="modal" data-target="#edit-class">Edit</a>
</div>

<div class="form-group">
	<label>{{ $project->project_category->project_category }}</label>
	<span class="info-label">Project Category</span>
	<a class="pull-right" href="#" data-toggle="modal" data-target="#edit-category">Edit</a>
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
	<a class="pull-right" href="#" data-toggle="modal" data-target="#edit-stage">Edit</a>
</div>

<div class="form-group">
	<label>{{ $project->project_status->project_status }}</label>
	<span class="info-label">Project Status</span>
	<a class="pull-right" href="#" data-toggle="modal" data-target="#edit-status">Edit</a>
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


<!-- Modal -->
<div class="modal fade" id="edit-main" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit Project</h4>
			</div>
			<div class="modal-body">
				<form role="form" class="contact-phone" name="phone">
				  	<div class="form-group">
				  		{{ Form::label('project_name', 'Project Name') }}
				  		{{ Form::text('project_name', '', array('class' => 'form-control', 'placeholder' => 'Project Name')) }}  		
				    </div>
				    <div class="form-group">
				  		{{ Form::label('project_address', 'Project Address') }}
				  		{{ Form::text('project_address', '', array('class' => 'form-control', 'placeholder' => 'Project Address')) }}  		
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

<!-- Modal -->
<div class="modal fade" id="edit-class" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit Project</h4>
			</div>
			<div class="modal-body">
				<form role="form" class="contact-phone" name="phone">
				    <div class="form-group">
				    	{{ Form::label('project_classification_id', 'Project Classification') }}
				  		{{ Form::select('project_classification_id', $project_classifications,0, array('class' => 'form-control')) }}
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


<!-- Modal -->
<div class="modal fade" id="edit-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit Project</h4>
			</div>
			<div class="modal-body">
				<form role="form" class="contact-phone" name="phone">

				    <div class="form-group">
				    	{{ Form::label('project_category_id', 'Project Category') }}
				  		{{ Form::select('project_category_id', $project_categories,0, array('class' => 'form-control')) }}
				    </div>
				     <div class="form-group">
				    	{{ Form::label('project_sub_category_id', 'Sub Category') }}
				  		<select class="form-control" id="project_sub_category_id" name="project_sub_category_id">
							<option value="0">SELECT SUB CATEGORY</option>
						</select>
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

<!-- Modal -->
<div class="modal fade" id="edit-stage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit Project</h4>
			</div>
			<div class="modal-body">
				<form role="form" class="contact-phone" name="phone">
				    <div class="form-group">
				    	{{ Form::label('project_stage_id', 'Project Stage') }}
				  		{{ Form::select('project_stage_id', $project_stages,0, array('class' => 'form-control')) }}
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

<!-- Modal -->
<div class="modal fade" id="edit-status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit Project</h4>
			</div>
			<div class="modal-body">
				<form role="form" class="contact-phone" name="phone">
				  	
				    <div class="form-group">
				    	{{ Form::label('project_status_id', 'Project Status') }}
				  		{{ Form::select('project_status_id', $project_statuses,0, array('class' => 'form-control')) }}
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