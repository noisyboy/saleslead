<?php

class ProjectAppTableSeeder extends Seeder {

	public function run() {
        DB::table('project_app_statuses')->delete();
        

		DB::table('project_app_statuses')->insert(
			array(
				array('project_app_status' => 'CREATED'),
				array('project_app_status' => 'ASSIGNED'),
				array('project_app_status' => 'CLOSED')
				)
			);
    }
}