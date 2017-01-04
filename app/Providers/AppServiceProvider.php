<?php

namespace App\Providers;

use View;
use Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        View::composer('*',function($view){
            if (Auth::check()) {
                $current_user = Auth::user();
                $view->with([
                    'current_user' => $current_user,
                    'current_username' => $current_user->username
                ]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
