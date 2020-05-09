<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default uuid types
    |--------------------------------------------------------------------------
    |
    | This option defines the default uuid types used by fields.
    |
    */

    'configurations' => [
        'name' => [
            'native' => 'name',
            'default_options' => [
                'visible', 'fillable', 'required',
            ],
            'migration_name' => null,
            'factory_name' => null,
        ],
    ],

];
