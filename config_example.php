<?php

return [
    'database' => [
        'name' => 'dbname',
        'username' => 'username',
        'password' => 'userpass',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
