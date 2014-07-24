<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedByOnContantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contacts', function($t){
			$t->integer('created_by')->unsigned()->after('id');
			$t->foreign('created_by')
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
		Schema::table('contacts', function($t){
			$t->dropForeign('contacts_created_by_foreign');
			$t->dropColumn('created_by');
		});
	}

}
