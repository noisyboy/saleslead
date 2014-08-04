<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyAddressFieldInProject extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects', function($t){
			$t->dropColumn('project_address');
			$t->string('number',100)->after('project_name');
			$t->string('street1')->after('number');
			$t->string('street2')->after('street1');
			$t->string('city')->after('street2');
			$t->string('province')->after('city');

			$t->integer('projectowner_id')->unsigned()->nullable()->after('province');;
			$t->foreign('projectowner_id')
				->references('id')->on('contacts');
			$t->decimal('estimated_amount', 15, 2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('projects', function($t){
			$t->dropForeign('projects_projectowner_id_foreign');
			$t->dropColumn(array('estimated_amount','projectowner_id','province','city','street2','street1','number'));

			$t->string('project_address')->after('project_name');
		});
	}

}
