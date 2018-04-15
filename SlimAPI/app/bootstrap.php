<?php

require_once '../vendor/autoload.php';

$container = new \Slim\Container;

$container['db'] = function () {
    return new PDO('mysql:host=127.0.0.1;dbname=ForumAPI', 'root', '');
};

$app = new \App\App($container);

require_once 'routes.php';
