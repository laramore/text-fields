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
            'length', 'nullable', 'default',
        ],
    ],
    FirstName::class => [
        'type' => 'char',
        'property_keys' => [
            'length', 'nullable', 'default',
        ],
    ],
    LastName::class => [
        'type' => 'char',
        'property_keys' => [
            'length', 'nullable', 'default',
        ],
    ],
    Pattern::class => [
        'type' => 'char',
        'property_keys' => [
            'length', 'nullable', 'default',
        ],
    ],
    Name::class => [
        'type' => 'char',
        'property_keys' => [
            'length', 'nullable', 'default',
        ],
    ],
    Slug::class => [
        'type' => 'char',
        'property_keys' => [
            'length', 'nullable', 'default',
        ],
    ],
    Hexadecimal::class => [
        'type' => 'char',
        'property_keys' => [
            'length', 'nullable', 'default',
        ],
    ],
    TextEnum::class => [
        'type' => 'char',
        'property_keys' => [
            'length', 'nullable', 'default:defaultValue',
        ],
    ],
    Title::class => [
        'type' => 'char',
        'property_keys' => [
            'length', 'nullable', 'default',
        ],
    ],

];
