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
        'formater' => 'char',
    ],
    FirstName::class => [
        'formater' => 'firstname',
    ],
    LastName::class => [
        'formater' => 'lastname',
    ],
    Name::class => [
        'formater' => null,
    ],
    Slug::class => [
        'formater' => 'slug',
    ],
    TextEnum::class => [
        'formater' => 'randomElement',
    ],
    Title::class => [
        'formater' => 'catchPhrase',
    ],
    
];
