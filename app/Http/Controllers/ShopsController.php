<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\ShopBusiness;
use App\Models\ShopFloor;

class ShopsController extends Controller
{
    /**
     * 楼层或业态分类
     */
    public function index(Request $request)
    {
        try{
            $floor = $request->floor;
            $business = $request->business;
            $shop = new Shop();
            $shops = $shop->getShops($floor, $business);
            return $this->resData('返回', 1, $shops);
        }catch(\Expection $e){
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 获取轮播图数据
     */
    public function swiperes(Request $request)
    {
        try{
            $shop = new Shop();
            $swiperes = $shop->getSwiperes();
            return $this->resData('返回', 1, $swiperes);
        }catch(\Expection $e){
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 获取主力店铺
     */
    public function topshop(Request $request)
    {
        try{
            $shop = new Shop();
            $topshopes = $shop->getTopShop();
            return $this->resData('返回', 1, $topshopes);
        }catch(\Expection $e){
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 获取业态模型
     */
    public function business()
    {
        try{
            $business = new ShopBusiness();
            $businesses = $business->getBusiness();
            return $this->resData('返回', 1, $businesses);
        }catch(\Expection $e){
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 获取楼层模型
     */
    public function floor()
    {
        try{
            $shopfloor = new ShopFloor();
            $shopfloores = $shopfloor->getFloor();
            return $this->resData('返回', 1, $shopfloores);
        }catch(\Expection $e){
            return $this->resData('bug', 0, $e);
        }
    }
}
