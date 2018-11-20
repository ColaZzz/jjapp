<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstateArticle;

class IndexController extends Controller
{
    // 获取首页数据--轮播图
    public function index()
    {
        $list = \DB::select('select * 
        from(
            select id,title,subtitle,flag,created_at,rank,indexpage,img_url 
            from articles
            union 
            select id,title,subtitle,flag,created_at,rank,indexpage,img_url
            from estate_article
            ) as a 
            where indexpage=1
            order by created_at 
            desc 
            limit 5');

        return $this->resData('返回轮播图数据', 1, $list);
    }

    // 获取专栏数据
    public function column()
    {
        $list = \DB::select('select * 
        from(
            select id,title,flag,img_url,rank 
            from articles 
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
}
