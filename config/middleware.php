<?php

use Slim\App;
use Slim\Middleware\ErrorMiddleware;
use Selective\BasePath\BasePathMiddleware;


return function (App $app) {
    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    // Add the Slim built-in routing middleware
    $app->addRoutingMiddleware();

    $app->add(BasePathMiddleware::class); // <--- here

    // Catch exceptions and errors
    $app->add(ErrorMiddleware::class);
};