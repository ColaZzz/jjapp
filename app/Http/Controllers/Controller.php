<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * cache过期时间
     */
    public $minutes = 110;


    public function resData($msg, $code, $data = null)
    {
        $result = [
            'msg' => $msg,
            'code' => $code,
            'data' => $data
        ];
        return $result;
    }

    public function resData2($msg, $code, $data = null, $data2 = null)
    {
        $result = [
            'msg' => $msg,
            'code' => $code,
            'data' => $data,
            'data2' => $data2
        ];
        return $result;
    }

    /**
     * 生成唯一的session
     * @return md5
     */
    public function UniqueSession()
    {
        return md5(uniqid());
    }

    /**
     * 通过session获取openid
     */
    public function GetOpenid($session)
    {
        return Cache::get($session);
    }
}
