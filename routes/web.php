<?php

use \CanvassLaravel\Http\Controllers\Form;
use \CanvassLaravel\Http\Controllers\FormField;
use \CanvassLaravel\Http\Controllers\FieldOption;

Route::group(['middleware' => ['web', 'auth']], function () {
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


        Route::get(
            '{form_id}/fields/create/input/{sort?}',
            FormField\SelectInputType::class
        )->name('form_field.select_input_type');

        Route::get('{form_id}/fields/create/{type}/{sort?}', FormField\Create::class)
            ->name('form_field.create');

        Route::post('{form_id}/fields/{type}/{sort?}', FormField\Store::class)
            ->name('form_field.store');

        Route::get('{form_id}/fields/{field}/edit', FormField\Edit::class)
            ->name('form_field.edit');

        Route::put('{form_id}/fields/{field}', FormField\Update::class)
            ->name('form_field.update');

        Route::delete('{form_id}/fields/{field}', FormField\Destroy::class)
            ->name('form_field.destroy');

        Route::post('{form_id}/fields/move/{field}/up', FormField\MoveUp::class)
            ->name('form_field.move_up');

        Route::post('{form_id}/fields/move/{field}/down', FormField\MoveDown::class)
            ->name('form_field.move_down');

        // Field Option Routes
        Route::get(
            '{form_id}/fields/{field_id}/options/create/{sort}/{type}',
            FieldOption\Create::class
        )->name('form_field_option.create');

        Route::post(
            '{form_id}/fields/{field_id}/options/{sort}/{type}',
            FieldOption\Store::class
        )->name('form_field_option.store');

        Route::get(
            '{form_id}/fields/{field_id}/options/edit/{option_id}',
            FieldOption\Edit::class
        )->name('form_field_option.edit');

        Route::put(
            '{form_id}/fields/{field_id}/options/edit/{option_id}',
            FieldOption\Update::class
        )->name('form_field_option.update');

        Route::delete(
            '{form_id}/fields/{field_id}/options/{option_id}',
            FieldOption\Destroy::class
        )->name('form_field_option.destroy');

        Route::post(
            '{form_id}/fields/{field_id}/options/{option_id}/move/up',
            FieldOption\MoveUp::class
        )->name('form_field_option.move_up');

        Route::post(
            '{form_id}/fields/{field_id}/options/{option_id}/move/down',
            FieldOption\MoveDown::class
        )->name('form_field_option.move_down');
    });
});

