<?php

namespace CanvassLaravel;

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
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/config.php',
            'canvass'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        if ('production' !== env('APP_ENV')) {
            $this->registerEloquentFactoriesFrom(
                canvass_laravel_path('database/factories/')
            );
        }

        if ((bool) config('canvass.use_default_routes', true)) {
            $this->loadRoutesFrom(canvass_laravel_path('routes/web.php'));
        }

        $this->loadViewsFrom(
            canvass_laravel_path('resources/views/'),
            'canvass'
        );

        if (! class_exists('CreateCanvassFormsTable')) {
            $migrate_path = __DIR__ . '/../../database/migrations';

            $this->publishes([
                "{$migrate_path}/create_canvass_forms_table.php.stub" =>
                    database_path('migrations/' .
                        date('Y_m_d_His') . '_create_canvass_forms_table.php'
                    ),
                "{$migrate_path}/create_canvass_form_fields_table.php.stub" =>
                    database_path('migrations/' .
                        date('Y_m_d_His', time() + 1) . '_create_canvass_form_fields_table.php'
                    ),
            ], 'migrations');
        }

        \CanvassLaravel\Forge::setUpForLaravel();
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
