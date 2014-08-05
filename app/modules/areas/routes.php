<?php

Route::group(array('before' => 'auth'), function()
{
	Route::get('areas',  array('as' => 'areas', 'uses' => 'App\Modules\Areas\Controllers\AreasController@getIndex'));
	Route::get('areas/create',  array('as' => 'areas.create', 'uses' => 'App\Modules\Areas\Controllers\AreasController@getCreate'));
	Route::post('areas/store',  array('as' => 'areas.store', 'uses' => 'App\Modules\Areas\Controllers\AreasController@postStore'));
	Route::get('areas/{id}',  array('as' => 'areas.show', 'uses' => 'App\Modules\Areas\Controllers\AreasController@getShow'));
});