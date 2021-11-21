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
    Pattern::class => [
        'formater' => 'char',
    ],
    Slug::class => [
        'formater' => 'slug',
    ],
    Hexadecimal::class => [
        'formater' => 'hexadecimal',
    ],
    TextEnum::class => [
        'formater' => 'randomElement',
    ],
    Title::class => [
        'formater' => 'catchPhrase',
    ],

];
