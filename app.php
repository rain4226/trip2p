<?php

/**
 * Add your routes here
 */
$app->get('/', function () use ($app) {
    $app['view']->page = 'pages/index';
    echo $app['view']->render('layout');
});

$app->get('/{filename:[A-Za-z\-]+}\.html', function ($filename) use ($app) {
    $app['view']->page = 'pages/'.$filename;
    
    $app['view']->name = 10;
    
    echo $app['view']->render('layout');
});



/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app['view']->render('404');
});


