<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Validator;

class Linkage extends Model
{
    // protected $hidden = ['user_id'];
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

    /**
     * 联动表单验证
     */
    public function linkageValidate($form)
    {
        // 表单验证
        $validator = Validator::make($form, [
            'platform' => 'bail|required|max:25',
            'project' => 'bail|required|max:25',
            'company' => 'bail|required|max:25',
            'worker' => 'bail|required|max:10',
            'workNumber' => 'bail|required|size:11',
            'user' => 'bail|required|max:10',
            'userNumber' => 'bail|required|size:11',
        ],[
            'platform.required' => '电商平台不能为空',
            'platform.max' => '电商平台太长了',
            'project.required' => '项目名称不能为空',
            'project.max' => '项目名称太长了',
            'company.required' => '公司名称不能为空',
            'company.max' => '公司名称太长',
            'worker.required' => '工作人员不能为空',
            'workNumber.size' => '工作人员电话格式不正确',
            'user.required' => '客户名称不能为空',
            'user.max' => '客户名称太长',
            'userNumber.required' => '客户电话不能为空',
            'userNumber.size' => '客户电话格式不正确',
        ]);
        // 表单验证失败
        if ($validator->fails()) {
            return $validator->errors();
        }else{
            return false;
        }
    }
}
