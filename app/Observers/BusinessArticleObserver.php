<?php
namespace App\Observers;

use App\Models\BusinessArticle;

class BusinessArticleObserver
{
    public function creating(BusinessArticle $businessArticle)
    {
        if(empty($businessArticle->flag)){
            $businessArticle->flag = 0;
        }
    }
}