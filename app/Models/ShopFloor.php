<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopFloor extends Model
{
    protected $table = 'shop_floor';

    /**
     * 获取楼层模型
     */
    public function getFloor()
    {
        return $this
        ->orderBy('rank', 'desc')
        ->get();
    }
}
