<?php

use \Canvass\Action\Form;
use \Canvass\Action\FormField;
use \Canvass\Action\NestedField;

if (! function_exists('canvass_laravel_path')) {
    function canvass_laravel_path($path) {
        return dirname(__DIR__, 1) . '/' . $path;
    }
}

if (! function_exists('canvass_laravel_admin_routes')) {
    function canvass_laravel_admin_routes() {
        Route::get('/', Form\Index::class)->name('form.index');

        Route::get('/create', Form\Create::class)->name('form.create');

        Route::post('/', Form\Store::class)->name('form.store');

        Route::get('{form_id}/edit', Form\Edit::class)->name('form.edit');

        Route::put('{form_id}', Form\Update::class)->name('form.update');

        Route::delete(
            '{form_id}',
            \CanvassLaravel\Action\Form\Destroy::class
        )->name('form.destroy');

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

        Route::delete(
            '{form_id}/fields/{field}',
            \CanvassLaravel\Action\Field\Destroy::class
        )->name('form_field.destroy');

        Route::post('{form_id}/fields/move/{field}/up', FormField\MoveUp::class)
            ->name('form_field.move_up');

        Route::post('{form_id}/fields/move/{field}/down', FormField\MoveDown::class)
            ->name('form_field.move_down');

        // Field Option Routes
        Route::get(
            '{form_id}/fields/{field_id}/nested/create/{sort}/input',
            NestedField\SelectInputType::class
        )->name('nested_field.select_input_type');

        Route::get(
            '{form_id}/fields/{field_id}/nested/create/{sort}/{type}',
            NestedField\Create::class
        )->name('nested_field.create');

        Route::post(
            '{form_id}/fields/{field_id}/nested/{sort}/{type}',
            NestedField\Store::class
        )->name('nested_field.store');

        Route::get(
            '{form_id}/fields/{field_id}/nested/edit/{nested_id}',
            NestedField\Edit::class
        )->name('nested_field.edit');

        Route::put(
            '{form_id}/fields/{field_id}/nested/edit/{nested_id}',
            NestedField\Update::class
        )->name('nested_field.update');

        Route::delete(
            '{form_id}/fields/{field_id}/nested/{nested_id}',
            \CanvassLaravel\Action\NestedField\Destroy::class
        )->name('nested_field.destroy');

        Route::post(
            '{form_id}/fields/{field_id}/nested/{nested_id}/move/up',
            NestedField\MoveUp::class
        )->name('nested_field.move_up');

        Route::post(
            '{form_id}/fields/{field_id}/nested/{nested_id}/move/down',
            NestedField\MoveDown::class
        )->name('nested_field.move_down');
    }
}
