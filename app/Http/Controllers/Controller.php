<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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

    /**
     * 生成唯一的session
     * @return md5
     */
    public function UniqueSession()
    {
        return md5(uniqid());
    }
}
