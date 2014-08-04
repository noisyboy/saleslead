<?php

Route::group(array('before' => 'auth'), function()
{
	Route::resource('areas', 'AreasController');
});