<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForContactsGroup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_groups', function($t){
			$t->increments('id');
			$t->integer('contractor_group_id')->unsigned();
			$t->foreign('contractor_group_id')
				->references('id')->on('project_contractor_groups');
			$t->integer('contact_id')->unsigned();
			$t->foreign('contact_id')
				->references('id')->on('contacts');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contact_groups', function($t){
			$t->dropForeign('contact_groups_contractor_group_id_foreign');
			$t->dropForeign('contact_groups_contact_id_foreign');
		});
		Schema::dropIfExists('contact_groups');
	}

}
