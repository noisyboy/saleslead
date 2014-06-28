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

// Route::get('/', function()
// {
// 	return View::make('hello');
// });
// Route::get('/', 'HomeController@showWelcome');

Route::get('/', 'HomeController@getIndex');

// Route group for API versioning
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::get('area_regions/{id}', 'api\RegionsController@area_regions');
    Route::get('contacts/{id}','api\ContactsController@search_contact');
});


Route::resource('contacts', 'ContactsController');
Route::resource('projects', 'ProjectsController');
Route::resource('areas', 'AreasController');
Route::resource('regions', 'RegionsController');
Route::resource('contractorgroups','ContractorGroupsController');
Route::resource('projectclassifications','ProjectClassificationsController');
Route::resource('projectcategories','ProjectCategoriesController');

Route::get('phonetypes/json', 'PhoneTypesController@Json');

Route::post('phones', 'PhonesController@store');
Route::post('emails', 'EmailsController@store');


// Route::controller('leadtype', 'LeadTypeController');
