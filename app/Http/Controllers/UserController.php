<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Factory;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            $code = $request->code;
            // 初始化EasyWeChat实例
            $app = Factory::miniProgram(config('wechat.config'));
            // 根据 jsCode 获取用户 session 信息
            $result = $app->auth->session($code);

            // 装填数据
            $openid = $result['openid'];
            $session_key = $result['session_key'];

            $arr = array([
                'openid' => $openid,
                'session_key' => $session_key
            ]);

            // 将第一次登录的用户的openid存入数据库
            $exist = User::where('openid', $openid)->first();
            if (!$exist) {
                User::insert($arr);
            } else {
                $exist->update(['session_key'=>$session_key]);
            }

            // 自定义登陆态并于openid关联
            $session_key_3rd = $this->UniqueSession();
            Cache::put($session_key_3rd, $openid, $this->minutes);

            return $this->resData('session_3rd', 1, $session_key_3rd);
        } catch (\Expection $e) {
            return $this->resData('fail', 0, $e);
        }
    }
    
    /**
     * 确认是否是联动的管理人员
     */
    public function checkLinkageRole(Request $request)
    {
        try {
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if(!$id){
                return $this->resData('用户未登录', 2);
            }
            $role = $user->find($id);
            if($role->linkage_role){
                return $this->resData('确认通过', 1);
            }else{
                return $this->resData('当前用户没用权限', 1);
            }
        } catch (\Expection $e) {
            return $this->resData('fail', 0, $e);
        }
    }
}
