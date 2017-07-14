<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '208103046541-nncl466j112hc3s4dl5ub3qgu8ls0n6s.apps.googleusercontent.com',
        'client_secret' => 'tH010txPZ4kDtVvU0ETc8E_Z',
        'redirect' => 'http://bet322.herokuapp.com/auth/google/callback',
    ],

    'facebook' => [
        'client_id' => '1380705268679218',
        'client_secret' => '6ee063c4227c8ffbcf915e4551927a03',
        'redirect' => 'http://bet322.herokuapp.com/auth/facebook/callback',
    ],
];
