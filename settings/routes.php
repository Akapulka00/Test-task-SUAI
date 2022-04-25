<?php

return [
    [
        'path' => '/',
        'method' => 'GET',
        'controller' => 'App\Controllers\IndexController::index'
    ],
    [
        'path' => '/registration',
        'method' => 'GET',
        'controller' => 'App\Controllers\ClimberController::showRegistrationForm'
    ],
    [
        'path' => '/registration',
        'method' => 'POST',
        'controller' => 'App\Controllers\ClimberController::addNewClimber'
    ],
    [
        'path' => '/signup',
        'method' => 'POST',
        'controller' => 'App\Controllers\ClimberController::signupClimber'
    ]
];