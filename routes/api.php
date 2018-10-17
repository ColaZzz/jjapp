<?php

use Illuminate\Http\Request;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'api.throttle',
    'limit' => config('api.rate_limits.access.limit'),
    'expires' => config('api.rate_limits.access.expires'),
], function ($api) {
    $api->get('estates', 'EstatesController@index');
    $api->get('estate', 'EstatesController@show');
    $api->get('estatearticles', 'EstateArticlesController@index');
    $api->get('estatearticle', 'EstateArticlesController@show');

    // 后台
    $api->get('selectionoftitle', 'EstatesController@showSelect');
});

$api->version('v2', function ($api) {
    $api->get('version', function () {
        return response('this is version v2');
    });
});
