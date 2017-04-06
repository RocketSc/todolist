<?php
define('ROOT',$_SERVER['DOCUMENT_ROOT'] . '/');
require ROOT . '/vendor/autoload.php';

use Core\Router;
use Core\Request;

$db = require ROOT . 'core/bootstrap.php';

Router::load(ROOT . 'app/routes.php')
    ->direct( Request::uri(), Request::method() );