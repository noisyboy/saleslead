<?php namespace App\Modules\Areas;

class AreasServiceProvider extends \Illuminate\Support\ServiceProvider {

	public function register()
	{
		// \Log::debug("AreasServiceProvider registered");

		// Register facades
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Area', 'App\Modules\Areas\Models\Area');
		});
	}

}