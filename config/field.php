<?php

namespace Laramore\Fields;

use Illuminate\Support\Facades\Schema;

return [

    /*
    |--------------------------------------------------------------------------
    | Default text fields
    |--------------------------------------------------------------------------
    |
    | This option defines the default text fields.
    |
    */

    'configurations' => [
        Body::class => [
            'type' => 'char',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
        FirstName::class => [
            'type' => 'first_name',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
        LastName::class => [
            'type' => 'last_name',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
        Name::class => [
            'type' => 'composed',
            'max_length' => (Schema::getFacadeRoot()::$defaultStringLength * 2) + 1,
            'lastname_first' => true,
            'fields' => [
                'lastname' => LastName::class,
                'firstname' => FirstName::class,
            ],
            'templates' => [
                'lastname' => 'last${name}',
                'firstname' => 'first${name}',
            ],
            'patterns' => [ // Based also on https://www.utf8-chartable.de/.
                // Based on https://www.compart.com/en/unicode/category/Lu.
                'lastname' => '([A-ZÀ-ÖØ-Þ]+(?> [A-ZÀ-ÖØ-Þ]+)*)',
                // https://www.compart.com/en/unicode/category/Ll.
                'firstname' => '((?>[A-ZÀ-ÖØ-Þ][a-zß-öø-ÿ]+)(?> [A-ZÀ-ÖØ-Þc][a-zß-öø-ÿ]+)*)',
                'lastname_first' => '/^${lastname} ${firstname}$/u',
                'firstname_first' => '/^${firstname} ${lastname}$/u',
            ]
        ],
        Slug::class => [
            'type' => 'slug',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
        TextEnum::class => [
            'type' => 'text_enum',
        ],
        Title::class => [
            'type' => 'title',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
    ],
    
];
