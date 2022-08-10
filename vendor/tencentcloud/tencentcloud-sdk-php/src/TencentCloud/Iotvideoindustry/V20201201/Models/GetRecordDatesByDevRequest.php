<?php
/*
 * Copyright (c) 2017-2018 THL A29 Limited, a Tencent company. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace TencentCloud\Iotvideoindustry\V20201201\Models;
use TencentCloud\Common\AbstractModel;

/**
 * GetRecordDatesByDev请求参数结构体
 *
 * @method string getDeviceId() 获取设备唯一标识
 * @method void setDeviceId(string $DeviceId) 设置设备唯一标识
 * @method integer getLimit() 获取限制量，默认200
 * @method void setLimit(integer $Limit) 设置限制量，默认200
 * @method integer getOffset() 获取偏移量，默认0
 * @method void setOffset(integer $Offset) 设置偏移量，默认0
 * @method string getChannelId() 获取通道唯一标识
 * @method void setChannelId(string $ChannelId) 设置通道唯一标识
 * @method integer getType() 获取1: 云端录制 2: 本地录制
 * @method void setType(integer $Type) 设置1: 云端录制 2: 本地录制
 */
class GetRecordDatesByDevRequest extends AbstractModel
{
    /**
     * @var string 设备唯一标识
     */
    public $DeviceId;

    /**
     * @var integer 限制量，默认200
     */
    public $Limit;

    /**
     * @var integer 偏移量，默认0
     */
    public $Offset;

    /**
     * @var string 通道唯一标识
     */
    public $ChannelId;

    /**
     * @var integer 1: 云端录制 2: 本地录制
     */
    public $Type;

    /**
     * @param string $DeviceId 设备唯一标识
     * @param integer $Limit 限制量，默认200
     * @param integer $Offset 偏移量，默认0
     * @param string $ChannelId 通道唯一标识
     * @param integer $Type 1: 云端录制 2: 本地录制
     */
    function __construct()
    {

    }

    /**
     * For internal only. DO NOT USE IT.
     */
    public function deserialize($param)
    {
        if ($param === null) {
            return;
        }
        if (array_key_exists("DeviceId",$param) and $param["DeviceId"] !== null) {
            $this->DeviceId = $param["DeviceId"];
        }

        if (array_key_exists("Limit",$param) and $param["Limit"] !== null) {
            $this->Limit = $param["Limit"];
        }

        if (array_key_exists("Offset",$param) and $param["Offset"] !== null) {
            $this->Offset = $param["Offset"];
        }

        if (array_key_exists("ChannelId",$param) and $param["ChannelId"] !== null) {
            $this->ChannelId = $param["ChannelId"];
        }

        if (array_key_exists("Type",$param) and $param["Type"] !== null) {
            $this->Type = $param["Type"];
        }
    }
}
