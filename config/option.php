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

    'configurations' => [
        'uppercase' => [
            'description' => 'Capitalize all caracters',
            'removes' => [
                'lowercase', 'title', 'slug',
            ],
        ],
        'lowercase' => [
            'description' => 'Lowercase all caracters',
            'removes' => [
                'uppercase', 'title', 'slug',
            ],
        ],
        'title' => [
            'description' => 'Uppercase all first caracters',
            'removes' => [
                'uppercase',  'lowercase', 'slug',
            ],
        ],
        'slug' => [
            'description' => 'Transform the value into a slug',
            'removes' => [
                'uppercase',  'lowercase', 'title',
            ],
        ],
        'caracter_resize' => [
            'native' => 'caractere resize',
            'description' => 'Cut the value at the decided length',
            'removes' => [
                'word_resize', 'sentence_resize',
            ],
        ],
        'word_resize' => [
            'native' => 'word resize',
            'description' => 'Cut the value at the decided length, without cutting a word',
            'removes' => [
                'caracter_resize', 'sentence_resize',
            ],
        ],
        'sentence_resize' => [
            'native' => 'sentence resize',
            'description' => 'Cut the value at the decided length, without cutting a sentence',
            'removes' => [
                'caracter_resize', 'word_resize',
            ],
        ],
        'dots_on_resize' => [
            'native' => 'dots on resize',
            'description' => 'Add dots if the value is cut',
        ],
    ],

];
