<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        try {
            $type = $request->type;
            $time = $request->time;
            $rank = $request->rank;
            $art = new Article();
            $articles = $art->getArticleForType($type, $time, $rank);
            return $this->resData('返回成功', 1, $articles);
        } catch (\Exception $e) {
            return $this->resData('返回失败', 0, $e);
        }
    }

    public function show(Request $request)
    {
        try {
            $id = $request->id;
            $art = new Article();
            $article = $art->getArticle($id);
            return $this->resData('返回成功', 1, $article);
        } catch (\Exception $e) {
            return $this->resData('返回失败', 0, $e);
        }
    }

    public function randomArticles(Request $request)
    {
        try {
            $rows = $request->rows;
            $art = new Article();
            $articles = $art->randomArticles($rows);
            return $this->resData('返回成功', 1, $articles);
        } catch (\Exception $e) {
            return $this->resData('返回失败', 0, $e);
        }
    }
}
