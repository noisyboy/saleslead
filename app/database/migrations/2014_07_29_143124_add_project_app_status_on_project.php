<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectAppStatusOnProject extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects', function($t){
			$t->integer('status_id')->unsigned()
				->after('project_status_id')
				->default(1);
			$t->foreign('status_id')
				->references('id')->on('project_app_statuses');
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
			$t->dropForeign('projects_status_id_foreign');
			$t->dropColumn('status_id');
		});
	}

}
