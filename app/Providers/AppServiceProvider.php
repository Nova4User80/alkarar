<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            switch (auth()->user()->email) {
                case 'aban@kec.com':
                    return true;
                    break;
                case 'ahmed@kec.com':
                    return true;
                    break;
                default:
                    return false;
            }
           // return auth()->user()->email == ('aban@kec.com' || 'ahmed@kec.com');
        });
        Schema::defaultStringLength(191);
    }
}
