<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class MallController extends Controller
{
    public function index()
    {
        try{
            $art = new Article();
            $swiperes = $art->getSwiper();
            return $this->resData('返回数据', 1, $swiperes);
        }catch(\Exception $e){
            return $this->resData('返回失败', 0, $e);
        }
    }
}
