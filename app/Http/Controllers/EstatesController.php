<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estate;
use App\Models\EstateArticle;

class EstatesController extends Controller
{
    // 返回楼盘列表
    public function index(Request $request)
    {
        try {
            $state = $request->state;
            $priceRank = $request->priceRank;
            $estateObj = new Estate();
            $estates = $estateObj->estateFilter($state, $priceRank);
            return $this->resData('返回楼盘列表', 1, $estates);
        } catch (\Exception $e) {
            return $this->resData($e, 0);
        }
    }

    // 返回楼盘详情
    public function show(Request $request)
    {
        try {
            $estateObj = new Estate();
            $id = $request->id;
            $estate = $estateObj->showEstate($id);
            return $this->resData('返回id为' . $id . '的数据', 1, $estate);
        } catch (\Exception $e) {
            return $this->resData($e, 0);
        }
    }

    // 后台选项
    public function showSelect()
    {
        $estates = Estate::get();
        $rows = array();
        foreach ($estates as $estate) {
            $row['id'] = $estate->id;
            $row['text'] = $estate->title;
            array_push($rows, $row);
        }
        return $rows;
    }

    // 后台选项
    public function showSelectArticle()
    {
        $estateArticles = EstateArticle::get();
        $rows = array();
        foreach ($estateArticles as $estateArticle) {
            $row['id'] = $estateArticles->id;
            $row['text'] = $estateArticles->title;
            array_push($rows, $row);
        }
        return $rows;
    }

    // 楼盘筛选
    public function filter(Request $request)
    {
        try{
            $state = $request->state;
            $priceRank = $request->priceRank;
            $estateObj = new Estate();
            $estates = $estateObj->estateFilter($state, $priceRank);
            return $this->resData($state, 1, $estates);
        }catch(\Exception $e){
            return $this->resData($e, 0);
        }
    }

    // 楼盘随机推荐
    public function randomEstate(Request $request)
    {
        try {
            $rows = $request->rows;
            $e = new Estate();
            $estates = $e->randomEstate($rows);
            return $this->resData('返回成功', 1, $estates);
        } catch (\Exception $e) {
            return $this->resData('返回失败', 0, $e);
        }
    }
}
