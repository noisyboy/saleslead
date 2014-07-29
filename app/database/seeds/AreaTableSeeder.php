<?php

class AreaTableSeeder extends Seeder {

	public function run(){
		DB::table('areas')->delete();

		DB::table('areas')->insert(
			array(
				array('area' => 'LUZON'),
				array('area' => 'VISAYAS'),
				array('area' => 'MINDANAO')
				)
			);
	}
}