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
    ],
    FirstName::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required', 'title',
        ],
    ],
    LastName::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required', 'uppercase',
        ],
    ],
    Name::class => [
        'options' => [
            'visible', 'fillable', 'required',
        ],
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
    Pattern::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required', 'uppercase',
        ],
    ],
    Slug::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required', 'slug',
        ],
        'separator' => '-',
    ],
    Hexadecimal::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required', 'lowercase',
        ],
    ],
    TextEnum::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required',
        ],
    ],
    Title::class => [
        'options' => [
            'select', 'visible', 'fillable', 'required', 'title',
        ],
    ],

];
