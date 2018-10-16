<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstateArticleImage extends Model
{
    protected $table = 'estate_article_images';

    public function estateArticle()
    {
        return $this->belongsTo('App\Models\EstateArticle', 'estatearticle_id', 'id');
    }

    public function estate()
    {
        return $this->belongsToThrough('App\Models\Estate', 'App\Models\EstateArticle', 'estatearticle_id', 'estate_id', 'id', 'id');
    }
}
