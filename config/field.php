<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default uuid fields
    |--------------------------------------------------------------------------
    |
    | This option defines the default uuid fields.
    |
    */

    'configurations' => [
        'body' => [
            'type' => 'text',
        ],
        'name' => [
            'type' => 'name',
            'fields' => [
                'firstname' => [
                    Laramore\Fields\Body::class,
                    ['visible', 'fillable', 'required', 'title'],
                ],
                'lastname' => [
                    Laramore\Fields\Body::class,
                    ['visible', 'fillable', 'required', 'uppercase'],
                ],
            ],
            'templates' => [
                'firstname' => 'firstname',
                'lastname' => 'lastname',
            ],
        ],
    ],
    
];
