<?php

return [
    [
        'path' => '/',
        'method' => 'GET',
        'controller' => 'App\Controllers\IndexController::index'
    ],
    [
    'path' => '/table1',
    'method' => 'GET',
    'controller' => 'App\Controllers\suaiController::getTable1'
    ],
  [
    'path' => '/table2',
    'method' => 'GET',
    'controller' => 'App\Controllers\suaiController::getTable2'
  ],
  [
    'path' => '/table3',
    'method' => 'GET',
    'controller' => 'App\Controllers\suaiController::getTable3'
  ],
  [
    'path' => '/table4',
    'method' => 'GET',
    'controller' => 'App\Controllers\suaiController::getTable4'
  ],
    [
        'path' => '/table5',
        'method' => 'GET',
        'controller' => 'App\Controllers\suaiController::getTable5'
    ],
    [
        'path' => '/table6',
        'method' => 'GET',
        'controller' => 'App\Controllers\suaiController::getTable6'
    ],
    [
    'path' => '/table1-post',
    'method' => 'POST',
    'controller' => 'App\Controllers\suaiController::getTable1_by_ID'
],
    [
        'path' => '/table2-post',
        'method' => 'POST',
        'controller' => 'App\Controllers\suaiController::getTable2_by_ID'
    ],
    [
        'path' => '/table3-post',
        'method' => 'POST',
        'controller' => 'App\Controllers\suaiController::getTable3_by_ID'
    ],
    [
        'path' => '/table4-post',
        'method' => 'POST',
        'controller' => 'App\Controllers\suaiController::getTable4_by_ID'
    ],
    [
        'path' => '/table5-post',
        'method' => 'POST',
        'controller' => 'App\Controllers\suaiController::getTable5_by_ID'
    ],
    [
        'path' => '/table6-post',
        'method' => 'POST',
        'controller' => 'App\Controllers\suaiController::getTable6_by_ID'
    ],
];
