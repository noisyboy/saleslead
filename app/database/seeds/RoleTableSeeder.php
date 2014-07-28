<?php

class RoleTableSeeder extends Seeder{

    public function run() {
        DB::table('roles')->delete();
        Role::create(array('name' => 'ADMIN'),
        	array('name' => 'SALES'));
    }

}