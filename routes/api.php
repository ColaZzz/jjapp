<?php

use Illuminate\Http\Request;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers'
], function ($api) {
    $api->get('estates', 'EstatesController@index');
    $api->get('estate', 'EstatesController@show');
    $api->get('estatearticles', 'EstateArticlesController@index');
    $api->get('estatearticle', 'EstateArticlesController@show');
});

$api->version('v2', function ($api) {
    $api->get('version', function () {
        return response('this is version v2');
    });
});
