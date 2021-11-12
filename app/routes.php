<?php

use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (App $pApp) {
    $pApp->get('/', function (Request $request, Response $response, array $args) {
        $twig = $this->get('twig');

        return $twig->render($response, 'layouts/index.html', []);
    });
};
