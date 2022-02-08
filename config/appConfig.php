<?php

error_reporting(0);
ini_set('display_errors', 0);

define('APPLICATION_NAME', 'Address Book');

$configs = [
    'path' => [
        'PATH_APPLICATION' => __DIR__ . '/../application/',
        'PATH_VIEWS' => __DIR__ . '/../application/Views/',
        'PATH_ADDRESS' => 'http://localhost/address-book',
    ],

    'address' => [
        'DB_TYPE' => 'mysql',
        'DB_HOST' => 'localhost',
        'DB_PORT' => '3306',
        'DB_NAME' => 'address_book',
        'DB_USER' => 'root',
        'DB_PASSWORD' => '',
        'DB_CHAR_SET' => 'utf-8'
    ]
];

foreach ($configs as $config) {
    foreach ($config as $key => $value) {
        define($key, $value);
    }
}