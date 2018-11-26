<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    /**
     * 关联关系
     */
    public function business()
    {
        return $this->belongsTo('App\Models\ShopBusiness', 'shop_business_id', 'id');
    }

    /**
     * 关联关系
     */
    public function floor()
    {
        return $this->belongsTo('App\Models\ShopFloor', 'shop_floor_id', 'id');
    }

    /**
     * 楼层或业态分类
     */
    public function getShops($floor, $business)
    {
        return $this
        ->with('business')
        ->with('floor')
        ->when($floor, function($query) use ($floor){
            return $query->where('shop_floor_id', $floor);
        })
        ->when($business, function($query) use ($business){
            return $query->where('shop_business_id', $business);
        })
        ->orderBy('rank', 'desc')
        ->get();
    }

    /**
     * 获取轮播图数据
     */
    public function getSwiperes()
    {
        return $this
        ->where('indexpage', '1')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();
    }

    /**
     * 获取主力商铺
     */
    public function getTopShop()
    {
        return $this
        ->where('type_top', '1')
        ->orderBy('rank', 'desc')
        ->get();
    }
}
