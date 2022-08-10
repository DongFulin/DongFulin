<?php
namespace app\shop\controller;
use app\shop\controller\Common;
use think\Db;
use think\Loader;
use think\Validate;

class Customerrecord extends Common{
    //栏目列表
    public function lst(){
        $list = Db::name('chat_customer')->where(['is_delete'=>1])->order('id asc')->select();
        foreach($list as $key=>&$value){
            $value['headimgurl'] = $this->webconfig['weburl'].'/'.$value['headimgurl'];
        }
        $this->assign('list', $list);
        return $this->fetch();     
    }




    /**
     * 聊天记录
     */
    public function chatlist(){
        $id = input('param.id');
        $mess_token = db('chat_listmessage')->where(['cid'=>$id])->group('token')->column('token');
        if(empty($mess_token)){
            $mess_token = [-1];
        }
        $ids = db('rxin')->where(['token'=>['in',$mess_token]])->column('user_id');
        if(empty($ids)){
            $ids = [-1];
        }
        $member = db('member')->where(['id'=>['in',$ids]])->field('id,user_name,headimgurl,summary')->select();
        foreach($member as $key=>&$value){
            $value['headimgurl'] ? $value['headimgurl'] = $this->webconfig['weburl'].'/'.$value['headimgurl'] : $value['headimgurl'] = $this->webconfig['weburl'].'/uploads/default';
            $member[$key]['token'] = db('rxin')->where(['user_id'=>$value['id']])->value('token');
            $value['summary'] ? $value['summary'] : $value['summary']='这个人很懒，什么都没有写';
        }

        $this->assign([
            'cid'=>$id,
           'member'=>$member,
        ]);
        return $this->fetch();
    }


    /**
     * 获取个人的聊天记录
     */
    public function getmessage(){
        $token = input('post.token');
        $cid = input('post.cid');

        $field = "FROM_UNIXTIME(createtime,'%Y-%m-%d') AS days,message,createtime,token,cid,usertype";
        $list = db('chat_listmessage')
            ->where(['token'=>['in',"$token,$cid"]])
            ->where(['cid'=>['in',"$token,$cid"]])
            ->field($field)
            ->order('createtime asc')
            ->select();

        $html = '';
        foreach($list as $key=>$value){
            $flag = $value['usertype'] == 'home' ? 'you' : 'me';
            $html .= '<div class="bubble '.$flag.'">';
            $html .= $value['message'];
            $html .= '<div style="color:#5f5f5f;font-size:10px;margin-top:10px;margin-left:5px;">'.date('Y-m-d H:i:s',$value['createtime']).'</div>';
            $html .= '</div>';
        }

        return json(['status'=>1,'data'=>$html]);


    }

}