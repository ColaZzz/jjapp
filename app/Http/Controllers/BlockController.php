<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Linkage;
use App\Models\LinkageToken;
use Illuminate\Support\Facades\Cache;
use Validator;
use App\Models\UserAccount;
use App\Models\EstateRole;
use App\Models\RoleApply;

class BlockController extends Controller
{
    public $followRole = 2;
    /**
     * 接收联动数据
     */
    public function getInput(Request $request)
    {
        try {
            $token = $request->token;
            $linkage = new Linkage();
            $user = new User();
            // 先判断用户是否登录
            $id = $user->getIdForToken($token);
            // 返回false则说明该用户未登录
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }

            $str = $request->jsonstr;
            $form = json_decode($str, true);
            // 表单验证
            $validates = $linkage->linkageValidate($form);
            if ($validates) {
                return $this->resData('验证错误', 3, $validates);
            }
                   
            // 构建待存储数据集
            $created_at = Carbon::now()->toDateTimeString();
            $row = [
                'user_id' => $id,
                'company' => $form['company'],
                'child_company' => $form['childCompany'],
                'worker' => $form['worker'],
                'worker_number' => $form['workNumber'],
                'username' => $form['username'],
                'user_number' => $form['userNumber'],
                'created_at' => $created_at
            ];

            // 插入数据并返回id
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
            $state = $request->state;
            $user = new User();
            $linkages = new Linkage();
            $user_id = $user->getIdForToken($token);
            if (!$user_id) {
                return $this->resData('用户未登录', 1);
            }

            $linkages = $linkages->getPersonLinkages($user_id, $state);
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
            // return $this->resData('用户权限', 1, $role->linkage_role);
            if ($role->linkage_role) {
                // 认证通过
                $linkage = new Linkage();
                $linkage_id = $linkage->getRecordId($code);
                // 判断是否存在该二维码
                if ($linkage_id) {
                    $linkage->where('id', $linkage_id)->update(['state' => 1]);
                    $linkageForm = $linkage->find($linkage_id);
                    // 电商驻场只返回报备数据，不返回台账数据
                    if ($role->linkage_role == 1) {
                        return $this->resData('确认成功', 1, $linkageForm);
                    } elseif ($role->linkage_role > 1) {
                        // 判断是否首次上门
                        $first = $linkage->firstVisit($linkage_id);
                        return $this->resData2('确认信息', 5, $linkageForm, $first);
                    }
                } else {
                    return $this->resData('二维码无效', 3);
                }
            } else {
                return $this->resData('当前用户没权限', 4);
            }
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 上传台账数据
     */
    public function insAccount(Request $request)
    {
        try {
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }
            $role = $user->getEstateRole($id);
            if ($role->linkage_role > 1) {
                $name = $request->name;
                $number = $request->number;
                $ua = new UserAccount();
                $result = $ua->insAccount($name, $number);
                if ($result) {
                    return $this->resData('success', 1, '已将数据加入到台账表');
                } else {
                    return $this->resData('success', 1, '台账表已存在该数据');
                }
            }
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 返回权限
     */
    public function getEstateRoles()
    {
        try {
            $er = new EstateRole();
            $estateRoles = $er->getEstateRoles();
            return $this->resData('success', 1, $estateRoles);
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 接受权限申请数据
     */
    public function insApplyRole(Request $request)
    {
        try {
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }

            $roleId = $request->roleid;
            $ra = new RoleApply();
            $result = $ra->insertGetId(['user_id' => $id, 'apply_role_id' => $roleId, 'created_at' => Carbon::now()->toDateTimeString()]);
            if ($result) {
                return $this->resData('success', 1);
            } else {
                return $this->resData('fail', 1);
            }
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 获取个人权限申请记录
     */
    public function getUserRoleApplies(Request $request)
    {
        try {
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }
            $roleApply = new RoleApply();
            $roleApplies = $roleApply->getRoleApplies($id);
            return $this->resData('success', 1, $roleApplies);
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 消息处理的权限确认
     */
    public function checkUserRole(Request $request)
    {
        try {
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }
            $role = $user->getEstateRole($id);
            if ($role->linkage_role == 3) {
                return $this->resData('success', 1);
            } else {
                return $this->resData('success', 3);
            }
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 获取申请列表
     */
    public function getApplyList(Request $request)
    {
        try {
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }

            $ra = new RoleApply();
            $list = $ra->getAllApply();
            return $this->resData('successs', 1, $list);
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 更改申请状态
     */
    public function editApply(Request $request)
    {
        try {
            $applyId = $request->applyid;
            $state = $request->state;
            $token = $request->token;

            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }
            // 判断用户权限
            $role = $user->find($id);
            if ($role->linkage_role < 3) {
                return $this->resData('用户权限不够', 3);
            }
            // 修改申请的状态
            $apply = new RoleApply();
            $apply->where('id', $applyId)->update(['state' => $state]);
            
            // 修改用户申请的权限
            if ($state == 1) {
                $roleApply = $apply->find($applyId);
                $userId = $roleApply->user_id;
                $roleId = $roleApply->apply_role_id;
                $user->where('id', $userId)->update(['linkage_role' => $roleId]);
            }

            return $this->resData('successs', 1);
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 更改跟进状态
     */
    public function changeFollow(Request $request)
    {
        try{
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if(!$id){
                return $this->resData('用户未登录', 2);
            }
            $state = $request->state;
            $userAccountId = $request->accountid;
            $userAccount = new UserAccount();
            $userAccount->updateFollow($id, $userAccountId, $state);
            return $this->resData('success', 1);
        }catch(\Exception $e){
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 客户跟进的权限确认
     */
    public function checkFollowRole(Request $request)
    {
        try {
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }
            $role = $user->getEstateRole($id);
            if ($role->linkage_role >= $this->followRole) {
                return $this->resData('success', 1);
            } else {
                return $this->resData('success', 3);
            }
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 跟进搜索客户资料
     */
    public function getUserAccountes(Request $request)
    {
        try {
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }
            $role = $user->getEstateRole($id);
            if ($role->linkage_role >= $this->followRole) {
                //搜索授权成功
                $word = $request->word;
                $userAccount = new UserAccount();
                $data = $userAccount->searchWord($word);
                return $this->resData('success', 1, $data);
            } else {
                // 搜索授权失败
                return $this->resData('success', 3);
            }
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 跟进搜索客户资料
     */
    public function editUserAccount(Request $request)
    {
        try {
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }
            $role = $user->getEstateRole($id);
            if ($role->linkage_role >= $this->followRole) {
                //搜索授权成功
                $worker = $request->worker;
                $userAccountId = $request->useraccountid;
                $state = $request->state;
                $userAccount = new UserAccount();
                $result = $userAccount->updateFollow($worker, $userAccountId, $state);
                if($result){
                    return $this->resData('已跟进', 1);
                }else{
                    return $this->resData('数据更新时失败', 1);
                }
            } else {
                // 搜索授权失败
                return $this->resData('success', 3);
            }
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }

    /**
     * 获取单行用户台账信息
     */
    public function geteUserAccountForId(Request $request)
    {
        try {
            $token = $request->token;
            $user = new User();
            $id = $user->getIdForToken($token);
            if (!$id) {
                return $this->resData('用户未登录', 2);
            }
            $role = $user->getEstateRole($id);
            if ($role->linkage_role >= $this->followRole) {
                //搜索授权成功
                $uaId = $request->id;
                $userAccount = new UserAccount();
                $result = $userAccount->getUserAccountForId($uaId);
                return $this->resData('返回信息', 1, $result);
            } else {
                // 搜索授权失败
                return $this->resData('success', 3);
            }
        } catch (\Exception $e) {
            return $this->resData('fail', 0, $e);
        }
    }
}
