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
    Slug::class => [
        'formater' => 'slug',
    ],
    TextEnum::class => [
        'formater' => 'enum',
    ],
    Title::class => [
        'formater' => 'catchPhrase',
    ],
    
];
