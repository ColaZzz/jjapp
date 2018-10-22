<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessArticle extends Model
{
    protected $table = 'business_article';
    
    public function business()
    {
        return $this->belongsTo('App\Models\Business', 'business_id', 'id');
    }

    public function businessArticleImages()
    {
        return $this->hasMany('App\Models\BusinessArticleImage', 'business_article_id', 'id');
    }
    
    // 返回商业文章全部的信息
    public function showAllBusinessArticle($id)
    {
        $businessArticles = $this->orderBy('rank', 'desc')->where('business_id', $id)->get();
        return $businessArticles; 
    }

    //返回商业文章的信息
    public function showRows($id)
    {
        $row = $this->find($id);
        $row->businessArticleImages;
        $row->business;
        return $row;
    }
}
