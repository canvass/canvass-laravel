<?php

namespace CanvassLaravel\Providers;

use Canvass\Contract\Action;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use CanvassLaravel\Support\ActionResponseMap;
use CanvassLaravel\Support\CanvassValidator;
use CanvassLaravel\Support\Response;
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

        if (! class_exists('CreateCanvassFormsTable')) {
            $migrate_path = __DIR__ . '/../database/migrations';

            $this->publishes([
                "{$migrate_path}/create_canvass_forms_table.php.stub" =>
                    database_path('migrations/' .
                        date('Y_m_d_His') . '_create_canvass_forms_table.php'
                    ),
                "{$migrate_path}//create_canvass_form_fields_table.php.stub" =>
                    database_path('migrations/' .
                        date('Y_m_d_His') . '_create_canvass_forms_table.php'
                    ),
            ], 'migrations');
        }

        \Canvass\Forge::setFormClosure(static function () {
            return new Form();
        });

        \Canvass\Forge::setFieldClosure(static function () {
            return new FormField();
        });

        \Canvass\Forge::setRequestDataClosure(
            static function (array $fields = null) {
                if (null === $fields) {
                    return request()->all();
                }

                return request()->only($fields);
            }
        );

        \Canvass\Forge::setResponseClosure(static function () {
            return new Response();
        });

        \Canvass\Forge::setSuccessClosure(static function (string $message, Action $action) {
            return ActionResponseMap::routeRedirect($action, $message);
        });

        \Canvass\Forge::setErrorClosure(static function (string $message, Action $action) {
            return redirect()->back()->withInput()->with('error', $message);
        });

        \Canvass\Forge::setLoggerClosure(static function (\Throwable $e) {
            \Log::error($e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
        });

        $validate_closure = static function () { return new CanvassValidator(); };

        \Canvass\Forge::setValidatorClosure($validate_closure);

        \Canvass\Forge::setValidationMapClosure($validate_closure);
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
