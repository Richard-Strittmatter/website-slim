<?php

use Slim\App;
use App\Action\HomeAction;
use App\Action\AboutAction;
use App\Action\ContactAction;
use App\Action\ContactSubmitAction;

return function (App $app) {
    $app->get('/', HomeAction::class)->setName('home');
    $app->get('/about', AboutAction::class)->setName('about');
    $app->get('/contact', ContactAction::class)->setName('contact');
    $app->post('/contact', ContactSubmitAction::class);

};