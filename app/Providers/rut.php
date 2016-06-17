<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class rut extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        \Validator::extend('rut', function($attribute, $value, $parameters)
        {
            return preg_match('/^(\d{7,8})-([\dk]{1})$/i', $value);
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
