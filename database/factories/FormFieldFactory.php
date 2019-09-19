<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(\CanvassLaravel\Model\FormField::class, function (Faker $faker) {
    return [
        'form_id' => 1,
        'version' => 1,
        'parent_id' => 0,

        'identifier' => 'form-control',
        'classes' => 'form-control',

        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'value' => '',

        'help_text' => 'Your full name',
    ];
});
