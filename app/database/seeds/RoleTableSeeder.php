<?php

class RoleTableSeeder extends Seeder{

    public function run() {
        DB::table('roles')->delete();
        Role::create(array('name' => 'admin'));
        Role::create(array('name' => 'bdo'));
        Role::create(array('name' => 'project_approver'));
    }

}