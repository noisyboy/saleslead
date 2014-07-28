<?php

class UserTableSeeder extends Seeder {

	public function run() {
		DB::table('users')->delete();
		$admin = Role::where('name','=','ADMIN')->first();

		User::create(array('first_name' => 'Rencie',
			'middle_name' => 'Agbin',
			'last_name' => 'Bautista',
			'ident' => '4107M',
			'department_id' => $admin->id,
			'username' => 'admin',
			'email' => 'rencie.bautista@yahoo.com',
			'password' => Hash::make('031988'),
			'active' => 1));

		// $admin = User::where('name','=','ADMIN')->first();

		// $user->roles()->attach($admin->id);

		// $admin->perms()->sync(array($managePosts->id));
	}
}