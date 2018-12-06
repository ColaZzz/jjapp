<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Linkage;

class TestController extends Controller
{
    public function test()
    {
        $l = new Linkage();
        return $this->resData('返回'.count($l->firstVisit(1)).'条相关数据',1,$l->firstVisit(1));
    }
}
