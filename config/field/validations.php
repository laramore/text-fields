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

    ],
    FirstName::class => [

    ],
    LastName::class => [

    ],
    Name::class => [
        \Laramore\Validations\Pattern::class => [],
    ],
    Slug::class => [

    ],
    TextEnum::class => [

    ],
    Title::class => [

    ],
    
];
