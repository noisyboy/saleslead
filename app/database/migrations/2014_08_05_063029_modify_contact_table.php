<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contacts', function($t){
			$t->dropColumn('address');
			$t->string('number',100)->after('company_name');
			$t->string('street1')->after('number');
			$t->string('street2')->after('street1');
			$t->string('city')->after('street2');
			$t->string('province')->after('city');
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
			$t->dropColumn(array('province','city','street2','street1','number'));
			$t->string('address')->after('company_name');
		});
	}

}
