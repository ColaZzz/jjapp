<?php

use Illuminate\Http\Request;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'api.throttle',
    'limit' => config('api.rate_limits.access.limit'),
    'expires' => config('api.rate_limits.access.expires'),
], function ($api) {
    // 商业
    $api->get('business', 'BusinessController@index');
    $api->get('businessarticles', 'BusinessArticleController@index');
    $api->get('businessarticle', 'BusinessArticleController@show');
    
    // 住宅
    $api->get('estates', 'EstatesController@index');
    $api->get('estate', 'EstatesController@show');
    $api->get('estatearticles', 'EstateArticlesController@index');
    $api->get('estatearticle', 'EstateArticlesController@show');

    // 首页推荐
    $api->get('indexpage', 'IndexController@index');
    $api->get('indexcolumn', 'IndexController@column');

    // 地图
    $api->get('map', 'IndexController@map');

    // 后台
    $api->get('selectionoftitle', 'EstatesController@showSelect');
});

$api->version('v2', function ($api) {
    $api->get('version', function () {
        return response('this is version v2');
    });
});