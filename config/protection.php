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
        'security_mode' => env('LABS64_NETLICENSING_SECURITY_MODE', 'APIKEY'), // Allowed values: BASIC_AUTH|APIKEY
    ],

    /*
    |--------------------------------------------------------------------------
    | App product number
    |--------------------------------------------------------------------------
    |
    | Your app product number
    | If you don`t have product, create a new product at https://go.netlicensing.io/console/v2/content/vendor/product.xhtml
    |
    */

    'product_number' => env('LABS64_NETLICENSING_PRODUCT_NUMBER'),


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
            'success_url' => env('LABS64_NETLICENSING_SHOP_SUCCESS_URL'),
            'success_url_title' => env('LABS64_NETLICENSING_SHOP_SUCCESS_URL_TITLE', 'Return to Laravel 5 Boilerplate'),
            'cancel_url' => env('LABS64_NETLICENSING_SHOP_CANCEL_URL'),
            'cancel_url_title' => env('LABS64_NETLICENSING_SHOP_CANCEL_URL_TITLE', 'Cancel and return to Laravel 5 Boilerplate'),
        ]
    ],

    /**
     * Skip validation if user has one of the role(-s)
     */
    'except_roles' => ['administrator'],

    'membership' => [
        'product_module_number' =>  env('LABS64_NETLICENSING_PRODUCT_MODULE_NUMBER'),
    ],

];
