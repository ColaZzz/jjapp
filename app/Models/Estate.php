<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    public function estateImages()
    {
        return $this->hasMany('App\Models\EstateImage', 'estate_id', 'id');
    }

    public function showSelect()
    {
        return $this->pluck('title', 'id');
    }

    // 远程关联 EstateArticleImage
    public function estateArticleImages()
    {
        return $this->hasManyThrough('EstateArticleImage', 'EstateArticle', 'estate_id', 'estate_article_id', 'id', 'id');
    }
}