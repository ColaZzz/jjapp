<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estate;
use App\Models\EstateArticle;

class EstatesController extends Controller
{
    // 返回楼盘列表
    public function index()
    {
        try {
            $estates = Estate::orderBy('rank', 'desc')->paginate(5);
            return $this->resData('返回全部数据', 1, $estates);
        } catch (\Exception $e) {
            return $this->resData($e, 0);
        }
    }

    // 返回楼盘详情
    public function show(Request $request)
    {
        try {
            $id = $request->id;
            $estate = Estate::where('id', $id)->with(['estateImages' => function ($query) {
                $query->orderBy('rank', 'desc');
            }])->first();
            return $this->resData('返回id为' . $id . '的数据', '1', $estate);
        } catch (\Exception $e) {
            return $this->resData($e, 0);
        }
    }

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
}
