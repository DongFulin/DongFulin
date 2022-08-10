<?php

namespace app\api\model;
use think\Model;

class MemberIntegral extends Model{
    
    public function getIntegralRecord($userId, $type) {
        $where = array('user_id' => $userId, 'type' => $type, 'class' => 0);
        return MemberIntegral::where($where)->whereTime('addtime', 'today')->find();
    }
    
    public function getIntegralRecordByUserId($userId, $offset, $pageSize) {
        $where = array('user_id' => $userId, 'class' => 0);
        return MemberIntegral::field('id,integral,type,class,FROM_UNIXTIME(addtime) addtime')->where($where)->order('id desc')->limit($offset, $pageSize)->select();
    }
}
