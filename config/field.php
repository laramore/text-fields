<?php

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
        'body' => [
            'type' => 'char',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
        'first_name' => [
            'type' => 'first_name',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
        'last_name' => [
            'type' => 'last_name',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
        'name' => [
            'type' => 'composed',
            'max_length' => (Schema::getFacadeRoot()::$defaultStringLength * 2) + 1,
            'lastname_first' => true,
            'fields' => [
                'lastname' => Laramore\Fields\LastName::class,
                'firstname' => Laramore\Fields\FirstName::class,
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
        'slug' => [
            'type' => 'slug',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
        'text_enum' => [
            'type' => 'text_enum',
        ],
        'title' => [
            'type' => 'title',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
    ],
    
];
