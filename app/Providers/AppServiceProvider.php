<?php

namespace App\Providers;

use App\Logo;
use App\Product;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('lib.header', function($view){
            $view->with('logo', Logo::all());
       });

        view()->composer('*', function($view){
            $view->with('users', User::all());
        });
	
		    view()->composer('*', function($view){
			    $view->with('title', 'Royal Family');
		    });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
