<?php

return [

    /* ------------------------------------------------------------------------------------------------
     |  Meta defaults
     | ------------------------------------------------------------------------------------------------
     | Meta defaults
     */

    'defaults' => [

        'title' => env('META_TITLE', config('app.name')),
        'description' => env('META_DESCRIPTION'),
        'keywords' => env('META_KEYWORDS'),
        'author' => env('META_AUTHOR'),
        'copyright' => env('META_COPYRIGHT'),
        'robots' => env('META_ROBOTS', 'INDEX, FOLLOW'),

        'og' => [
            'title' => env('META_OG_TITLE', config('app.name')),
            'image' => env('META_OG_IMAGE'),
            'description' => env('META_OG_DESCRIPTION'),
            'type' => env('META_OG_TYPE'),
            'site_name' => env('META_OG_SITE_NAME', config('app.name')),
        ],

        'twitter' => [
            'title' => env('META_TWITTER_TITLE', config('app.name')),
            'image' => env('META_TWITTER_IMAGE'),
            'description' => env('META_TWITTER_DESCRIPTION'),
            'card' => env('META_TWITTER_CARD'), // Available Settings: "summary", "summary_large_image", "app""
            'site' => env('META_TWITTER_SITE'),
            'creator' => env('META_TWITTER_CREATOR'),
        ],

        'dc' => [
            'title' => env('META_DC_TITLE', config('app.name')),
            'description' => env('META_DC_DESCRIPTION'),
            'subject' => env('META_DC_SUBJECT'),
            'identifier' => env('META_DC_IDENTIFIER', config('app.name')),
            'creator' => env('META_DC_CREATOR'),
            'publisher' => env('META_DC_PUBLISHER'),
            'rights_holder' => env('META_DC_RIGHTS_HOLDER'),
            'type' => env('META_DC_TYPE', 'Text'),
            'format' => env('META_DC_FORMAT', 'text/html'),
            'language' => env('META_DC_LANGUAGE', 'en'),
            'rights' => env('META_DC_RIGHTS'),
            'audience' => env('META_DC_AUDIENCE'),
        ]
    ],


    /* ------------------------------------------------------------------------------------------------
     |  Title suffix
     | ------------------------------------------------------------------------------------------------
     |
     | The suffix will be added to the title tag
     */
    'title_suffix' => env('META_TITLE_SUFFIX', '| ' . config('app.name')),
];