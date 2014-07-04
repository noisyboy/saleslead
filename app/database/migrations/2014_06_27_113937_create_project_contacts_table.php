<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_contacts', function($t){
			$t->increments('id');
			$t->integer('project_id')->unsigned();
			$t->foreign('project_id')
				->references('id')->on('projects');
			$t->integer('contact_id')->unsigned();
			$t->foreign('contact_id')
				->references('id')->on('contacts');
			$t->integer('contractor_group_id')->unsigned();
			$t->foreign('contractor_group_id')
				->references('id')->on('project_contractor_groups');
			$t->string('role',200);
			$t->timestamps();
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
			$t->dropForeign('project_contacts_project_id_foreign');
			$t->dropForeign('project_contacts_contact_id_foreign');
			$t->dropForeign('project_contacts_contractor_group_id_foreign');
		});
		Schema::dropIfExists('project_contacts');
	}

}
