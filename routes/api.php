<?php

use Illuminate\Http\Request;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'api.throttle',
    'limit' => config('api.rate_limits.access.limit'),
    'expires' => config('api.rate_limits.access.expires'),
], function ($api) {
    
    // JJmall
    $api->get('articles', 'ArticleController@index');
    $api->get('article', 'ArticleController@show');
    $api->get('mallswiper', 'MallController@index');
    $api->get('mallshops', 'ShopsController@index');
    $api->get('mallswiperes', 'ShopsController@swiperes');
    $api->get('malltopshopes', 'ShopsController@topshop');
    $api->get('mallbusinesses', 'ShopsController@business');
    $api->get('mallfloor', 'ShopsController@floor');
    $api->get('mallshop', 'ShopsController@shop');
    $api->get('mallcommodities', 'ShopsController@commodities');
    $api->get('mallcommodity', 'ShopsController@commodity');


    // 住宅
    $api->get('estates', 'EstatesController@index');
    $api->get('estate', 'EstatesController@show');
    $api->get('estatearticles', 'EstateArticlesController@index');
    $api->get('estatearticle', 'EstateArticlesController@show');
    $api->get('estatefilter', 'EstatesController@filter');

    // 随机推荐文章
    $api->get('randomarticles', 'ArticleController@randomArticles');
    $api->get('randomestates', 'EstatesController@randomEstate');
    $api->get('randomestatearticles', 'EstateArticlesController@randomEstateArticles');

    // 首页推荐
    $api->get('indexpage', 'IndexController@index');
    $api->get('indexcolumn', 'IndexController@column');

    // 地图
    $api->get('map', 'MapController@map');

    // 后台
    $api->get('selectionoftitle', 'EstatesController@showSelect');
    $api->get('selectionofshopfloor', 'ShopsController@showSelectFloor');
    $api->get('selectionofshopbusiness', 'ShopsController@showSelectBusiness');

    // 登录
    $api->post('login', 'UserController@login');

    // 联动
    $api->post('sendblocklist', 'BlockController@getInput');
    $api->post('personlinkages', 'BlockController@getPersonLinkages');
    $api->post('checkscancode', 'BlockController@checkScanToken');
    $api->post('checklinkagerole', 'UserController@checkLinkageRole');
    $api->post('scancodelinkage', 'BlockController@getLinkageInfo');
    $api->post('roleinfo', 'UserController@getRoleInfo');
    $api->post('insaccount', 'BlockController@insAccount');
    $api->get('estateroles', 'BlockController@getEstateRoles');
    $api->post('insapplyrole', 'BlockController@insApplyRole');
    $api->post('userroleapplies', 'BlockController@getUserRoleApplies');
    $api->post('checkapplyrole', 'BlockController@checkUserRole');
    $api->post('allapply', 'BlockController@getApplyList');
    $api->post('setapply', 'BlockController@editApply');
    $api->post('checktoken', 'UserController@checkToken');

    // 测试
    $api->post('test', 'UserController@getRoleInfo');

    // 其他
    $api->post('zhaoshang', 'TestController@test');

});

$api->version('v2', function ($api) {
    $api->get('version', function () {
        return response('this is version v2');
    });
});
