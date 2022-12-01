<?php

use Illuminate\Support\Facades\Facade;

return [
    /*
    |--------------------------------------------------------------------------
    | API Version
    |--------------------------------------------------------------------------
    |
    | This value is the version of your API. This value is used when the
    | framework needs to place the API's version in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'api_version' => env('API_VERSION', 'v1'),
    'api_paginate' => env('API_PAGINATE', 10),
];
