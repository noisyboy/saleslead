<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactTaggingStatus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('project_contacts', function($t){
			$t->integer('status_id')->unsigned()
				->after('role')
				->default(1);
			$t->foreign('status_id')
				->references('id')->on('project_contact_statuses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table('project_contacts', function($t){
			$t->dropForeign('project_contacts_status_id_foreign');
			$t->dropColumn('status_id');
		});
	}

}
