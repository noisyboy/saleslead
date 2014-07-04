<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_sub_categories', function($t){
			$t->increments('id');
			$t->string('project_sub_category',100);
			$t->integer('project_category_id')->unsigned();
			$t->foreign('project_category_id')
				->references('id')->on('project_categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::table('project_sub_categories', function($t){
			$t->dropForeign('project_sub_categories_project_category_id_foreign');
		});
		Schema::dropIfExists('project_sub_categories');
	}

}
