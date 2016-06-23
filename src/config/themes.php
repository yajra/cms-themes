<?php

return [
    /*
    |--------------------------------------------------------------------------
    | CMS Themes Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application theme is currently
    | running in. This may determine how you prefer to configure various
    | theme of your application.
    |
    */

    'backend'  => env('THEME_BACKEND', 'default'),
    'frontend' => env('THEME_FRONTEND', 'default'),

    /*
    |--------------------------------------------------------------------------
    | CMS Themes Path
    |--------------------------------------------------------------------------
    |
    | Base path where all installed themes are scanned and registered.
    | Just add a "theme.json" file on your theme directory and it
    | will automatically be registered on the cms.
    |
    */

    'path' => [
        'backend'  => base_path('themes/backend'),
        'frontend' => base_path('themes/frontend'),
    ],
];
