<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
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
