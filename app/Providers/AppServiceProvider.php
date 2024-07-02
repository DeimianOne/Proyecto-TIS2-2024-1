<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Models\Ldgfooter;

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

        // Para que contenido de footer se vea en todas las vistas
        View::composer('*', function ($view) {
            $footerData = Ldgfooter::first();
            $view->with('footerData', $footerData);
        });

        if(config('app.env') === 'production'){
            URL::forceScheme('https');
        }
        Schema::defaultStringLength(125);
    }
}
