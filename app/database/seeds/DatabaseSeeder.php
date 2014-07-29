<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');

		$this->call('ProjectAppTableSeeder');
		$this->command->info('Project status table seeded!');


		// $this->call('AreaTableSeeder');
		// $this->command->info('Areas Table table seeded!');

		// $this->call('PhoneTypeTableSeeder');
		// $this->command->info('Phone Types table seeded!');

		// $this->call('ProjectClassificationSeeder');
		// $this->command->info('Project Classifications table seeded!');

		// $this->call('DepartmentTableSeeder');
		// $this->command->info('Department Table table seeded!');

		// $this->call('RoleTableSeeder');
		// $this->command->info('Role Table table seeded!');

		// $this->call('PermissionTableSeeder');
		// $this->command->info('Permission Table table seeded!');

		// $this->call('UserTableSeeder');
		// $this->command->info('Users Table table seeded!');

	}



}
