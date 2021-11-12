<?php

use DI\Container;
use Slim\App;
use Slim\Views\Twig;

return function (Container $pContainer, App $pApp) {
    $settings = $pContainer->get('twig-settings');
    
    $twig = Twig::create($settings['paths'], $settings['options']);
    
    $pContainer->set('twig', $twig);
};
