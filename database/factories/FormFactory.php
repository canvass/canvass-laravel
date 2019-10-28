<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(\CanvassLaravel\Model\Form::class, function (Faker $faker) {
    return [
        'owner_id' => 1,
        
        'name' => 'Form Name',
        'display_name' => 'Form Display Name',
        'introduction' => '<p><strong>Amazing Form Here!</strong></p><p>Please fill out the form below.</p>',

        'redirect_url' => '/confirmation',
        'identifier' => 'form-id',
        'classes' => 'form-class',
        'button_text' => 'Send Form',
        'button_classes' => 'btn btn-success',
    ];
});
