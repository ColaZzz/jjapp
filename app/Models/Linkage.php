<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Linkage extends Model
{
    /**
     * 关联关系
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * 生成二位码密钥，给予集团人员确认电商人员
     */
    public function generateKey($id)
    {
        $key = md5(uniqid());
        Cache::put($key, $id, 4320);
        return $key;
    }

    public function getRecordId($key)
    {
        return Cache::get($key);
    }
}
