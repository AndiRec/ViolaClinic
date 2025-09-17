<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | Used in notifications and other UI surfaces.
    |
    */

    'name' => env('APP_NAME', 'Beauty Clinic API'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Store in UTC in DB when possible, render in this TZ by default.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'Europe/Skopje'),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | Default UI locale and fallbacks. We also expose a list of
    | supported locales for validation/UI toggles.
    |
    */

    'locale' => env('APP_LOCALE', 'mk'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'mk_MK'),

    // Custom: languages you plan to support in the MVP
    'supported_locales' => ['mk', 'sq', 'en'],

    /*
    |--------------------------------------------------------------------------
    | Encryption
    |--------------------------------------------------------------------------
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

    /*
    |--------------------------------------------------------------------------
    | App Defaults (custom for project)
    |--------------------------------------------------------------------------
    |
    | Non-Laravel defaults helpful across the codebase.
    |
    */

    // Display/rounding defaults; money is still stored as minor units (ints)
    'default_currency' => env('APP_CURRENCY', 'MKD'),

];
