<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '1001899014617-ijkifg7ecu377b0m729k6onqilesdbs3.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/google/callback',
    ],

    'facebook' => [
        'client_id' => '694538658796588',
        'client_secret' => 'ee885a84c08de9a6767482fbed6cbe31',
        'redirect' => 'http://127.0.0.1:8000/facebook/callback',
    ],

];
