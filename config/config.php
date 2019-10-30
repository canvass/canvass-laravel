<?php

return [
    // What Blade file to @extends
    'layout_file_path' => null,
    // Set to false to override default routes
    'use_default_routes' => true,
    // What values to auto-populate field values in the various forms
    'defaults' => [
        'form' => [
            'button_text' => 'Submit',
            'button_classes' => '',
        ],
        'field' => [
            'wrap_classes' => '',
            'classes' => '',
        ],
        'columns' => [
            'wrap_classes' => ''
        ],
        'column' => [
            'classes' => ''
        ]
    ]
];
