<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * 获取不同类型的文章
     * @param int $type 文章类型
     */
    public function getArticleForType($type, $time, $rank)
    {
        $primary;
        if($time || $rank){
            $primary = false;
        }else{
            $primary = 'desc';
        }
        return $this->where('type', $type)
        ->when($primary, function($query) use ($primary){
            return $query->orderBy('created_at', 'desc');
        })
        ->when($time, function($query) use ($time){
            return $query->orderBy('created_at', $time);
        })
        ->when($rank, function($query) use ($rank){
            return $query->orderBy('rank', $rank);
        })
        ->paginate(5);
    }

    /**
     * 获取文章的详细信息
     * @param int $id ID
     */
    public function getArticle($id)
    {
        return $this->where('id', $id)->first();
    }
}
