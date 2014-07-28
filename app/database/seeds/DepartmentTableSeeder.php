<?php

class DepartmentTableSeeder extends Seeder {

	public function run(){
		DB::table('departments')->delete();
		Department::create(array('department' => 'ADMIN'),
			array('department' => 'SALES'));
	}
}