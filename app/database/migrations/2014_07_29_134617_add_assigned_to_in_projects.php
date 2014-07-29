<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssignedToInProjects extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects', function($t){
			$t->integer('assigned_to')->unsigned()
				->after('created_by')
				->nullable();
			$t->foreign('assigned_to')
				->references('id')->on('users');
			$t->integer('assigned_by')->unsigned()
				->after('assigned_to')
				->nullable();
			$t->foreign('assigned_by')
				->references('id')->on('users');
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
			$t->dropForeign('projects_assigned_to_foreign');
			$t->dropForeign('projects_assigned_by_foreign');
			$t->dropColumn(array('assigned_to','assigned_by'));
		});
	}

}
