<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
        $this->publishes(
            [
                __DIR__ . '/pt_BR.json' => resource_path('lang/pt_BR.json'),
                __DIR__ . '/pt_BR' => resource_path('lang/pt_BR')
            ],
            'laravel-pt-br-localization'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Model::preventLazyLoading(! app()->isProduction());
    }
}
