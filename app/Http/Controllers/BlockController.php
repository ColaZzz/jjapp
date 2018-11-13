<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Linkage;

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

            return $this->resData('提交成功并已生成二维码', 1);
        } catch (\Expection $e) {
            return $this->resData('fail', 0, $e);
        }
    }
}
