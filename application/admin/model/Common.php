<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Common extends Model
{    
    public function getActivityInfo($goods_id,$start_time='',$end_time='',$shop_id){
        if($start_time !='' && $end_time !=''){
            //秒杀信息
            $seckill = Db::name('seckill')->where(function ($query) use ($goods_id,$start_time,$end_time,$shop_id){
                $query->where('goods_id',$goods_id)->where('checked','in','0,1')->where('is_show',1)->where('start_time','elt',$start_time)->where('end_time','egt',$start_time)->where('shop_id',$shop_id);
            })->whereOr(function ($query) use ($goods_id,$start_time,$end_time,$shop_id){
                $query->where('goods_id',$goods_id)->where('checked','in','0,1')->where('is_show',1)->where('start_time','egt',$start_time)->where('start_time','elt',$end_time)->where('shop_id',$shop_id);
            })->find();

            //拼团信息
            if (!$seckill) {
                $assembles = Db::name('assemble')->where(function ($query) use ($goods_id,$start_time,$end_time,$shop_id){
                    $query->where('goods_id',$goods_id)->where('checked','in','0,1')->where('is_show',1)->where('start_time','elt',$start_time)->where('end_time','egt',$start_time)->where('shop_id',$shop_id);
                })->whereOr(function ($query) use ($goods_id,$start_time,$end_time,$shop_id){
                    $query->where('goods_id',$goods_id)->where('checked','in','0,1')->where('is_show',1)->where('start_time','egt',$start_time)->where('start_time','elt',$end_time)->where('shop_id',$shop_id);
                })->field('goods_id,goods_attr')->find();
            }
        }else{
            //秒杀信息
            $seckill = Db::name('seckill')->where('goods_id',$goods_id)->where('checked','in','0,1')->where('is_show',1)->where('shop_id',$shop_id)->where('end_time','>',time())->find();

            //拼团信息
            if (!$seckill) {
                $assembles = Db::name('assemble')->where('goods_id',$goods_id)->where('checked','in','0,1')->where('is_show',1)->where('shop_id',$shop_id)->where('end_time','>',time())->find();;
            }
        }

        //积分换购信息
        if (!$seckill && !$assembles) {
            $integral = Db::name('integral_shop')
                ->where('goods_id', $goods_id)
                ->where('shop_id', $shop_id)
                ->where('checked', 1)
                ->where('is_show', 1)
                ->order('price asc')
                ->find();
        }
        if($seckill){
            $activity = 1;
        }elseif($assembles){
            $activity = 2;
        }elseif($integral){
            $activity = 3;
        }
        return $activity;
    }
}