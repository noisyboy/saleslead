<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



// Route group for API versioning
Route::group(array('prefix' => 'api/v1','before' => 'auth'), function()
{
    Route::get('area_regions/{id}', 'api\RegionsController@area_regions');
    Route::get('contacts/{id}','api\ContactsController@search_contact');
    Route::get('sub_categories/{id}','api\ProjectSubCategoriesController@sub_categories');

    Route::get('mycontacts','api\ContactsController@getMyContacts');


    Route::post('addcontact/{id?}','api\ProjectsController@postAddContact');
});

// Route::get('/', function(){
// 	$owner = new Role;
// 	$owner->name = 'Owner';
// 	$owner->save();

// 	$admin = new Role;
// 	$admin->name = 'Admin';
// 	$admin->save();

// 	$user = User::where('username','=','rencie')->first();

// 	/* role attach alias */
// 	// $user->attachRole( $admin ); // Parameter can be an Role object, array or id.

// 	/* OR the eloquent's original: */
// 	$user->roles()->attach( $admin->id ); // id only

// 	$managePosts = new Permission;
// 	$managePosts->name = 'manage_posts';
// 	$managePosts->display_name = 'Manage Posts';
// 	$managePosts->save();

// 	$manageUsers = new Permission;
// 	$manageUsers->name = 'manage_users';
// 	$manageUsers->display_name = 'Manage Users';
// 	$manageUsers->save();

// 	$owner->perms()->sync(array($managePosts->id,$manageUsers->id));
// 	$admin->perms()->sync(array($managePosts->id));
// });


// Route group for authenticated users
Route::group(array('before' => 'auth'), function()
{
	Route::get('/', 'DashboardController@getIndex');

   	Route::resource('contacts', 'ContactsController');
	
	Route::resource('areas', 'AreasController');
	Route::resource('regions', 'RegionsController');
	Route::resource('contractorgroups','ContractorGroupsController');
	Route::resource('projectclassifications','ProjectClassificationsController');
	Route::resource('projectcategories','ProjectCategoriesController');
	Route::resource('projectsubcategories','ProjectSubCategoriesController');
	Route::resource('projectstages','ProjectStagesController');
	Route::resource('projectstatuses','ProjectStatusesController');
	Route::resource('departments','DepartmentsController');

	Route::get('phonetypes/json', 'PhoneTypesController@Json');
	
	Route::get('access/denied', function(){
		return View::make('errors.403_error');
	});

	Route::post('phones', 'PhonesController@store');
	Route::post('emails', 'EmailsController@store');

	Route::controller('users','UsersController');
	Route::controller('dashboard','DashboardController');

	Route::controller('projects', 'ProjectsController');
	
	Route::controller('roles', 'RolesController');

});

Route::get('logout','AuthController@getLogout');
Route::get('login','AuthController@getLogin');
Route::post('login','AuthController@postLogin');


