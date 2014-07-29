<?php

class DepartmentTableSeeder extends Seeder {

	public function run(){
		DB::table('departments')->delete();
		
		DB::table('departments')->insert(
			array(
				array('department' => 'ADMIN'),
				array('department' => 'SALES')
				)
			);
	}
}