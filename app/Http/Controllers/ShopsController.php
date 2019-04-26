<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Shop;
use App\Models\ShopBusiness;
use App\Models\ShopFloor;
use App\Models\Commodity;
use App\Models\Investment;
use Carbon\Carbon;

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
            $paginate = $request->paginate;
            $word = $request->word;
            $shop = new Shop();
            $shops = $shop->getShops($floor, $business, $paginate, $word);
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
            $paginate = $request->paginate;
            $time = $request->time;
            $rank = $request->rank;
            $shop = new Shop();
            $topshopes = $shop->getTopShop($paginate, $time, $rank);
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
     * 获取商铺下所有的商品
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

    /**
     * 后台商铺select选项接口
     */
    public function showSelectShop()
    {
        try {
            $shop = new Shop();
            $shops = $shop->getSelectShop();
            $rows = array();
            foreach ($shops as $shop) {
                $row['id'] = $shop->id;
                $row['text'] = $shop->title;
                array_push($rows, $row);
            }
            return $rows;
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }
    /**
     * 品牌招商页面
     */
    public function investmentView()
    {
        return view('mall.investment');
    }

    /**
     * 品牌招商数据存储
     */
    public function investmentStore(Request $request)
    {
        try {
            $this->validate($request, [
            'username' => 'required',
            'sex' => 'required',
            'number' => 'required',
            'business' => 'required',
            'brand' => 'required',
            'area' => 'required'
        ], [
            'username.required' => '姓名为空',
            'sex.required' => '性别没有选择',
            'number.required' => '联系方式为空',
            'business.required' => '经营业态为空',
            'brand.required' => '品牌名称为空',
            'area.required' => '铺位面积为空'
        ]);
            $investment = new Investment();

            $inves = $request->only(['username', 'sex', 'number', 'business', 'brand', 'area']);

            $path;
            $file = ['file' => ''];
            // 判断是否存在上传文件
            if ($request->has('file')) {
                if ($request->hasFile('file')) {
                    $path = $request->file->store('files', 'public');
                    $file = ['file' => $path];
                }
            }

            $created_at = ['created_at' => Carbon::now()->toDateTimeString()];
            $ins = array_merge($inves, $file, $created_at);
            $investment->insert($ins);

            return view('mall.success_result');
        } catch (\Exception $e) {
            return view('mall.fail_result');
        }
    }

    /**
     * 店铺搜索
     */
    public function searchShop(Request $request)
    {
        try {
            $word = $request->word;
            $paginate = $request->paginate;
            $shop = new Shop();
            $shopList = $shop->searchShop($word, $paginate);
            return $this->resData('success', 1, $shopList);
        } catch (\Expection $e) {
            return $this->resData('bug', 0, $e);
        }
    }
}
