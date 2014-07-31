<?php

class ProjectContactStatusTableSeeder extends Seeder {

	public function run()
	{
		DB::table('project_contact_statuses')->delete();

		DB::table('project_contact_statuses')->insert(
			array(
				array('project_contact_status' => 'FOR APPROVAL'),
				array('project_contact_status' => 'APPROVED'),
				array('project_contact_status' => 'DENIED')                       
			));
	}

}