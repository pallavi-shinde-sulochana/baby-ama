<?php

namespace App\Providers;

use App\Core\Adapters\Bootstrap;
use App\Core\Adapters\Theme;
use Illuminate\Support\Facades\View;
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
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // \URL::forceScheme('https');
        $theme = new Theme;
        // Share theme adapter class
        View::share('theme', $theme);

        $theme->initConfig();

        Bootstrap::run();
    }
}
