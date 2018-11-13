<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'openid', 'session_key'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *关联关系 
     */
    public function linkages()
    {
        return $this->hasMany('App\Models\Linkage', 'user_id', 'id');
    }
    /**
     * 检查登录情况
     * 通过token获取id
     */
    public function getIdForToken($token)
    {
        $openid = Cache::get($token);
        // 如果不存在此token则返回false
        if(!$openid){
            return false;
        }
        $row = $this->where('openid', $openid)->first();
        // 如果不存在此openid则返回false
        if(!$row){
            return false;
        }
        // 满足以上条件返回user_id
        return $row->id;
    }
}
