<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('estates', EstateController::class);
    $router->resource('estateimages', EstateImageController::class);
    $router->resource('estatearticles', EstateArticleController::class);
    $router->resource('estatearticleimages', EstateArticleImageController::class);
    $router->resource('articles', ArticleController::class);
});
