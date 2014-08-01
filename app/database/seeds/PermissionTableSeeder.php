<?php

class PermissionTableSeeder extends Seeder{

    public function run() {
        DB::table('permissions')->delete();
        
        DB::table('permissions')->insert(
			array(
				array('name' => 'manage_areas','display_name' => 'Manage Areas',
					'created_at' => new DateTime,
                	'updated_at' => new DateTime),
				array('name' => 'manage_regions','display_name' => 'Manage Regions',
					'created_at' => new DateTime,
                	'updated_at' => new DateTime),  
				array('name' => 'manage_contractorgroups','display_name' => 'Manage Contractor Groups',
					'created_at' => new DateTime,
                	'updated_at' => new DateTime),  
				array('name' => 'manage_projectclassifications','display_name' => 'Manage Project Classifications',
					'created_at' => new DateTime,
                	'updated_at' => new DateTime),  
				array('name' => 'manage_projectcategories','display_name' => 'Manage Project Categories',
					'created_at' => new DateTime,
                	'updated_at' => new DateTime),  
				array('name' => 'manage_projectsubcategories','display_name' => 'Manage Project Sub Categories',
					'created_at' => new DateTime,
                	'updated_at' => new DateTime),  
				array('name' => 'manage_projectstages','display_name' => 'Manage Project Stages',
					'created_at' => new DateTime,
                	'updated_at' => new DateTime),  
				array('name' => 'manage_projectstatuses','display_name' => 'Manage Project Statuses',
					'created_at' => new DateTime,
                	'updated_at' => new DateTime), 
                array('name' => 'manage_new_projects','display_name' => 'Manage New Projects',
					'created_at' => new DateTime,
                	'updated_at' => new DateTime),  
			));
    }

}