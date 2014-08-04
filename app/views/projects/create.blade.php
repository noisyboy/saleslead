@section('content')
<h1 class="page-header">New Project</h1>

<div class="col-sm-6">

	{{ Form::open(array('url' => 'projects/store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('project_name', 'Project Name') }}
		{{ Form::errorMsg('project_name', $errors) }}
		{{ Form::text('project_name', '', array('class' => 'form-control', 'placeholder' => 'Project Name')) }}
	</div>

	<div class="form-group">
			<label>Location / Address</label>
	</div>

	<div class="form-group">
		<div class="col-sm-6">
			{{ Form::label('number', 'Lot / Blk / House No. / Unit No.') }}
			{{ Form::text('number', '', array('class' => 'form-control', 'placeholder' => 'Lot / Blk / House No. / Unit No.')) }}
		</div>
		<div class="col-sm-6">
			{{ Form::label('street1', 'Street') }}
			{{ Form::text('street1', '', array('class' => 'form-control', 'placeholder' => 'Street')) }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-6">
			{{ Form::label('street2', 'Brgy. / Subdivision') }}
			{{ Form::text('street2', '', array('class' => 'form-control', 'placeholder' => 'Brgy. / Subdivision')) }}
		</div>

		<div class="col-sm-6">
			{{ Form::label('city', 'Town / City') }}
			{{ Form::text('city', '', array('class' => 'form-control', 'placeholder' => 'Town / City')) }}
		</div>
	
	</div>
	<div class="form-group">
		<div class="col-sm-6">
			{{ Form::label('province', 'Province') }}
			{{ Form::text('province', '', array('class' => 'form-control', 'placeholder' => 'Province')) }}
		</div>
	</div>

	<div id="area-select" class="form-group">
		{{ Form::label('area_id', 'Area') }}
		{{ Form::errorMsg('area_id', $errors) }}
		{{ Form::select('area_id', $areas,0, array('class' => 'form-control')) }}
	</div>
	<div id="region-select" class="form-group">
		{{ Form::label('region_id', 'Region') }}
		{{ Form::errorMsg('region_id', $errors) }}
		<select class="form-control" id="region_id" name="region_id">
			<option value="0">SELECT REGION</option>
		</select>
	</div>

	<div class="form-group">
		{{ Form::label('projectowner_id', 'Project Owner') }}
		{{ Form::errorMsg('projectowner_id', $errors) }}
		{{ Form::text('projectowner_id', '', array('class' => 'form-control', 'placeholder' => 'Project Owner','id' => 'select-contact')) }}  		
	</div>

	<div id="area-select" class="form-group">
		{{ Form::label('project_classification_id', 'Project Classification') }}
		{{ Form::errorMsg('project_classification_id', $errors) }}
		{{ Form::select('project_classification_id', $project_classifications,0, array('class' => 'form-control')) }}
	</div>

	<div id="category-select" class="form-group">
		{{ Form::label('project_category_id', 'Project Category') }}
		{{ Form::errorMsg('project_category_id', $errors) }}
		{{ Form::select('project_category_id', $project_categories,0, array('class' => 'form-control')) }}
	</div>
	<div id="subcategory-select" class="form-group">
		{{ Form::label('project_sub_category_id', 'Sub Category') }}
		<select class="form-control" id="project_sub_category_id" name="project_sub_category_id">
			<option value="0">SELECT SUB CATEGORY</option>
		</select>
	</div>

	<div id="area-select" class="form-group">
		{{ Form::label('project_stage_id', 'Project Stage') }}
		{{ Form::errorMsg('project_stage_id', $errors) }}
		{{ Form::select('project_stage_id', $project_stages,0, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('project_details', 'Project Details') }}
		{{ Form::textarea('project_details', '', array('class' => 'form-control', 'placeholder' => 'Project Details')) }}
	</div>

	<div id="area-select" class="form-group">
		{{ Form::label('project_status_id', 'Project Status') }}
		{{ Form::errorMsg('project_status_id', $errors) }}
		{{ Form::select('project_status_id', $project_statuses,0, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('estimated', 'Project Estimated Amount') }}
		{{ Form::errorMsg('estimated', $errors) }}
		{{ Form::text('estimated', '', array('class' => 'form-control', 'placeholder' => 'Project Estimated Amount')) }}
	</div>

	<div class="form-group">
		{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
	</div>


	{{ Form::close() }}
</div>
@stop