<?php
namespace app\api\model;
use think\Db;
use think\Model;

class Seckill extends Model
{
    public function getRecommendSeckill($num){
        $sql = "SELECT
                        `r`.id,`r`.goods_id, `g`.`thumb_url` ,
                        `g`.`shop_price`
                FROM
                        sp_seckill r
                INNER JOIN `sp_goods` `g` ON `r`.`goods_id` = `g`.`id`
                WHERE
                        `r`.`checked` = 1
                AND `r`.`recommend` = 1
                AND `r`.`is_show` = 1
                AND (`r`.`start_time` > ".time()." OR (`r`.`start_time` <= ".time()." AND `r`.`end_time` > ".time()."))
                ORDER BY
                        `id` DESC
                LIMIT {$num}";
        return Db::query($sql);
    }

}