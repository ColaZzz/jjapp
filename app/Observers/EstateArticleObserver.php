<?php
namespace App\Observers;

use App\Models\EstateArticle;

class EstateArticleObserver
{
    public function creating(EstateArticle $estateArticle)
    {
        if(empty($estateArticle->flag)){
            $estateArticle->flag = 1;
        }
    }
}