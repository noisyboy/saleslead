<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regions', function($t){
			$t->increments('id');
			$t->string('region',100);
			$t->integer('area_id')->unsigned();
			$t->foreign('area_id')
				->references('id')->on('areas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('regions', function($t){
			$t->dropForeign('regions_area_id_foreign');
		});
		Schema::drop('regions');
	}

}
