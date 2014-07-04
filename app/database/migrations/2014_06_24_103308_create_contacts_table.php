<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function($t)
		{
			$t->increments('id');

			$t->string('company_name',200);
			$t->text('address');
			$t->string('first_name',200);
			$t->string('middle_name',200);
			$t->string('last_name',200);
			$t->string('title',200);
			$t->integer('related_to')->nullable(); 
			// created_at, updated_at DATETIME
			$t->timestamps();

			$t->index(array('company_name','first_name','last_name'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('contacts');
	}
}
