<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'business';
    
    public function businessArticles()
    {
        return $this->hasMany('App\Models\BusinessArticle', 'business_id', 'id');
    }
    
    /**
     * 返回商业列表全部的信息
     * @return array 返回类型
     */
    public function showAllBusiness()
    {
        $businesses = $this->get();
        return $businesses; 
    }
}
