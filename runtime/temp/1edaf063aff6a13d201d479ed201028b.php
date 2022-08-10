<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/ywscs.com/public/../application/admin/view/apply_info/comapply.html";i:1638785231;}*/ ?>
<!--
 * @Descripttion: 
 * @Author: cbing
 * @Date: 2019-09-05 19:34:20
 * @LastEditors: cbing
 * @LastEditTime: 2019-09-05 21:19:08
 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商家入驻</title>
    <meta name="keywords" content="<?php echo \think\Config::get('keywords'); ?>">
    <meta name="description" content="<?php echo \think\Config::get('description'); ?>">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/double-date.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/admin/Huploadify/Huploadify.css"/>
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script type="text/javascript" src="/static/admin/js/jquery.cityselect.js?1"></script>
    <script src="/static/admin/js/double-date.js"></script>
</head>
<script>
var applyUrl = "<?php echo url('apply_info/comapply'); ?>";
var checkShopname = "<?php echo url('apply_info/checkShopname'); ?>";
var gurl = "/<?php echo \think\Request::instance()->module(); ?>";
</script>

<body class="gray-bg">
<style>
input.error{
	border:1px solid red;
}
span.error{
	padding-top:10px;
	color: #f00;
	font-size:12px;
}
</style>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>商家入驻资料申请</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" method="post" id="form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">申请类型：</label>
                            <div class="col-sm-4">
                                  <div style="font-size:14px; width:200px; height:35px; line-height:35px;">企业入驻</div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div> 
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">公司名称：</label>
                            <div class="col-sm-4">
                                <input type="text" name="com_name" value="" placeholder="请输入公司名称" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                        <div class="form-group">
                                <label class="col-sm-2 control-label">公司性质：</label>
                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="nature">
                                        <option value="股份有限公司">股份有限公司</option>
                                        <option value="个人独立企业">个人独立企业</option>
                                        <option value="有限责任公司">有限责任公司</option>
                                        <option value="外资">外资</option>
                                        <option value="中外合资">中外合资</option>
                                        <option value="国企">国企</option>
                                        <option value="合伙制企业">合伙制企业</option>
                                        <option value="其他">其他</option>
                                    </select>
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                         </div>
                         <div class="hr-line-dashed"></div> 
                         
                         <div class="form-group">
                            <label class="col-xs-3 col-sm-2 control-label">公司所在地:</label>
                            <div id="city_2">
                            <div class="col-xs-3 col-sm-2">
                                <select class="form-control m-b prov" name="com_province">
                                </select>
                            </div>
                            <div class="col-xs-3 col-sm-2">
                                <select class="form-control m-b city" disabled="disabled" name="com_city">
                                </select>
                            </div>
                            <div class="col-xs-3 col-sm-2">
                                <select class="form-control m-b dist" disabled="disabled" name="com_area">
                                </select>
                            </div>
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-2">
                                (请准确填写你店铺所在区域，以便用户查找你的店铺)
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
 
                        <div class="form-group">
                            <label class="col-sm-2 control-label">公司详细地址：</label>
                            <div class="col-sm-4">
                                <textarea id="com_address" name="com_address" class="form-control"></textarea>
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                        </div>
                        <div class="hr-line-dashed"></div> 
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">固定电话：</label>
                            <div class="col-sm-4">
                                <input type="text" name="fixed_phone" placeholder="公司固定电话" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px;color:#F00; font-size:16px;">*</label>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">公司电子邮箱：</label>
                            <div class="col-sm-4">
                                <input type="text" name="com_email" placeholder="公司电子邮箱" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px;color:#F00; font-size:16px;">*</label>
                        </div>
                        <div class="hr-line-dashed"></div>                                                
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">注册资金：</label>
                            <div class="col-sm-4">
                                <input type="text" name="zczj" placeholder="公司注册资金" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px;color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-2">
                                                                                          万元(人民币)
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div> 
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">营业执照编号：</label>
                            <div class="col-sm-4">
                                <input type="text" name="tyxydm" placeholder="营业执照编号" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px;color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-2">
                                (请输入18位营业执照编号)
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="">公司法人姓名：</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="faren_name" placeholder="公司法人姓名" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px;color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-4">(法人姓名请填写营业执照上的法人)</div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">公司法人身份证号码：</label>
                            <div class="col-sm-4">
                                <input type="text" name="sfz_num" placeholder="法人身份证号码" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px;color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-4">(请填写法人身份证号)</div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                        <div class="form-group">
                                <label class="col-sm-2 control-label">营业执照有效期：</label>
                                <div class="col-sm-6">
                                    <div class="date date1 fl" id="from" style="float:left; margin-right:25px;">
                                                                                                    开始日期：<input type="text" name="zzstart_time" readonly="readonly" class="date-check">
                                    </div>
                                    <div class="date fr" id="to" style="float:left;">
                                                                                                    结束日期：<input type="text" name="zzend_time" readonly="readonly" class="date-check">
                                    </div>
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                        <div class="hr-line-dashed"></div>   
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">营业执照经营范围：</label>
                            <div class="col-sm-4">
                                <textarea id="jyfw" name="jyfw" class="form-control"></textarea>
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                        </div>
                        <div class="hr-line-dashed"></div>                         

                        <div class="form-group">
                            <label class="col-sm-2 control-label">店铺名称：</label>
                            <div class="col-sm-4">
                                <input type="text" name="shop_name" value="" placeholder="请输入店铺名称" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-4">(作为你店铺的标识，确定后不能修改)</div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">店铺描述：</label>
                            <div class="col-sm-4">
                                <textarea id="shop_desc" name="shop_desc" class="form-control"></textarea>
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-4">(店铺经营范围，所属行业)</div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                        <div class="form-group">
                                <label class="col-sm-2 control-label">主要经营行业：</label>
                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="indus_id" id="indus_id">
                                        <option value="">请选择</option>
                                        <?php if(is_array($industryres) || $industryres instanceof \think\Collection || $industryres instanceof \think\Paginator): if( count($industryres)==0 ) : echo "" ;else: foreach($industryres as $key=>$v): ?>
                                        <option value="<?php echo $v['id']; ?>"><?php echo $v['industry_name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">选择经营类目：</label>
                                <div class="col-sm-4">
                                <button type="button" class="btn btn-success" onclick="selectGoods();">请选择经营类目</button>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div> 
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">已选择的类目：</label>
                                <div class="col-sm-4">
	                            <table class="table table-hover table-bordered">
	                            <thead class="biaoge">

	                            </thead>
                                <tbody id="goods_list">
                                
                                </tbody>	
	                            </table>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div> 

                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系人姓名：</label>
                            <div class="col-sm-4">
                                <input type="text" name="contacts" placeholder="联系人姓名" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px;color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-4">(请输入真实的联系人姓名)</div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系人手机号码：</label>
                            <div class="col-sm-4">
                                <input type="text" name="telephone" placeholder="联系人手机号码" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px;color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-4">(请输入真实的手机号，以便平台与您联系)</div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系人邮箱：</label>
                            <div class="col-sm-4">
                                <input type="text" name="email" placeholder="联系人邮箱" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px;color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-4">(请输入真实的邮箱地址)</div>
                        </div>
                        <div class="hr-line-dashed"></div> 
                        
                        <div class="form-group">
                            <label class="col-xs-3 col-sm-2 control-label">店铺省.市.区/县:</label>
                            <div class="col-xs-3 col-sm-2">
                                <select class="form-control m-b" name="pro_id">
                                    <option value="">--选择省--</option>
                                    <?php if(is_array($prores) || $prores instanceof \think\Collection || $prores instanceof \think\Paginator): $i = 0; $__LIST__ = $prores;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['zm']; ?>.<?php echo $vo['pro_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="col-xs-3 col-sm-2">
                                <select class="form-control m-b" name="city_id" id="cityname">
                                    <option value="">--选择市--</option>
                                </select>
                            </div>
                            <div class="col-xs-3 col-sm-2">
                                <select class="form-control m-b" name="area_id" id="areaname">
                                    <option value="">--选择区/县--</option>
                                </select>
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-2">
                                (请准确填写你店铺所在区域，以便用户查找你的店铺)
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">店铺详细地址:</label>
                            <div class="col-sm-4">
                                <input type="text" name="address" class="form-control" placeholder="请输入详细地址，如:XX楼XX层XX号">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-5">
                                (请准确填写你店铺所在地址，以便用户查找你的店铺)
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">店铺所在区域:</label>
                            <div class="col-sm-4">
                                <input type="text" name="latlon" class="form-control" placeholder="请输入店铺位置经纬度，打开地图复制即可">
                            </div>
                            <div class="col-sm-1"><button class="btn btn-info" type="button" id="zbxz">打开坐标选择器</button></div>
                            <div class="col-sm-4">
                                (请准确输入你店铺的定位，以便用户查找你的店铺)
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
						
						<div class="form-group">
						    <label class="col-sm-2 control-label">结算日期：</label>
						    <div class="col-sm-4">
						        <input type="text" name="settlement_date" value="" placeholder="请输入结算日期" class="form-control">
						    </div>
						    <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
							<div class="col-sm-4">(如：15即表示每月15日结算)</div>
						</div>
						<div class="hr-line-dashed"></div>
						
						<div class="form-group">
						    <label class="col-sm-2 control-label">服务费率：</label>
						    <div class="col-sm-4">
						        <input type="text" name="service_rate" value="" placeholder="请输入服务费率" class="form-control">
						    </div>
						    <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
							<div class="col-sm-4">(如：1即表示1%)</div>
						</div>
						<div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">店铺logo:</label>
                            <div class="col-sm-4">
                                <div style="margin-bottom:7px; margin-top:5px;">
                                    <img id="images_logo" src="/static/admin/img/nopic.jpg" width="100" height="100" border="0" />
                                    <br/><button type="button" class="btn btn-danger btn-xs dellogo" style="display:none;">删除</button>
                                </div>
                                <div id="uploaderInput_logo"></div>
                                <input type="hidden" name="logo" value="">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">公司法人身份证正面照片:</label>
                            <div class="col-sm-4">
                                <div style="margin-bottom:7px; margin-top:5px;">
                                    <img id="images_sfzz" src="/static/admin/img/nopic.jpg" width="150" height="100" border="0" />
                                    <br/><button type="button" class="btn btn-danger btn-xs delsfzz" style="display:none;">删除</button>
                                </div>
                                <div id="uploaderInput_sfzz"></div>
                                <input type="hidden" name="sfzz_pic" value="">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-5">
                                <img src="/static/admin/img/zheng1.jpg">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">公司法人身份证反面照片:</label>
                            <div class="col-sm-4">
                                <div style="margin-bottom:7px; margin-top:5px;">
                                    <img id="images_sfzb" src="/static/admin/img/nopic.jpg" width="150" height="100" border="0" />
                                    <br/><button type="button" class="btn btn-danger btn-xs delsfzb" style="display:none;" style="display:none;">删除</button>
                                </div>
                                <div id="uploaderInput_sfzb"></div>
                                <input type="hidden" name="sfzb_pic" value="">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-5">
                                <img src="/static/admin/img/fan.jpg">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">公司法人手持身份证照片:</label>
                            <div class="col-sm-4">
                                <div style="margin-bottom:7px; margin-top:5px;">
                                    <img id="images_frsfz" src="/static/admin/img/nopic.jpg" width="150" height="100" border="0" />
                                    <br/><button type="button" class="btn btn-danger btn-xs delfrsfz" style="display:none;" style="display:none;">删除</button>
                                </div>
                                <div id="uploaderInput_frsfz"></div>
                                <input type="hidden" name="frsfz_pic" value="">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-5">
                                <img src="/static/admin/img/faren.jpg">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">营业执照:</label>
                            <div class="col-sm-4">
                                <div style="margin-bottom:7px; margin-top:5px;">
                                    <img id="images_zhizhao" src="/static/admin/img/nopic.jpg" width="150" height="100" border="0" />
                                    <br/><button type="button" class="btn btn-danger btn-xs delzhizhao" style="display:none;">删除</button>
                                </div>
                                <div id="uploaderInput_zhizhao"></div>
                                <input type="hidden" name="zhizhao" value="">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-5">
                                <img src="/static/admin/img/yingye.jpg">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">用户ID：</label>
                            <div class="col-sm-4">
                                <input type="text" name="user_id" placeholder="用户ID" class="form-control">
                            </div>
                            <label class="col-sm-1" style="padding-top:7px;color:#F00; font-size:16px;">*</label>
                            <div class="col-sm-4">(请输入用户ID)</div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit" id="doSubmit">提交</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- 全局js -->
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- 自定义js -->
    <script type="text/javascript" src="/static/admin/Huploadify/jquery.Huploadify.js"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>	
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>
 
<script type="text/javascript">
    $(function(){
    	
    	$("#city_2").citySelect({prov:"请选择",city:"请选择",dist:"请选择"});

		$('#zbxz').click(function(){
			var zbUrl = "https://api.map.baidu.com/lbsapi/getpoint/index.html";
			layer.open({
				type : 2,
				title : '选择坐标',
				shadeClose : true,
				shade : 0.5,
				area : ['1000px','650px'],
				content : zbUrl
			});
		});
		
		$('select[name=indus_id]').change(function(){
			$('#goods_list').html('');
		});
    	
        $('select[name=pro_id]').change(function(){
        	var pro_id = $(this).val();
        	if(pro_id != '' && pro_id != 0){
        		$.ajax({
     			   url:"<?php echo url('apply_info/getcitylist'); ?>",
     			   type:'POST',
     			   data:{'pro_id':pro_id},
     		       dataType:'json',
     			   success:function(data){
     				   if(data){
                     	  var html = '';
                     	  var html='<option value="">--选择市--</option>';
                          $.each(data,function(i,v){
                         	 html+='<option value="'+v.id+'">'+v.zm+'.'+v.city_name+'</option>';
                          });
                      	  $('#cityname').html(html);
                      	  var html2='<option value="">--选择区/县--</option>';
                      	  $('#areaname').html(html2);
     				   }else{
     					  var html='<option value="">--选择市--</option>';
     					  var html2='<option value="">--选择区/县--</option>';
     					  $('#cityname').html(html);
     					  $('#areaname').html(html2);
     				   }
     			   }
     		    });
        	}else{
				var html='<option value="">--选择市--</option>';
		        var html2='<option value="">--选择区/县--</option>';
			    $('#cityname').html(html);
			    $('#areaname').html(html2);
        	}
        });            
        
        $('select[name=city_id]').change(function(){
        	var city_id = $(this).val();
        	if(city_id != '' && city_id != 0){
        		$.ajax({
     			   url:"<?php echo url('apply_info/getarealist'); ?>",
     			   type:'POST',
     			   data:{'city_id':city_id},
     		       dataType:'json',
     			   success:function(data){
     				   if(data){
                     	    var html = '';
                     	    var html='<option value="">--选择区/县--</option>';
                            $.each(data,function(i,v){
                         	   html+='<option value="'+v.id+'">'+v.zm+'.'+v.area_name+'</option>';
                            });
                      	   $('#areaname').html(html);
     				   }else{
     					   var html='<option value="">--选择区/县--</option>';
     					   $('#areaname').html(html);
     				   }
     			   }
     		    });
        	}else{
        		var html='<option value="">--选择区/县--</option>';
				$('#areaname').html(html);
        	}
        });
    	
    	
		//上传图片
	    $('#uploaderInput_logo').Huploadify({
            uploader : '<?php echo url("Common/Upload/uploadPic"); ?>',
	        method:'post',
	        formData:null,//发送给服务端的参数，格式：{key1:value1,key2:value2}
	        buttonText : '上传图像', 
	        removeTimeout: 2000,
	        fileTypeDesc:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;',  
	        fileTypeExts:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;', 
	        fileObjName: 'file', //上传附件$_FILE标识
	        fileSizeLimit : 2048,
	        //showUploadedPercent:false,//是否实时显示上传的百分比，如20%
	        auto : true, //开启,自动上传
	        multi : false, //开启,多选文件
	        //开始上传
			onUploadStart:function(file){
				layer.load(2);
			},
	        onUploadSuccess : function(file, data, response) {
	        	//解析成json对象
	        	eval('var data='+data);
	        	if(data.status == 200){
	        		var picpath = data.data.path;
    	        	$('#images_logo').attr('src',picpath);
    	        	$('.dellogo').show();
    	        	$('input[name=logo]').val(picpath);
	        	}else{
	        		layer.msg(data.mess, {icon: 2,time: 2000});
	        	}
	        },
	        //上传完成后执行的操作
	        onUploadComplete:function(file){
	        	layer.closeAll('loading');
	        },
	        //上传错误  
	        onUploadError : function(file, errorCode, errorMsg, errorString) { 
	        	layer.msg('文件' + file.name + '上传失败:' + errorString, {icon: 2,time: 2000}); 
	        }	    	
		});
        $('.dellogo').click(function(){
            $('input[name=logo]').val('');
            $('#images_logo').attr('src','/static/admin/img/nopic.jpg');
            $('.dellogo').hide();
        });

        //上传图片
        $('#uploaderInput_sfzz').Huploadify({
            uploader : '<?php echo url("Common/Upload/uploadPic"); ?>',
            method:'post',
            formData:null,//发送给服务端的参数，格式：{key1:value1,key2:value2}
            buttonText : '上传图像',
            removeTimeout: 2000,
            fileTypeDesc:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;',
            fileTypeExts:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;',
            fileObjName: 'file', //上传附件$_FILE标识
            fileSizeLimit : 2048,
            //showUploadedPercent:false,//是否实时显示上传的百分比，如20%
            auto : true, //开启,自动上传
            multi : false, //开启,多选文件
            //开始上传
            onUploadStart:function(file){
                layer.load(2);
            },
            onUploadSuccess : function(file, data, response) {
                //解析成json对象
                eval('var data='+data);
                if(data.status == 200){
                    var picpath = data.data.path;
                    $('#images_sfzz').attr('src',picpath);
                    $('.delsfzz').show();
                    $('input[name=sfzz_pic]').val(picpath);
                }else{
                    layer.msg(data.mess, {icon: 2,time: 2000});
                }
            },
            //上传完成后执行的操作
            onUploadComplete:function(file){
                layer.closeAll('loading');
            },
            //上传错误
            onUploadError : function(file, errorCode, errorMsg, errorString) {
                layer.msg('文件' + file.name + '上传失败:' + errorString, {icon: 2,time: 2000});
            }
        });

        $('.delsfzz').click(function(){
            $('input[name=sfzz_pic]').val('');
            $('#images_sfzz').attr('src','/static/admin/img/nopic.jpg');
            $('.delsfzz').hide();
		});
		
	    $('#uploaderInput_sfzb').Huploadify({
            uploader : '<?php echo url("Common/Upload/uploadPic"); ?>',
	        method:'post',
	        formData:null,//发送给服务端的参数，格式：{key1:value1,key2:value2}
	        buttonText : '上传图像', 
	        removeTimeout: 2000,
	        fileTypeDesc:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;',  
	        fileTypeExts:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;', 
	        fileObjName: 'file', //上传附件$_FILE标识
	        fileSizeLimit : 2048,
	        //showUploadedPercent:false,//是否实时显示上传的百分比，如20%
	        auto : true, //开启,自动上传
	        multi : false, //开启,多选文件
	        //开始上传
			onUploadStart:function(file){
				layer.load(2);
			},
	        onUploadSuccess : function(file, data, response) {
	        	//解析成json对象
	        	eval('var data='+data);
                if(data.status == 200){
                    var picpath = data.data.path;
    	        	$('#images_sfzb').attr('src',picpath);
    	        	$('.delsfzb').show();
    	        	$('input[name=sfzb_pic]').val(picpath);
	        	}else{
	        		layer.msg(data.msg, {icon: 2,time: 2000});
	        	}
	        },
	        //上传完成后执行的操作
	        onUploadComplete:function(file){
	        	layer.closeAll('loading');
	        },
	        //上传错误  
	        onUploadError : function(file, errorCode, errorMsg, errorString) { 
	        	layer.msg('文件' + file.name + '上传失败:' + errorString, {icon: 2,time: 2000}); 
	        }	    	
		}); 
		
		$('.delsfzb').click(function(){
            $('input[name=sfzb_pic]').val('');
            $('#images_sfzb').attr('src','/static/admin/img/nopic.jpg');
            $('.delsfzb').hide();
		});
		
	    $('#uploaderInput_frsfz').Huploadify({
            uploader : '<?php echo url("Common/Upload/uploadPic"); ?>',
	        method:'post',
	        formData:null,//发送给服务端的参数，格式：{key1:value1,key2:value2}
	        buttonText : '上传图像', 
	        removeTimeout: 2000,
	        fileTypeDesc:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;',  
	        fileTypeExts:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;', 
	        fileObjName: 'file', //上传附件$_FILE标识
	        fileSizeLimit : 2048,
	        //showUploadedPercent:false,//是否实时显示上传的百分比，如20%
	        auto : true, //开启,自动上传
	        multi : false, //开启,多选文件
	        //开始上传
			onUploadStart:function(file){
				layer.load(2);
			},
	        onUploadSuccess : function(file, data, response) {
	        	//解析成json对象
	        	eval('var data='+data);
                if(data.status == 200){
                    var picpath = data.data.path;
    	        	$('#images_frsfz').attr('src',picpath);
    	        	$('.delfrsfz').show();
    	        	$('input[name=frsfz_pic]').val(picpath);
	        	}else{
	        		layer.msg(data.msg, {icon: 2,time: 2000});
	        	}
	        },
	        //上传完成后执行的操作
	        onUploadComplete:function(file){
	        	layer.closeAll('loading');
	        },
	        //上传错误  
	        onUploadError : function(file, errorCode, errorMsg, errorString) { 
	        	layer.msg('文件' + file.name + '上传失败:' + errorString, {icon: 2,time: 2000}); 
	        }	    	
		});
		
		$('.delfrsfz').click(function(){
            $('input[name=frsfz_pic]').val('');
            $('#images_frsfz').attr('src','/static/admin/img/nopic.jpg');
            $('.delfrsfz').hide();
		});
		
	    $('#uploaderInput_zhizhao').Huploadify({
            uploader : '<?php echo url("Common/Upload/uploadPic"); ?>',
	        method:'post',
	        formData:null,//发送给服务端的参数，格式：{key1:value1,key2:value2}
	        buttonText : '上传图像', 
	        removeTimeout: 2000,
	        fileTypeDesc:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;',  
	        fileTypeExts:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;', 
	        fileObjName: 'file', //上传附件$_FILE标识
	        fileSizeLimit : 2048,
	        //showUploadedPercent:false,//是否实时显示上传的百分比，如20%
	        auto : true, //开启,自动上传
	        multi : false, //开启,多选文件
	        //开始上传
			onUploadStart:function(file){
				layer.load(2);
			},
	        onUploadSuccess : function(file, data, response) {
	        	//解析成json对象
	        	eval('var data='+data);
	        	if(data.status == 200){
	        		var picpath = data.data.path;
    	        	$('#images_zhizhao').attr('src',picpath);
    	        	$('.delzhizhao').show();
    	        	$('input[name=zhizhao]').val(picpath);
	        	}else{
	        		layer.msg(data.msg, {icon: 2,time: 2000});
	        	}
	        },
	        //上传完成后执行的操作
	        onUploadComplete:function(file){
	        	layer.closeAll('loading');
	        },
	        //上传错误  
	        onUploadError : function(file, errorCode, errorMsg, errorString) { 
	        	layer.msg('文件' + file.name + '上传失败:' + errorString, {icon: 2,time: 2000}); 
	        }	    	
		});
		
		$('.delzhizhao').click(function(){
            $('input[name=zhizhao]').val('');
            $('#images_zhizhao').attr('src','/static/admin/img/nopic.jpg');
            $('.delzhizhao').hide();
		});
		
		//手机号验证
    	jQuery.validator.addMethod("phone", function(value, element){   
    	    var tel = /^1[3456789]\d{9}$/;
    	    return this.optional(element) || (tel.test(value));
    	}, "手机格式不正确");
		
    	jQuery.validator.addMethod("riqi", function(value, element){   
    	    var tel = /^([0-9]{4})-([0-9]{2})-([0-9]{2})$/;
    	    return this.optional(element) || (tel.test(value));
    	}, "日期格式不正确");
        
	    var icon = "<i class='fa fa-times-circle'></i>&nbsp;&nbsp;";
    	$('#form').validate({
        	errorElement : 'span',
        	debug: true,//只验证不提交表单
        	//layer ajax提交表单
            submitHandler:function(){
               // 序列化 表单数据 后提交 ，太简洁了
               	layer.load(2);
	
				$.ajax({
					url:applyUrl,
					type:'POST',
					data:$('#form').serialize(),
					dataType:"json",
					success:function(data){
						if(data.status == 1){
							layer.closeAll('loading');
				        	layer.msg(data.mess, {icon: 1,time: 1000},function(){
				                cl();
				         	});	
						}else if(data.status == 2){
							layer.closeAll('loading');
							layer.msg(data.mess, {icon: 2,time: 2000},function(){
								location.href="<?php echo url('login/index'); ?>";
							});
						}else{
							layer.closeAll('loading');
							layer.msg(data.mess, {icon: 2,time: 2000});
						}
				    },
			        error:function(){
			        	layer.closeAll('loading');
			        	layer.msg('操作失败或您没有权限，请重试', {icon: 2,time: 2000});
			        }
			   });
               return false;
            },//这是关键的语句，配置这个参数后表单不会自动提交，验证通过之后会去调用的方法
                
        	rules:{
        		com_name:{
        			required:true,
        			maxlength:25
        	    },
        		nature:{
        			required:true,
        			maxlength:20
        		},
        		com_province:{
        			required:true,
        			maxlength:15
        		},
        		com_city:{
        			required:true,
        			maxlength:15
        		},
        		com_area:{
        			required:true,
        			maxlength:15
        		},
        		com_address:{
        			required:true,
        			maxlength:50
        		},
        		fixed_phone:{
        			required:true,
        			maxlength:15
        		},
        		com_email:{
        			required:true,
        			email:true
        	    },
        		zczj:{required:true},
        	    tyxydm:{
        			required:true,
        			rangelength:[18,18]
        	    },
        	    faren_name:{
        			required:true,
        			rangelength:[2,5]
        	    },
        	    zzstart_time:{
        	    	required:true,
        	    	riqi:true
        	    },
        	    zzend_time:{
        	    	required:true,
        	    	riqi:true
        	    },
        	    jyfw:{
        			required:true,
        			maxlength:100
        	    },
        		shop_name:{
        			required:true,
	        		remote : {
	        			url : checkShopname,
	        			type : 'post',
	        			dataType : 'json',
	        			data : {
	        				shop_name : function () {
	        				  return $('input[name=shop_name]').val();
	        			    }
	        		    }
		        	},
        	        maxlength:25
        		},
        		shop_desc:{
        			required:true,
        			maxlength:50
        		},
        		indus_id:{
        			required:true,
        			digits:true
        	    },
        	    contacts:{
        	    	required:true,
        	    	rangelength:[2,5]
        	    },
        		telephone:{
	        		required:true,
	        		phone:true
	        	},
        		email:{
	        		required:true,
	        		email:true
	        	},
        		sfz_num:{
        			required:true,
        			rangelength:[18,18]
        		},
        		pro_id:{
        			required:true,
        			digits:true
        		},
        		city_id:{
        			required:true,
        			digits:true
        		},
        		area_id:{
        			required:true,
        			digits:true
        		},
        		address:{
        			required:true,
        			maxlength:50
        		},
        		latlon:{
        			required:true,
        			maxlength:30
        		},
                user_id:{
        		    required:true,
                    digits:true
                }
        	},
        		
        	messages:{
        		com_name:{
        			required:icon+'必填',
        			maxlength:icon+'最多25个字符'
        		},
        		nature:{
        			required:icon+'必选',
        			maxlength:icon+'最多20个字符'
        		},
        		com_province:{
        			required:icon+'必选',
        			maxlength:icon+'最多15个字符'
        		},
        		com_city:{
        			required:icon+'必选',
        			maxlength:icon+'最多15个字符'
        		},
        		com_area:{
        			required:icon+'必选',
        			maxlength:icon+'最多15个字符'
        		},
        		com_address:{
        			required:icon+'必填',
        			maxlength:icon+'最多50个字符'
        		},
        		fixed_phone:{
        			required:icon+'必填',
        			maxlength:icon+'最多15个字符'
        		},
        		com_email:{
        			required:icon+'必填',
        			email:icon+'邮箱格式错误'
        		},
        		zczj:{required:icon+'必填'},
        		tyxydm:{
        			required:icon+'必填',
        			rangelength:icon+'为18位字符'
        		},
        		faren_name:{
        			required:icon+'必填',
        			rangelength:icon+'为2-5位字符'
        		},
        	    zzstart_time:{
        			required:icon+'必填',
        			riqi:icon+'日期格式不正确'
        	    },
        	    zzend_time:{
        			required:icon+'必填',
        			riqi:icon+'日期格式不正确'
        	    },
        	    jyfw:{
          			required:icon+'必填',
        			maxlength:icon+'最多100位字符'
        	    },
        		shop_name:{
        			required:icon+'必填',
        			remote:icon+'商家名称已存在',
        			maxlength:icon+'最多25位字符'
        		},
        		shop_desc:{
        			required:icon+'必填',
        			maxlength:icon+'最多50位字符'
        		},
                indus_id:{
                	required:icon+'必选',
                	digits:icon+'选择行业参数错误'
                },
                contacts:{
                	required:icon+'必填',
                	rangelength:icon+'为2-5位字符'
                },
        		telephone:{
        			required:icon+'必填',
        			phone:icon+'手机号格式不正确'
        		},
        		email:{
        			required:icon+'必填',
        			email:icon+'邮箱格式不正确'
        		},
        		sfz_num:{
        			required:icon+'必填',
        			rangelength:icon+'为18位字符'
        		},
        		pro_id:{
        			required:icon+'必选',
        			digits:icon+'省份id必须是整数'
        		},
        		city_id:{
        			required:icon+'必选',
        			digits:icon+'城市id必须是整数'
        		},
        		area_id:{
        			required:icon+'必选',
        			digits:icon+'区县id必须是整数'
        		},
        		address:{
        			required:icon+'必填',
        			maxlength:icon+'最多50位字符'
        		},
        		latlon:{
        			required:icon+'必填',
        			maxlength:icon+'最多30位字符'
        		},
                user_id:{
        		    required:icon+'必填',
                    digits:icon+'用户id必须是整数'
                }
        	}
    	});
		
    });
    
    function selectGoods(){
  	    var indus_id = $("#indus_id option:selected").val();
  	  
  	    if(!indus_id){
  		    layer.msg('请选择主营行业', {icon: 2,time: 2000});
		    return false;
  	    }
  	  
        var goods_id = new Array();
        //过滤选择重复信息
        $('input[name*=goods_id]').each(function(i,o){
            goods_id.push($(o).val());
        });
        
    	var html = '<tr><th style="width:85%">类目名称</th><th style="width:15%">操作</th></tr>';
      	var goodsurl = gurl+"/getcates/lst/indus_id/"+indus_id+"/goods_id/"+goods_id;
      	$('.biaoge').html(html);
        
        layer.open({
            type: 2,
            title: '选择经营类目',
            shadeClose: true,
            shade: 0.3,
            area: ['70%', '80%'],
            content: goodsurl,
        });
    }

    function call_backgoods(table_html){
        layer.closeAll('iframe');
        $('#goods_list').append(table_html);
    }
    
    function cl(){
    	location.href="<?php echo url('apply_info/lst'); ?>";
    }


</script>
</body>
</html>
