<?php

return [

    'login' => [
        'validation_rule' => [
            'name' => 'required',
            'password' => 'required'
        ]
    ],

    'sign_up' => [
        'release_token' => env('SIGN_UP_RELEASE_TOKEN'),
        'validation_rule' => [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ],
    ],

    'forgot_password' => [
        'validation_rule' => [
            'email' => 'required|email'
        ]
    ],

    'rest_password' => [
        'release_token' => env('PASSWORD_RESET_RELEASE_TOKEN'),
        'validation_rule' => [
            'token' => 'required',
            'email' => 'required|email',
            'passwrod' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]
    ]

];