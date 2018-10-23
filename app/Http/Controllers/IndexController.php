<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstateArticle;
use App\Models\BusinessArticle;

class IndexController extends Controller
{
    // 获取首页数据--轮播图
    public function index()
    {
        $list = \DB::select('select * 
        from(
            select id,subtitle,flag,img_url,updated_at,indexpage 
            from business_article 
            union 
            select id,subtitle,flag,img_url,updated_at,indexpage 
            from estate_article
            ) as a 
            where indexpage=1
            order by updated_at 
            desc 
            limit 4');

        return $this->resData('返回轮播图数据', 1, $list);
    }

    // 获取专栏数据
    public function column()
    {
        $list = \DB::select('select * 
        from(
            select id,title,flag,img_url,rank 
            from business 
            union 
            select id,title,flag,img_url,rank 
            from estates
            ) as a 
            order by 
            rank 
            desc 
            limit 4');

        return $this->resData('返回轮播图数据', 1, $list);
    }

    // 获取地图标记数据
    public function map()
    {
        $list = \DB::select('select * 
        from(
            select id,title,img_url,latitude,longitude,flag 
            from business 
            union 
            select id,title,img_url,latitude,longitude,flag 
            from estates
            ) as a
            where latitude is not null and longitude is not null');

        return $this->resData('返回轮播图数据', 1, $list);
    }
}
