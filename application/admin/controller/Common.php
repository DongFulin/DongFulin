<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use Qcloud\Cos\Client;

class Common extends Controller{
    public $webconfig;
    Public function _initialize(){
        if(!session('admin_id') || !session('shop_id')){
            $this->redirect('Login/index');
        }
       
        $this->_getconfig();
        
        if(request()->module()=='Admin' && request()->controller()=='Index'){
            return true;
        }
        
        if(request()->module()=='Admin' && request()->controller()=='Admin' && request()->action()=='loginOut'){
            return true;
        }
        
        if(session('privilege') == "*"){
            return true;
        }
        
//        if(session('privilege') != '*' && !in_array(request()->module().'/'.request()->controller().'/'.request()->action(), session('privilege'))){
//            echo '您没有权限访问该方法！';
//            die;
//        }
    }

    public function _getconfig(){
        $_configres = Db::name('config')->where('ca_id','in','1,2,4,5,10,15,17')->field('ename,value')->select();
        $configres = array();
        foreach ($_configres as $v){
            $configres[$v['ename']] = $v['value'];
        }
        $this->webconfig=$configres;
        $this->assign('configres',$configres);
    }

     /**
     * 腾讯对象存储-文件上传
     * @datatime 2018/05/17 09:20
     * @author lgp
     */
    public function qcloudCosUpload($file,$mkdirname,$numpic){
        if(empty($file)){
            datamsg(400,'请上传图片');
         }
         $cosClient = new Client(config("tengxunyun"));
         if(is_array($file)){
            if(count($file) >= $numpic){
                datamsg(400,'最多上传'.$numpic.'张图片');
            }
            $picarr=[];
            foreach($file as $key=>$value){


                $info = $file[$key]->validate(['size'=>8368576,'ext'=>'jpg,png,gif,jpeg'])->getInfo();
                $key = $mkdirname."/".date("Y-m-d") . "/" .$info['name'];
                $data = array( 'Bucket' => 'xiaoquhenhuo-1259494372', 'Key'  => $key, 'Body' => fopen($info['tmp_name'], 'rb') );
                //判断文件大小 大于5M就分块上传
                $result = $cosClient->Upload( $data['Bucket'] , $data['Key'] , $data['Body']  );

                if($result){
                    $original['dz'] = $key;
                    $original['wz'] = config('tengxunyun')['cos_domain'].'/'.$key;
                    $picarr[]=$original;
                }else{
                    $picarr[]=0;
                }

            }
            return $picarr;
        }else{

            try {
                $info = $file->validate(['size'=>8368576,'ext'=>'jpg,png,gif,jpeg'])->getInfo();
                $key = $mkdirname."/".date("Y-m-d") . "/" .$info['name'];
                $data = array( 'Bucket' => 'xiaoquhenhuo-1259494372', 'Key'  => $key, 'Body' => fopen($info['tmp_name'], 'rb') );
                //判断文件大小 大于5M就分块上传
                $result = $cosClient->Upload( $data['Bucket'] , $data['Key'] , $data['Body']  );

                //上传成功，自己编码
                if( $result ){
                    $original['dz'] = $key;
                    $original['wz'] = config('tengxunyun')['cos_domain'].'/'.$key;
                    $picarr[]=$original;
                }else{
                    datamsg(400,'图片上传失败');
                }
                return $original;
            } catch (\Exception $e) {
                datamsg(400,'图片上传失败');
            }
            
        }


        

    }
}