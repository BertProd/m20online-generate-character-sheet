<?php

require_once __DIR__ . '/../vendor/autoload.php';

use DI\Container;
use Slim\Factory\AppFactory;

$container = new Container();

$settings = require __DIR__.'/../app/settings.php';
$settings($container);

AppFactory::setContainer($container);
$app = AppFactory::create();

$middleware = require __DIR__.'/../app/middleware.php';
$middleware($app);

$twig = require __DIR__.'/../app/twig.php';
$twig($container, $app);

$routes = require __DIR__.'/../app/routes.php';
$routes($app);

$app->run();
