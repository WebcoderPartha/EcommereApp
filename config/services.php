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
        'client_id' => '604534060593-te498heabstu1pbjrfk9o5vrbta0qfdq.apps.googleusercontent.com',
        'client_secret' => 'shqItNCpB0S7k-yEwSFfqvVB',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ],
    'facebook' => [
        'client_id' => '944340552725505',
        'client_secret' => '5340f3db9d48f08102c9233705daa849',
        'redirect' => 'http://127.0.0.1:8000/callback/facebook',
    ],


];
