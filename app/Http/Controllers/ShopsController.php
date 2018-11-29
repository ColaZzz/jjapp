<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\ShopBusiness;
use App\Models\ShopFloor;
use App\Models\Commodity;

class ShopsController extends Controller
{
    /**
     * 楼层或业态分类
     */
    public function index(Request $request)
    {
        try {
            $floor = $request->floor;
            $business = $request->business;
            $shop = new Shop();
            $shops = $shop->getShops($floor, $business);
            return $this->resData('返回', 1, $shops);
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 获取轮播图数据
     */
    public function swiperes(Request $request)
    {
        try {
            $shop = new Shop();
            $swiperes = $shop->getSwiperes();
            return $this->resData('返回', 1, $swiperes);
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 获取主力店铺
     */
    public function topshop(Request $request)
    {
        try {
            $shop = new Shop();
            $topshopes = $shop->getTopShop();
            return $this->resData('返回', 1, $topshopes);
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 获取业态模型
     */
    public function business()
    {
        try {
            $business = new ShopBusiness();
            $businesses = $business->getBusiness();
            return $this->resData('返回', 1, $businesses);
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 获取楼层模型
     */
    public function floor()
    {
        try {
            $shopfloor = new ShopFloor();
            $shopfloores = $shopfloor->getFloor();
            return $this->resData('返回', 1, $shopfloores);
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 获取楼层详细信息
     */
    public function shop(Request $request)
    {
        try {
            $id = $request->id;
            $shopObj = new Shop();
            $shop = $shopObj->getShop($id);
            return $this->resData('返回', 1, $shop);
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 获取商铺下所有的商铺
     */
    public function commodities(Request $request)
    {
        try {
            $id = $request->id;
            $commodity = new Commodity();
            $commodities = $commodity->getCommodities($id);
            return $this->resData('返回', 1, $commodities);
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 获取商品信息
     */
    public function commodity(Request $request)
    {
        try {
            $id = $request->id;
            $commodityObj = new Commodity();
            $commodity = $commodityObj->getCommodity($id);
            return $this->resData('返回', 1, $commodity);
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 后台楼层接口
     */
    public function showSelectFloor()
    {
        try {
            $shopfloor = new ShopFloor();
            $shopfloores = $shopfloor->getFloor();
            $rows = array();
            foreach ($shopfloores as $floor) {
                $row['id'] = $floor->id;
                $row['text'] = $floor->floor_name;
                array_push($rows, $row);
            }
            return $rows;
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }

    /**
     * 后台分类接口
     */
    public function showSelectBusiness()
    {
        try {
            $business = new ShopBusiness();
            $businesses = $business->getBusiness();
            $rows = array();
            foreach ($businesses as $business) {
                $row['id'] = $business->id;
                $row['text'] = $business->business_name;
                array_push($rows, $row);
            }
            return $rows;
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }
}
