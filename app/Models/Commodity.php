<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $table = 'commodities';

    public function commodityImages()
    {
        return $this->hasMany('App\Models\CommodityImage', 'commodity_id', 'id');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id', 'id');
    }

    /**
     * 获取店铺下的所有商品，并按rank排序
     */
    public function getCommodities($shop_id)
    {
        return $this
        ->where('shop_id', $shop_id)
        ->orderBy('rank', 'desc')
        ->get();
    }

    /**
     * 获取商品信息
     */
    public function getCommodity($id)
    {
        return $this
        ->where('id', $id)
        ->with(['commodityImages', 'shop'])
        ->first();
    }
}
