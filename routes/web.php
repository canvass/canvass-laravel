<?php

use \Canvass\Action\Form;
use \Canvass\Action\FormField;
use \Canvass\Action\NestedField;

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::group(['prefix' => 'form'], function () {
        Route::get('/', Form\Index::class)->name('form.index');

        Route::get('/create', Form\Create::class)->name('form.create');

        Route::post('/', Form\Store::class)->name('form.store');

        Route::get('{form_id}/edit', Form\Edit::class)->name('form.edit');

        Route::put('{form_id}', Form\Update::class)->name('form.update');

        Route::delete('{form_id}', Form\Destroy::class)->name('form.destroy');

        Route::get(
            '{form_id}/preview',
            \CanvassLaravel\Action\Form\Preview::class
        )->name('form.preview');


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
            '{form_id}/fields/{field_id}/options/create/{sort}/input',
            NestedField\SelectInputType::class
        )->name('nested_field.select_input_type');

        Route::get(
            '{form_id}/fields/{field_id}/options/create/{sort}/{type}',
            NestedField\Create::class
        )->name('nested_field.create');

        Route::post(
            '{form_id}/fields/{field_id}/options/{sort}/{type}',
            NestedField\Store::class
        )->name('nested_field.store');

        Route::get(
            '{form_id}/fields/{field_id}/options/edit/{option_id}',
            NestedField\Edit::class
        )->name('nested_field.edit');

        Route::put(
            '{form_id}/fields/{field_id}/options/edit/{option_id}',
            NestedField\Update::class
        )->name('nested_field.update');

        Route::delete(
            '{form_id}/fields/{field_id}/options/{option_id}',
            NestedField\Destroy::class
        )->name('nested_field.destroy');

        Route::post(
            '{form_id}/fields/{field_id}/options/{option_id}/move/up',
            NestedField\MoveUp::class
        )->name('nested_field.move_up');

        Route::post(
            '{form_id}/fields/{field_id}/options/{option_id}/move/down',
            NestedField\MoveDown::class
        )->name('nested_field.move_down');
    });
});

