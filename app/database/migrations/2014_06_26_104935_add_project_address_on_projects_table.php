<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectAddressOnProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects', function($t){
			$t->string('project_address')->after('project_name');
			$t->integer('area_id')->unsigned()->after('project_address');
			$t->foreign('area_id')
				->references('id')->on('areas');
			$t->integer('region_id')->unsigned()->after('project_address');
			$t->foreign('region_id')
				->references('id')->on('regions');
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
			$t->dropForeign('projects_area_id_foreign');
			$t->dropForeign('projects_region_id_foreign');
			$t->dropColumn(array('project_address','area_id','region_id'));
		});
	}

}
