<?php

use M20OnlineCore\Builder\CharacterBuilder;
use M20OnlineCore\Job\JobIterator;
use M20OnlineCore\Race\RaceIterator;
use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (App $pApp) {
    $pApp->get('/', function (Request $request, Response $response, array $args) {
        $twig = $this->get('twig');

        return $twig->render($response, 'layouts/index.html', [
            'jobIterator' => new JobIterator(),
            'raceIterator' => new RaceIterator()
        ]);
    });

    $pApp->post('/generate', function (Request $request, Response $response, array $args) {
        $twig = $this->get('twig');

        $data = $request->getParsedBody();

        $builder = new CharacterBuilder();

        $character = $builder->build($data['race'], $data['job']);

        return $twig->render($response, 'layouts/generate.html', [
            'character' => $character,
            'name' => $data['name']
        ]);
    });
};
