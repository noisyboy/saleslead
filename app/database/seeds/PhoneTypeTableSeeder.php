<?php

class PhoneTypeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('phone_types')->delete();

		DB::table('phone_types')->insert(
			array(
				array('phone_type' => 'HOME'),
				array('phone_type' => 'WORK'),
				array('phone_type' => 'MOBILE'),   
				array('phone_type' => 'OTHER'),                             
			));
	}

}
