<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("users", function($t) {
			$t->increments("id");
			$t->string("first_name");
			$t->string("middle_name");
			$t->string("last_name");
			$t->string("ident");
			$t->integer('department_id')->unsigned();
			$t->foreign('department_id')
				->references('id')->on('departments');
			$t->string("username");
			$t->string("password");
			$t->boolean('active');
			$t->string("email");
			$t->string("remember_token")->nullable();
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
		Schema::dropIfExists("users");
	}

}
