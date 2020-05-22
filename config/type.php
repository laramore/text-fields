<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default text types
    |--------------------------------------------------------------------------
    |
    | This option defines the default text types used by fields.
    |
    */

    'configurations' => [
        'first_name' => [
            'native' => 'first_name',
            'default_options' => [
                'visible', 'fillable', 'required', 'title'
            ],
            'migration_name' => 'char',
            'migration_property_keys' => [
                'length:maxLength', 'nullable', 'default',
            ],
        ],
        'last_name' => [
            'native' => 'last_name',
            'default_options' => [
                'visible', 'fillable', 'required', 'uppercase'
            ],
            'migration_name' => 'char',
            'migration_property_keys' => [
                'length:maxLength', 'nullable', 'default',
            ],
        ],
        'slug' => [
            'native' => 'slug',
            'default_options' => [
                'visible', 'fillable', 'required', 'slug'
            ],
            'migration_name' => 'char',
            'migration_property_keys' => [
                'length:maxLength', 'nullable', 'default',
            ],
        ],
        'title' => [
            'native' => 'title',
            'default_options' => [
                'visible', 'fillable', 'required', 'title'
            ],
            'migration_name' => 'char',
            'migration_property_keys' => [
                'length:maxLength', 'nullable', 'default',
            ],
        ],
    ],

];
