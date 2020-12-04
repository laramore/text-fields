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
            'visible', 'fillable', 'required',
        ],
        'separator' => '-',
        'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        'proxy' => [
            'configurations' => [
                'dry' => [
                    'static' => true,
                    'allow_multi' => false,
                ],
                'hydrate' => [
                    'static' => true,
                    'allow_multi' => false,
                ],
                'resize' => [],
            ],
        ],
    ],
    FirstName::class => [
        'options' => [
            'visible', 'fillable', 'required', 'title',
        ],
        'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        'proxy' => [
            'configurations' => [
                'dry' => [
                    'static' => true,
                    'allow_multi' => false,
                ],
                'hydrate' => [
                    'static' => true,
                    'allow_multi' => false,
                ],
                'resize' => [],
            ],
        ],
    ],
    LastName::class => [
        'options' => [
            'visible', 'fillable', 'required', 'uppercase',
        ],
        'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        'proxy' => [
            'configurations' => [
                'dry' => [
                    'static' => true,
                    'allow_multi' => false,
                ],
                'hydrate' => [
                    'static' => true,
                    'allow_multi' => false,
                ],
                'resize' => [],
            ],
        ],
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
        ]
    ],
    Slug::class => [
        'options' => [
            'visible', 'fillable', 'required', 'slug',
        ],
        'separator' => '-',
        'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        'proxy' => [
            'configurations' => [
                'dry' => [
                    'static' => true,
                    'allow_multi' => false,
                ],
                'hydrate' => [
                    'static' => true,
                    'allow_multi' => false,
                ],
                'resize' => [],
            ],
        ],
    ],
    TextEnum::class => [
        'options' => [
            'visible', 'fillable', 'required',
        ],
        'migration_name' => 'char',
        'migration_property_keys' => [
            'length:maxLength', 'nullable', 'default',
        ],
    ],
    Title::class => [
        'options' => [
            'visible', 'fillable', 'required', 'title',
        ],
        'max_length' => Schema::getFacadeRoot()::$defaultStringLength,
        'proxy' => [
            'configurations' => [
                'dry' => [
                    'static' => true,
                    'allow_multi' => false,
                ],
                'hydrate' => [
                    'static' => true,
                    'allow_multi' => false,
                ],
                'resize' => [],
            ],
        ],
    ],
    
];
