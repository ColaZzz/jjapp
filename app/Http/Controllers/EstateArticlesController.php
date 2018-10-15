<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstateArticle;

class EstateArticlesController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $obj = new EstateArticle();
        $estateArticles = $obj->showAllRows($id);
        return $this->resData('返回全部数据', 1, $estateArticles);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $obj = new EstateArticle();
        $estateArticles = $obj->showRows($id);
        return $this->resData('返回全部数据', 1, $estateArticles);
    }
}
