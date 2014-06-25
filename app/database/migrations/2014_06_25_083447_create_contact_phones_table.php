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
			$t->integer('conatct_id')->unsigned();
			$t->foreign('phone_type_id')
				->references('id')->on('phone_types');
			$t->foreign('conatct_id')
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
		Schema::drop('phones');
	}

}
