<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleApply extends Model
{
    protected $table = 'role_apply';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function estateRole()
    {
        return $this->belongsTo('App\Models\EstateRole', 'apply_role_id', 'linkage_role');
    }

    /**
     * 获取用户的权限申请记录
     */
    public function getRoleApplies($id)
    {
        $roleApplies = $this->with('estateRole')
        ->where('user_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();
        return $roleApplies;
    }

    /**
     * 获取未处理的申请列表
     */
    public function getAllApply()
    {
        return $this->with('user:id,name', 'estateRole:linkage_role,linkage_name')
        ->where('state', 0)
        ->orderBy('created_at', 'desc')
        ->get();
    }

    /**
     * 更改申请状态
     */
    public function editApply($id, $state)
    {
        $this->where('id', $id)
        ->update(['state' => $state]);
    }
}
