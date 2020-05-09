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
