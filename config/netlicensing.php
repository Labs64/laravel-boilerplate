<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Labs64 NetLicensing Connection Settings
    |--------------------------------------------------------------------------
    |
    | Your username and password for connecting with Labs64 NetLicensing RESTFul
    | If you don`t have account sign up in https://go.netlicensing.io/console/v2/content/register.xhtml
    |
    */

    'connection' => [
        'username' => env('LABS64_NETLICENSING_USERNAME', 'demo'),
        'password' => env('LABS64_NETLICENSING_PASSWORD', 'demo'),
        'api_key' => env('LABS64_NETLICENSING_APIKEY'),
        'security_mode' => env('LABS64_NETLICENSING_SECURITY_MODE', 'BASIC_AUTH'),//Allowed: BASIC_AUTH|APIKEY
    ],

    /*
    |--------------------------------------------------------------------------
    | App product number
    |--------------------------------------------------------------------------
    |
    | Your app product number
    | If you don`t have product, create product in https://go.netlicensing.io/console/v2/content/vendor/product.xhtml
    |
    */

    'product_number' => env('LABS64_NETLICENSING_PRODUCT_NUMBER'),


    'defaults' => [
        /**
         * If you enable auto licensee creation, the user model data will be transferred to create the licensee
         * By default:
         * user id -> licensee number
         * user email ->licensee name
         */
        'licensee' => [
            'number' => 'id',
            'name' => 'email'
        ],
        'shop' => [
            'success_url' => env('LABS64_NETLICENSING_SHOP_SUCCESS_URL'),
            'success_url_title' => env('LABS64_NETLICENSING_SHOP_SUCCESS_URL_TITLE', 'Laravel 5 Labs64 Boilerplate'),
            'cancel_url' => env('LABS64_NETLICENSING_SHOP_CANCEL_URL'),
            'cancel_url_title' => env('LABS64_NETLICENSING_SHOP_CANCEL_URL_TITLE'),
        ]
    ],

    /**
     * Skip validation if user has role
     */
    'except_roles' => ['administrator'],

    'demo' => [
        'product_module_number' =>  env('LABS64_NETLICENSING_DEMO_PRODUCT_MODULE_NUMEBR'),
    ],
];