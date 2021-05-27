<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default options
    |--------------------------------------------------------------------------
    |
    | This option defines the default options used in fields.
    |
    */

    'uppercase' => [
        'description' => 'Capitalize all caracters',
        'remove' => [
            'lowercase', 'title', 'slug',
        ],
    ],
    'lowercase' => [
        'description' => 'Lowercase all caracters',
        'remove' => [
            'uppercase', 'title', 'slug',
        ],
    ],
    'title' => [
        'description' => 'Uppercase all first caracters',
        'remove' => [
            'uppercase',  'lowercase', 'slug',
        ],
    ],
    'slug' => [
        'description' => 'Transform the value into a slug',
        'remove' => [
            'uppercase',  'lowercase', 'title',
        ],
    ],
    'caracter_resize' => [
        'native' => 'caractere resize',
        'description' => 'Cut the value at the decided length',
        'remove' => [
            'word_resize', 'sentence_resize',
        ],
    ],
    'word_resize' => [
        'native' => 'word resize',
        'description' => 'Cut the value at the decided length, without cutting a word',
        'remove' => [
            'caracter_resize', 'sentence_resize',
        ],
    ],
    'sentence_resize' => [
        'native' => 'sentence resize',
        'description' => 'Cut the value at the decided length, without cutting a sentence',
        'remove' => [
            'caracter_resize', 'word_resize',
        ],
    ],
    'dots_on_resize' => [
        'native' => 'dots on resize',
        'description' => 'Add dots if the value is cut',
    ],

];
