<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Linkage;
use App\Models\LinkageToken;
use Illuminate\Support\Facades\Cache;

class BlockController extends Controller
{
    /**
     * 接收联动数据
     */
    public function getInput(Request $request)
    {
        try {
            // 先判断用户是否登录
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            // 返回false则说明该用户未登录
            if (!$id) {
                return $this->resData('用户未登录', 1);
            }

            $str = $request->jsonstr;
            $form = json_decode($str);
            $created_at = Carbon::now()->toDateTimeString();
            
            // 构建待存储数据集
            $row = [
                'user_id' => $id,
                'platform' => $form->platform,
                'project' => $form->project,
                'company' => $form->company,
                'worker' => $form->worker,
                'worker_number' => $form->workNumber,
                'user' => $form->user,
                'user_number' => $form->userNumber,
                'created_at' => $created_at
            ];

            // 插入数据并返回id
            $linkage = new Linkage();
            $reocrdId = $linkage->insertGetId($row);
            // 将此id生成一个密钥返回到用户的二维码中，日后获取刚填入的信息，该二维码和linkages表的记录关联
            $qcodeKey = $linkage->generateKey($reocrdId);
            // 存入linkages表中
            $linkage->where('id', $reocrdId)->update(['qrcode' => $qcodeKey]);

            return $this->resData('提交成功并已生成二维码', 1, ['qrcode' => $qcodeKey, 'datetime'=>$created_at]);
        } catch (\Expection $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 获取个人的联动记录
     */
    public function getPersonLinkages(Request $request)
    {
        try {
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 1);
            }

            $linkages = Linkage::where('user_id', $id)->orderBy('created_at', 'desc')->get();
            return $this->resData('获取记录', 1, $linkages);
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 确认通行证
     */
    public function checkScanToken(Request $request)
    {
        try {
            $code = $request->code;
            $bool = LinkageToken::where('username', 'admin')->where('passwd', $code)->first();
            if ($bool) {
                return $this->resData('确认成功', 1);
            } else {
                return $this->resData('通行码不正确', 1);
            }
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 通过二维码查询联动单信息
     */
    public function getLinkageInfo(Request $request)
    {
        try {
            $code = $request->code;
            $token = $request->token;
            // 先判断用户是否登录
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }
            // 再判断用户是否有权限
            $role = $user->find($id);
            if ($role->linkage_role) {
                // 认证通过
                $linkage = new Linkage();
                $linkage_id = $linkage->getRecordId($code);
                // 判断是否存在该二维码
                if ($linkage_id) {
                    $linkage = $linkage->find($linkage_id);
                    return $this->resData('确认成功', 1, $linkage);
                } else {
                    return $this->resData('二维码无效', 3);
                }
            }
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }
}