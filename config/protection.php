<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Labs64 NetLicensing Connection Settings
    |--------------------------------------------------------------------------
    |
    | Your username and password for connecting with Labs64 NetLicensing RESTFul
    | If you don`t have account sign up in https://ui.netlicensing.io/#/register
    |
    */

    'connection' => [
        'username' => env('NETLICENSING_USERNAME', 'laravel'),
        'password' => env('NETLICENSING_PASSWORD', 'laravel'),
        'api_key' => env('NETLICENSING_APIKEY'),
        'security_mode' => env('NETLICENSING_SECURITY_MODE', 'APIKEY'), // Allowed values: BASIC_AUTH|APIKEY
    ],

    /*
    |--------------------------------------------------------------------------
    | App product number
    |--------------------------------------------------------------------------
    |
    | Your app product number
    | If you don`t have product, create a new product at https://ui.netlicensing.io/#/products
    |
    */

    'product_number' => env('NETLICENSING_PRODUCT_NUMBER'),


    'defaults' => [
        /**
         * If you enable auto licensee creation, the user model data will be transferred to create the licensee
         * By default:
         * Licensee Number -> user email
         * Licensee Name -> user name
         */
        'licensee' => [
            'number' => 'email',
            'name' => 'name'
        ],
        'shop' => [
            'success_url' => env('NETLICENSING_SHOP_SUCCESS_URL'),
            'success_url_title' => env('NETLICENSING_SHOP_SUCCESS_URL_TITLE', 'Return to Laravel Boilerplate'),
            'cancel_url' => env('NETLICENSING_SHOP_CANCEL_URL'),
            'cancel_url_title' => env('NETLICENSING_SHOP_CANCEL_URL_TITLE', 'Cancel and return to Laravel Boilerplate'),
        ]
    ],

    /**
     * Skip validation if user has one of the role(-s)
     */
    'except_roles' => ['administrator'],

    'membership' => [
        'product_module_number' =>  env('NETLICENSING_PRODUCT_MODULE_NUMBER'),
    ],

];
