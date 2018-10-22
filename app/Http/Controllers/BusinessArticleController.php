<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessArticle;

class BusinessArticleController extends Controller
{
    public function index(Request $request)
    {
        try {
            $id = $request->id;
            $BusinessArticle = new BusinessArticle();
            $businessArticles = $BusinessArticle->showAllBusinessArticle($id);
            return $this->resData('返回商业全部文章', 1, $businessArticles);
        } catch (\Exception $e) {
            return $this->resData($e, 0);
        }
    }

    public function show(Request $request)
    {
        try{
            $id = $request->id;
            $obj = new BusinessArticle();
            $businessArticle = $obj->showRows($id);
            return $this->resData('返回商业文章', 1, $businessArticle);
        }catch(\Exception $e){
            return $this->resData($e, 0);
        }
    }
}
