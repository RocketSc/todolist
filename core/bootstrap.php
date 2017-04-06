<?php

use \Core\Settings;
use \Core\Database\Connection;
use \Core\Database\QueryBuilder;



Settings::bind('config', require ROOT . 'config.php');

Settings::bind('database', new QueryBuilder(
    Connection::make(
        Settings::get('config')['database']
    )
));

function view($name, $data = [])
{
    extract($data);

    return require ROOT . '/app/views/' . $name . '.view.php';
}