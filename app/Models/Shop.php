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
    public function getShops($floor, $business, $paginate, $word)
    {
        if (!$paginate) {
            $paginate = 8;
        }
        return $this
        ->with(['business:id,business_name','floor:id,floor_name'])
        ->select('id', 'title', 'subtitle', 'img_url', 'shop_business_id', 'shop_floor_id', 'rank')
        ->when($floor, function ($query) use ($floor) {
            return $query->where('shop_floor_id', $floor);
        })
        ->when($business, function ($query) use ($business) {
            return $query->where('shop_business_id', $business);
        })
        ->when($word, function ($query) use ($word) {
            return $query->where('title', 'like', '%'.$word.'%');
        })
        ->orderBy('rank', 'desc')
        ->paginate($paginate);
    }

    /**
     * 获取轮播图数据
     */
    public function getSwiperes()
    {
        return $this
        ->select('id', 'img_url', 'title', 'subtitle')
        ->where('indexpage', '1')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();
    }

    /**
     * 获取主力商铺
     */
    public function getTopShop($paginate, $time, $rank)
    {
        return $this
        ->select('id', 'title', 'subtitle', 'img_url', 'icon_url')
        ->where('type_top', '1')
        ->when($time, function ($query) use ($time) {
            return $query->orderby('created_at', $time);
        })
        ->when($rank, function ($query) use ($rank) {
            return $query->orderby('rank', $rank);
        })
        ->paginate($paginate);
    }

    /**
     * 获取店铺详细信息
     */
    public function getShop($id)
    {
        return $this
        ->with('business')
        ->with('floor')
        ->where('id', $id)
        ->first();
    }

    /**
     * 店铺搜索
     */
    public function searchShop($word, $paginate)
    {
        if (!$paginate) {
            $paginate = 8;
        }
        return $this
        ->select('id', 'title', 'subtitle', 'img_url')
        ->where('title', 'like', '%'.$word.'%')
        ->paginate($paginate);
    }
}
