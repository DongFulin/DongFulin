<?php
/**
 * @Description: 拼团
 * @Author : 梧桐 <2487937004@qq.com>
 * @Copyright : 武汉一一零七科技有限公司 All rights reserved.
 */
namespace  app\api\model;
use think\Db;
use think\Model;

class Assemble extends Model
{
    public function getRecommendAssemble($num){
        $sql = "SELECT
                        `a`.id, `g`.`thumb_url`
                FROM
                        sp_assemble a
                INNER JOIN `sp_goods` `g` ON `a`.`goods_id` = `g`.`id`
                WHERE
                        `a`.`checked` = 1
                AND `a`.`recommend` = 1
                AND `a`.`is_show` = 1
                AND (`a`.`start_time` > ".time()." OR (`a`.`start_time` <= ".time()." AND `a`.`end_time` > ".time()."))
                ORDER BY
                        `id` DESC
                LIMIT {$num}";
        return Db::query($sql);
    }
}