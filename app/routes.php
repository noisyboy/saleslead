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
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::get('area_regions/{id}', 'api\RegionsController@area_regions');
    Route::get('contacts/{id}','api\ContactsController@search_contact');
    Route::get('sub_categories/{id}','api\ProjectSubCategoriesController@sub_categories');
});


// Route group for authenticated users
Route::group(array('before' => 'auth'), function()
{
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

	Route::post('phones', 'PhonesController@store');
	Route::post('emails', 'EmailsController@store');

	Route::controller('users','UsersController');
	Route::controller('dashboard','DashboardController');
	Route::controller('projects', 'ProjectsController');

	Route::get('/', 'DashboardController@getIndex');

});

Route::get('logout','AuthController@getLogout');
Route::get('login','AuthController@getLogin');
Route::post('login','AuthController@postLogin');

