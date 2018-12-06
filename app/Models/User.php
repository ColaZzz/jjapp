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

    public function role()
    {
        return $this->belongsTo('App\Models\EstateRole', 'linkage_role', 'linkage_role');
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

    /**
     * 获取用户权限信息
     */
    public function getEstateRole($id)
    {
        $row = $this->with('role')->where('id', $id)->first();
        return $row->role;
    }
}
