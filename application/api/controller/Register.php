<?php
namespace app\api\controller;

use app\api\controller\Common;
use app\api\model\Common as CommonModel;
use think\Cache;
use think\Db;
use app\common\model\DistributionUser as DistributionUserModel;
use app\common\Lookup;
use app\common\model\DistributionConfig as DistributionConfigModel;
use app\common\model\SmsCode as SmsCodeModel;
use app\api\model\Member as MemberModel;

class Register extends Common {

    //用户注册
    public function register() {
	    $tokenRes = $this->checkToken(0);
	    if($tokenRes['status'] == 400){
		    datamsg(400,$tokenRes['mess'],$tokenRes['data']);
	    }

        $data = input('post.');

        $smsCodeModel = new SmsCodeModel();
        $checkSmsCode = $smsCodeModel->checkSmsCode($data['phonecode'],$data['phone'],1);

        if ($checkSmsCode['status'] == 400) {
            datamsg(400,$checkSmsCode['mess']);
        }

        $insertData = array(
            'phone' => $data['phone'],
            'user_name' => get_random_string(10),
            'password' => $data['password'],
            'qrcodeurl' => '',
            'regtime' => time()
        );

        $userModel = new MemberModel();
        $result = $userModel->doRegister($insertData);
        datamsg($result['status'],$result['mess']);

    }

}
