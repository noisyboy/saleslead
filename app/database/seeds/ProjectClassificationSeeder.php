<?php

class ProjectClassificationSeeder extends Seeder {

	public function run()
	{
		DB::table('project_classifications')->delete();

		DB::table('project_classifications')->insert(
			array(
				array('project_classification' => 'New Construction'),
				array('project_classification' => 'Repainting')                  
			));
	}

}