<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Factory;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            $code = $request->code;
            $username = $request->username;
            $created = Carbon::now()->toDateTimeString();
            // 初始化EasyWeChat实例
            $app = Factory::miniProgram(config('wechat.config'));
            // 根据 jsCode 获取用户 session 信息
            $result = $app->auth->session($code);

            // 装填数据
            $openid = $result['openid'];
            $session_key = $result['session_key'];

            $arr = array([
                'openid' => $openid,
                'session_key' => $session_key,
                'name' => $username,
                'created_at' => $created
            ]);

            // 将第一次登录的用户的openid存入数据库
            $exist = User::where('openid', $openid)->first();
            if (!$exist) {
                User::insert($arr);
            } else {
                $exist->update(['session_key'=>$session_key, 'name' => $username]);
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
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }
            $role = $user->find($id);
            if ($role->linkage_role) {
                return $this->resData('确认通过', 1);
            } else {
                return $this->resData('当前用户没用权限', 1);
            }
        } catch (\Expection $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 获取用户的权限信息
     */
    public function getRoleInfo(Request $request)
    {
        try{
            $token = $request->token;
            // return $this->resData('返回数据', 1, $token);
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }
            $role = $user->getEstateRole($id);
            return $this->resData('返回数据', 1, $role);
        }catch(\Exception $e){
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 检查登录态是否过期
     */
    public function checkToken(Request $request)
    {
        try{
            $token = $request->token;
            $user = new User();
            if($user->checkToken($token)){
                return $this->resData('登录态未过期', 1);
            }else{
                return $this->resData('登录态已失效', 2);
            }
        }catch(\Exception $e){
            return $this->resData('fail', 0, $e);
        }
    }
}
