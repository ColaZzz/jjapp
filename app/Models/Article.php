<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * 获取不同类型的文章
     * @param int $type 文章类型
     */
    public function getArticleForType($type, $time, $rank, $paginate)
    {
        $primary = null;
        if ($time || $rank) {
            $primary = false;
        } else {
            $primary = 'desc';
        }
        // 判断分页数
        if(!$paginate){
            $paginate = 8;
        }
        return $this
        ->select('id','title','subtitle','img_url')
        ->when($type, function ($query) use ($type) {
            return $query->where('type', $type);
        })
        ->when($primary, function ($query) use ($primary) {
            return $query->orderBy('created_at', 'desc');
        })
        ->when($time, function ($query) use ($time) {
            return $query->orderBy('created_at', $time);
        })
        ->when($rank, function ($query) use ($rank) {
            return $query->orderBy('rank', $rank);
        })
        ->paginate($paginate);
    }

    /**
     * 获取文章的详细信息
     * @param int $id ID
     */
    public function getArticle($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * 获取mall轮播图的数据
     */
    public function getSwiper()
    {
        return $this->orderBy('created_at', 'desc')->limit(5)->get();
    }

    /**
     * 随机推荐文章
     * @param int $rows 获取随机的行数
     */
    public function randomArticles($rows)
    {
        return $this->where('state', '!=', '已结束')->inRandomOrder()->limit($rows)->get();
    }
}
