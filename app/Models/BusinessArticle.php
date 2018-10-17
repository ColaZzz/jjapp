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
    
    // 返回商业文章全部的信息
    public function showAllBusinessArticle()
    {
        $businessArticles = $this->get();
        return $businessArticles; 
    }
}
