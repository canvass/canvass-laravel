<?php

use \CanvassLaravel\Http\Controllers\Form;
use \CanvassLaravel\Http\Controllers\FormField;

//Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'form'], function () {
        Route::get('/', Form\Index::class)->name('form.index');

        Route::get('/create', Form\Create::class)->name('form.create');

        Route::post('/', Form\Store::class)->name('form.store');

        Route::get('{id}/edit', Form\Edit::class)->name('form.edit');

        Route::put('{id}', Form\Update::class)->name('form.update');

        Route::delete('{id}', Form\Destroy::class)->name('form.destroy');


        // Form Control Routes
        Route::get('{form_id}/fields', FormField\Index::class)
            ->name('form_field.index');
    });
//});

