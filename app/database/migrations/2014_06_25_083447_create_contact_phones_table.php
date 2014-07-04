<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phones', function($t)
		{
			$t->increments('id');
			$t->string('phone',100);
			$t->integer('phone_type_id')->unsigned();
			$t->integer('contact_id')->unsigned();
			$t->foreign('phone_type_id')
				->references('id')->on('phone_types');
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
		Schema::table('phones', function($t){
			$t->dropForeign('phones_phone_type_id_foreign');
			$t->dropForeign('phones_contact_id_foreign');
		});
		Schema::dropIfExists('phones');
	}

}
