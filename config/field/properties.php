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

    Body::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required',
        ],
        'separator' => '-',
        'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
    ],
    FirstName::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required', 'title',
        ],
        'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
    ],
    LastName::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required', 'uppercase',
        ],
        'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
    ],
    Name::class => [
        'options' => [
            'visible', 'fillable', 'required',
        ],
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
            'lastname' => '([A-ZÀ-ÖØ-Þ]+(?>[ \'-][A-ZÀ-ÖØ-Þ]+)*)',
            // https://www.compart.com/en/unicode/category/Ll.
            'firstname' => '((?>[A-ZÀ-ÖØ-Þ][a-zß-öø-ÿ]*)(?>[ \'-][A-ZÀ-ÖØ-Þc][a-zß-öø-ÿ]*)*)',
            'lastname_first' => '/^${lastname} ${firstname}$/u',
            'firstname_first' => '/^${firstname} ${lastname}$/u',
            'flags' => null,
        ]
    ],
    Slug::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required', 'slug',
        ],
        'separator' => '-',
        'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
    ],
    Hexadecimal::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required', 'lowercase',
        ],
        'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
    ],
    TextEnum::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required',
        ],
        'migration_name' => 'char',
        'migration_property_keys' => [
            'length:maxLength', 'nullable', 'default',
        ],
    ],
    Title::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required', 'title',
        ],
        'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
    ],

];
