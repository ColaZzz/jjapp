<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopBusiness extends Model
{
    protected $table = 'shop_business';

    /**
     * 获取业态模型
     */
    public function getBusiness()
    {
        return $this
        ->select('id','business_name','icon_url')
        ->orderBy('rank', 'desc')
        ->get();
    }
}
