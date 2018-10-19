<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessArticleImage extends Model
{
    protected $table = 'business_article_image';

    public function businessArticle()
    {
        return $this->belongsTo('App\Models\BusinessArticle', 'business_article_id', 'id');
    }
}
