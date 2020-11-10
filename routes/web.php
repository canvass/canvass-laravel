<?php

use \Canvass\Action\Form;
use \Canvass\Action\FormField;
use \Canvass\Action\NestedField;

if (config('canvass.form_url_group')) {
    Route::group([
        'middleware' => ['web'],
         'prefix' => config('canvass.form_url_group')
    ], function () {
        Route::get('{form_id}', \CanvassLaravel\Action\Form\Preview::class)
            ->name('form.view');
    });
}

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::group(['prefix' => config('canvass.admin_url_group')], function () {
        canvass_laravel_admin_routes();
    });
});

