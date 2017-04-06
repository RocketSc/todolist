<?php

use Core\Router;

$router = new Router();

$router->get('/', 'PagesController@home');

$router->get('tasks', 'TasksController@index');
$router->get('tasks/done', 'TasksController@showCompleted');
$router->get('tasks/unfinished', 'TasksController@showUnfinished');
$router->post('tasks', 'TasksController@store');
$router->post('tasks/update', 'TasksController@update');