<?php

use Psr\Container\ContainerInterface;

return function (ContainerInterface $pContainer) {
    $pContainer->set('errors-settings', function () {
        return [
            'displayErrorDetails' => true,
            'logErrors' => true,
            'logErrorDetails' => true
        ];
    });

    $pContainer->set('twig-settings', function () {
        return [
            'paths' => [
                __DIR__ . '/../resources/views'
            ],
            'options' => [
                'cache_enabled' => false,
                'cache_path' => __DIR__ . '/../cache'
            ]
        ];
    });
};
