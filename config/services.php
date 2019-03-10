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
        'region' => env('SES_REGION', 'us-east-1'),
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
       'client_id' => '997109552816-h1d7uvu4o0j1asn5q18fb244tm0gcfci.apps.googleusercontent.com',
       'client_secret' => 'GoQ6jQBc6z3RvCm0ay2VvKUx',
       'redirect' => 'https://ayojok.com/login/google/callback',
   ],

   'facebook' => [
       'client_id' => '1522119087932263',
       'client_secret' => 'dab5006761762d95f465818c2a94bdd4',
       'redirect' => 'https://ayojok.com/login/facebook/callback',
   ],

];
