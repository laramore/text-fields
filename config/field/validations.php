<?php

namespace Laramore;


return [

    /*
    |--------------------------------------------------------------------------
    | Default text fields
    |--------------------------------------------------------------------------
    |
    | This option defines the default text fields.
    |
    */

    Fields\Body::class => [
        Validations\Text::class,
    ],
    Fields\FirstName::class => [
        Validations\Text::class,
    ],
    Fields\LastName::class => [
        Validations\Text::class,
    ],
    Fields\Name::class => [
        Validations\Text::class,
        Validations\Pattern::class,
    ],
    Fields\Pattern::class => [
        Validations\Text::class,
        Validations\Pattern::class,
    ],
    Fields\Slug::class => [
        Validations\Text::class,
    ],
    Fields\Hexadecimal::class => [
        Validations\Pattern::class,
        Validations\Pattern::class,
    ],
    Fields\TextEnum::class => [
        Validations\Exists::class,
    ],
    Fields\Title::class => [
        Validations\Text::class,
    ],

];
