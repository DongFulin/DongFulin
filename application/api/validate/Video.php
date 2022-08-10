<?php
namespace app\api\validate;
use think\Validate;

class Video extends Validate
{
    protected $rule = [
        'id'=>'require|integer',
        'video_id' => 'require|integer',
        'user_id' => 'require|integer',
    ];

    protected $message = [
        'id.require' => '缺少视频id参数',
        'id.integer' => '视频id参数类型错误',
        'video_id.require' => '缺少视频id参数',
        'video_id.integer' => '视频id参数类型错误',
        'user_id.require' => '缺少用户id参数',
        'user_id.integer' => '用户id参数类型错误',
    ];

    protected $scene = [
        'like' => ['video_id','user_id'],
        'share' => ['id'],
    ];

}