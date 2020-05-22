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
            'name_first' => true,
            'fields' => [
                'firstname' => Laramore\Fields\FirstName::class,
                'lastname' => Laramore\Fields\LastName::class,
            ],
            'templates' => [
                'firstname' => 'first${name}',
                'lastname' => 'last${name}',
            ],
        ],
        'slug' => [
            'type' => 'slug',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
        'title' => [
            'type' => 'title',
            'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        ],
    ],
    
];
