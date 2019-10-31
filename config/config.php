<?php

return [
    // What Blade file to @extends
    'layout_file_path' => null,
    // Set to false to override default routes
    'use_default_routes' => true,
    // The base url segment where forms can be seen and submitted
    // A value of false will disable form rendering and submission
    'form_url_group' => 'form',
    // The base url segment where forms can be built and modified
    'admin_url_group' => 'admin/form',
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
