<?php

class RoleTableSeeder extends Seeder{

    public function run() {
        DB::table('roles')->delete();
        

		DB::table('roles')->insert(
			array(
				array('name' => 'ADMIN'),
				array('name' => 'BDO'),
				array('name' => 'SUPERVISOR')
				)
			);
    }

}