<?php
namespace app\common\model;
use think\Model;
use app\common\model\Config;
use app\common\validate\SmsCode as SmsCodeValidate;

class SmsCode extends Model
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;
    protected static $instance = null;

    public static function instance($options = []){
        if (is_null(self::$instance)) {
            self::$instance = new static($options);
        }
        return self::$instance;
    }

    protected function getCreateTimeAttr(){
        return $this->getData('create_time');
    }

    /**
     * @description 根据手机号获取最新验证码
     * @param $phone
     * @param $type 验证码类型：1:注册,2:登录,3:找回密码,4:绑定子账号
     * @return object
     */
    public function getSmsCodeByPhone($phone,$type){
        $info = $this->where('phone',$phone)->where('type',$type)->order('id DESC')->find();
        return $info;
    }

    public function getTodayCountByPhone($phone){
        $count = $this->where('phone',$phone)->whereTime('create_time','d')->count();
        return $count;
    }

    public function checkSmsCode($userSmsCode,$phone,$type){
        $data['sms_code']= $userSmsCode;
        $data['phone'] = $phone;
        $data['type'] = $type;
        $validate = new SmsCodeValidate;
        if (!$validate->scene('check')->check($data)) {
            return array('status'=>400,'mess'=>$validate->getError());
        }
        $systemSmsCode = $this->where('phone',$phone)->where('type',$type)->order('id DESC')->find();
        if(!$systemSmsCode || $userSmsCode != $systemSmsCode['sms_code']){
            return array('status'=>400,'mess'=>'验证码错误');
        }
        $configModel = new Config();
        $validTime = $configModel->getConfigByName('mess_valid_time');
        if(time()-$systemSmsCode['create_time'] > $validTime*60){
            return array('status'=>400,'mess'=>'验证码已过期');
        }else{
            return array('status'=>200,'mess'=>'验证码有效');
        }
    }
}
