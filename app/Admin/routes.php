<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    // 楼盘
    $router->resource('estates', EstateController::class);
    // 楼盘图片
    $router->resource('estateimages', EstateImageController::class);
    // 户型
    $router->resource('estatearticles', EstateArticleController::class);
    // 户型图片
    $router->resource('estatearticleimages', EstateArticleImageController::class);
    // 资讯
    $router->resource('articles', ArticleController::class);
    // 联动单
    $router->resource('linkages', LinkageController::class);
    // 商铺
    $router->resource('shops', ShopController::class);
    // 楼层
    $router->resource('shopfloors', ShopFloorController::class);
    // 分类
    $router->resource('shopbusinesses', ShopBusinessController::class);
    // 招商
    $router->resource('investmentes', InvestmentController::class);
});
