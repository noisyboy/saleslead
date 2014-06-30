<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectDetailsOnProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects', function($t){
			$t->integer('project_classification_id')->unsigned()->after('area_id');
			$t->foreign('project_classification_id')
				->references('id')->on('project_classifications');
			$t->integer('project_category_id')->unsigned()->after('project_classification_id');
			$t->foreign('project_category_id')
				->references('id')->on('project_categories');
			$t->integer('project_sub_category_id')->after('project_category_id');
			$t->integer('project_stage_id')->unsigned()->after('project_sub_category_id');
			$t->foreign('project_stage_id')
				->references('id')->on('project_stages');
			$t->text('project_details')->after('project_stage_id');
			$t->integer('project_status_id')->unsigned()->after('project_details');
			$t->foreign('project_status_id')
				->references('id')->on('project_statuses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('projects', function($t){
			$t->dropForeign('projects_project_classification_id_foreign');
			$t->dropForeign('projects_project_category_id_foreign');
			$t->dropForeign('projects_project_stage_id_foreign');
			$t->dropForeign('projects_project_status_id_foreign');
			$t->dropColumn(array('project_classification_id','project_category_id','project_sub_category_id',
				'project_stage_id','project_status_id','project_details'));
		});
	}

}
