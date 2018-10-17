<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstateArticleImage extends Model
{
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $table = 'estate_article_images';

    public function estateArticle()
    {
        return $this->belongsTo('App\Models\EstateArticle', 'estate_article_id', 'id');
    }

    public function estate()
    {
        return $this->belongsToThrough('App\Models\Estate', 'App\Models\EstateArticle');
    }
}
