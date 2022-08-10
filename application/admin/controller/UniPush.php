<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\cache\driver\Redis;
use think\Model;
use think\Db;

class UniPush extends Common{

    //header("Content-Type: text/html; charset=utf-8");
    //http的域名
    protected $HOST = 'http://sdk.open.api.igexin.com/apiex.htm';
    //定义常量, appId、appKey、masterSecret 采用本文档 "第二步 获取访问凭证 "中获得的应用配置
    // STEP1：获取应用基本信息
    protected $APPKEY = "nbZjAF6u8k7D1JutkZGCq6";
    protected $APPID = "TPLFwUDOaT6rGOZze9sGE1";
    protected $MASTERSECRET = "DUMqEQdpHV8JXPl35x5Z33";

    //群推接口案例
    public function pushAll($data){
        require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/extend/UniPush/' . 'push.php');
        return doPushAll($data);
    }

    //单个消息推送
    public function pushOne($data){
        require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/extend/UniPush/' . 'push.php');
        return doPushOne($data);
    }
    
    public function lst(){
        $list = Db::name('push')->order('created desc')->paginate(15);
        $page = $list->render();
        if(input('page')){
            $pnum = input('page');
        }else{
            $pnum = 1;
        }
        $this->assign(array(
            'list'=>$list,
            'page'=>$page,
            'pnum'=>$pnum
        ));
        if(request()->isAjax()){
            return $this->fetch('ajaxpage');
        }else{
            return $this->fetch('lst');
        }
    }

    public function add(){
        if(request()->isPost()) {
            $data = input('post.');
            if(empty($data['title'])){
                $ret_push = array('status'=>0,'mess'=>'请发布标题');
                return json($ret_push);
            }
            $data['created']=date('Y-m-d H:i:s',time());
            $result = db('push')->insert($data);
            if($result){
                $this->push($data);
                $value = array('status'=>1,'mess'=>'增加成功','data'=>$data);
            }else{
                $value = array('status'=>0,'mess'=>'增加失败');
            }
            //加入推送队列中执行推送
            // $redis = new Redis();
            // $redis->lpush('pushtest','unipush');
            return json($value);
        }else{
            return $this->fetch();

        }
    }

    /***
     * 直接进行推送任务
     */
    private function push($data){
        $data['payload'] = '{"title":"'.$data['title'].'","content":"'.$data['content'].'","sound":"default","payload":"test"}';
        $this->pushAll($data);
    }
}

?>