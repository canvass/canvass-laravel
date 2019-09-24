<?php

namespace CanvassLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class CanvassServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        if ((bool) env('MIGRATIONS_USE_UPGRADES', true)) {
            $this->loadMigrationsFrom(
                canvass_laravel_path('database/migrations/')
            );
        }

        if ('production' !== env('APP_ENV')) {
            $this->registerEloquentFactoriesFrom(
                canvass_laravel_path('database/factories/')
            );
        }

        $this->loadRoutesFrom(canvass_laravel_path('routes/web.php'));

        $this->loadViewsFrom(
            canvass_laravel_path('resources/views/'),
            'canvass'
        );
    }

    /**
     * Register factories.
     *
     * @param  string  $path
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function registerEloquentFactoriesFrom($path)
    {
        $this->app->make(EloquentFactory::class)->load($path);
    }
}
