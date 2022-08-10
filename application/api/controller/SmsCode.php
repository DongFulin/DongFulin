<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use app\api\controller\Common;
use app\common\model\SmsCode as SmsCodeModel;
use app\api\model\Member as MemberModel;

class SmsCode extends Common
{
    /**
     * 发送验证码
     *
     * @return \think\Response
     */
    public function send()
    {
        $tokenRes = $this->checkToken(0);
        if($tokenRes['status'] == 400){
            datamsg(400,$tokenRes['mess']);
        }
        $data['phone'] = input('param.phone');
        $data['type'] = input('param.type');
        $validate = $this->validate($data,'SmsCode.send');
        if($validate !== true){
            datamsg(400,$validate);
        }

        // 发送频率验证
        // step1 验证今日发送最大次数
        $smsCodeModel = new SmsCodeModel();
        $todayCount = $smsCodeModel->getTodayCountByPhone($data['phone']);
        $dayMaxCount = get_config_value('maxcodenum');
        if($todayCount >= $dayMaxCount){
            datamsg(400,'发送失败，今日发送次数已达到最大限制');
        }
        // step2 验证发送间隔时间
        $lastSmsCode = $smsCodeModel->getSmsCodeByPhone($data['phone'],$data['type']);
        $interval = get_config_value('messtime');
        if(isset($lastSmsCode) && (time() - $lastSmsCode['create_time']) < $interval){
            datamsg(400,'发送失败，'.$interval.'s内只能发送一次');
        }

        // 验证码类型：1:注册,2:短信快捷登录,3:找回密码，修改密码,4:绑定子账号，5:设置、修改支付密码，6：修改手机号
        switch ($data['type']){
            case 1: //注册
                $userModel = new MemberModel();
                $getUserByPhone = $userModel::getByPhone($data['phone']);
                if($getUserByPhone){
                    datamsg(400,'该手机号已注册');
                }
                break;
            case 2: // 短信快捷登录
                break;
            case 3: // 找回密码,修改密码
            case 5: // 设置、修改支付密码
                $userModel = new MemberModel();
                $getUserByPhone = $userModel::getByPhone($data['phone']);
                if(!$getUserByPhone){
                    datamsg(400,'该手机号未注册');
                }
                break;
            case 4: // 绑定子账号
                $userModel = new MemberModel();
                $getUserByPhone = $userModel->getUserInfoByPhone($data['phone']);
                if(!$getUserByPhone){
                    datamsg(400,'该手机号未注册，请先注册账号再进行绑定');
                }
                if($getUserByPhone['pid'] > 0){
                    datamsg(400,'绑定失败，该手机号对应的账号已被绑定');
                }
                break;
            case 6: // 修改手机号
                $userModel = new MemberModel();
                $getUserByPhone = $userModel::getByPhone($data['phone']);
                if($getUserByPhone){
                    datamsg(400,'该手机号已存在');
                }
                break;
        }
        $data['phone'] = $data['phone'];
        $data['sms_code'] = create_sms_code();
        $data['type'] = $data['type'];
        $data['ip'] = request()->ip();
        $sendRes = send_sms($data['phone'],$data['sms_code']);

        if($sendRes->msg == "OK"){
            $res = $smsCodeModel::create($data);
            if($res){
                datamsg(200,'验证码发送成功');
            }else{
                datamsg(400,'验证码发送失败');
            }
        }else{
            datamsg(400,'验证码发送失败');
        }

    }

    public function checkSmsCode(){
        $tokenRes = $this->checkToken(0);
        if($tokenRes['status'] == 400){
            datamsg(400,$tokenRes['mess']);
        }
        $smsCode = input('post.sms_code');
        $phone = input('post.phone');
        $smsCodeModel = new SmsCodeModel();
        $result = $smsCodeModel->checkSmsCode($smsCode,$phone,2);
        datamsg($result['status'],$result['mess']);
    }



}
