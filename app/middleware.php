<?php

use Slim\App;

return function (App $pApp) {
    $settings = $pApp->getContainer()->get('errors-settings');
    
    $pApp->addErrorMiddleware(
        $settings['displayErrorDetails'],
        $settings['logErrors'],
        $settings['logErrorDetails']
    );
};