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

		$this->call('PhoneTypeTableSeeder');

        $this->command->info('Phone Types table seeded!');

        $this->call('ProjectClassificationSeeder');

        $this->command->info('Project Classifications table seeded!');

        $this->call('RoleTableSeeder');

        $this->command->info('Role Table table seeded!');

	}



}
