<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Validator;
use Carbon\Carbon;

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
        $key = substr(md5(uniqid()),8,16);
        Cache::put($key, $id, 10080);
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
            'company' => 'bail|required|max:25',
            'childCompany' => 'bail|required|max:25',
            'worker' => 'bail|required|max:10',
            'workNumber' => 'bail|required|size:11',
            'username' => 'bail|required|max:10',
            'userNumber' => 'bail|required|size:11',
        ], [
            'company.required' => '公司名称不能为空',
            'company.max' => '公司名称太长',
            'childCompany.required' => '分店名称不能为空',
            'childCompany.max' => '分店名称太长',
            'worker.required' => '工作人员不能为空',
            'worker.max' => '工作人员太长',
            'workNumber.required' => '工作人员电话不能为空',
            'workNumber.size' => '工作人员电话格式不正确',
            'username.required' => '客户名称不能为空',
            'username.max' => '客户名称太长',
            'userNumber.required' => '客户电话不能为空',
            'userNumber.size' => '客户电话格式不正确',
        ]);
        // 表单验证失败
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return false;
        }
    }

    /**
     * 获取个人的联动单
     * @param $state int 是否已经扫描，0未扫描，1已扫描，2全部
     * @return array
     */
    public function getPersonLinkages($user_id, $state, $word)
    {
        if ($state != 2) {
            return $this->where('user_id', $user_id)
                    ->orderBy('created_at', 'desc')
                    ->where('state', $state)
                    ->when($word,function($query) use ($word){
                        return $query->where('user_number','like','%'.$word.'%');
                    })
                    ->paginate(10);
        } else {
            return $this->where('user_id', $user_id)
                    ->orderBy('created_at', 'desc')
                    ->when($word,function($query) use ($word){
                        return $query->where('user_number','like','%'.$word.'%');
                    })
                    ->paginate(10);
        }
    }

    /**
     * 判断用户是否首次上门
     * 如果找到对应的数据则返回数据
     */
    public function firstVisit($id)
    {
        $linkage = $this->find($id);
        $username = $linkage->username;
        $firstName = mb_substr($username, 0, 1);
        $userNumber = $linkage->user_number;
        $firstNumber = mb_substr($userNumber, 0, 3);
        $lastNumber = mb_substr($userNumber, -4);

        $date = date('Y-m-d');
        $userAccount = new UserAccount();
        // 获取模糊的数据
        $result = $userAccount->where([
            ['user_number', 'like', $firstNumber.'%'.$lastNumber],
            ['username', 'like', $firstName.'%']
        ])
        ->whereNotIn('visit', [$date])
        ->get();
        // 是否存在用户数据
        return $result;
    }
}