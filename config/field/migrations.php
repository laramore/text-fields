<?php

namespace Laramore\Fields;


return [

    /*
    |--------------------------------------------------------------------------
    | Default text fields
    |--------------------------------------------------------------------------
    |
    | This option defines the default text fields.
    |
    */

    Body::class => [
        'type' => 'char',
        'property_keys' => [
            'length:maxLength', 'nullable', 'default',
        ],
    ],
    FirstName::class => [
        'type' => 'char',
        'property_keys' => [
            'length:maxLength', 'nullable', 'default',
        ],
    ],
    LastName::class => [
        'type' => 'char',
        'property_keys' => [
            'length:maxLength', 'nullable', 'default',
        ],
    ],
    Name::class => [
        'type' => 'char',
        'property_keys' => [
            'length:maxLength', 'nullable', 'default',
        ],
    ],
    Slug::class => [
        'type' => 'char',
        'property_keys' => [
            'length:maxLength', 'nullable', 'default',
        ],
    ],
    TextEnum::class => [
        'type' => 'char',
        'property_keys' => [
            'length:maxLength', 'nullable', 'default:defaultValue',
        ],
    ],
    Title::class => [
        'type' => 'char',
        'property_keys' => [
            'length:maxLength', 'nullable', 'default',
        ],
    ],
    
];
