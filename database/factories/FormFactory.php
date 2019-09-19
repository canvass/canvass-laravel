<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(\CanvassLaravel\Model\Form::class, function (Faker $faker) {
    return [
        'owner_id' => 1,
        
        'name' => 'Form Name',
        'introduction' => '<h1>Amazing Form Here</h1><p>Please fill out the form below.</p>',

        'redirect_url' => '/confirmation',
        'identifier' => 'form-id',
        'classes' => 'form-class',
        'button_text' => 'Send Form',
        'button_classes' => 'btn btn-success',
    ];
});
