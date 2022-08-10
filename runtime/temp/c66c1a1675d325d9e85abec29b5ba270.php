<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/ywscs.com/public/../application/admin/view/order_timeout/info.html";i:1640166871;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="favicon.ico"> 
	<link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/uploadify/uploadify.css"/>
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script type="text/javascript" src="/static/admin/js/jquery.cityselect.js?1"></script>
</head>

<script>
var url = "<?php echo url('order_timeout/info'); ?>";
var infoUrl = "<?php echo url('order_timeout/info'); ?>";
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
                        <h5>订单超时信息配置</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" enctype="multipart/form-data" class="form-horizontal" id="form"> 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">普通订单关闭时间（小时）</label>
                                <div class="col-sm-6">
                                    <input type="text" name="normal_out_order" <?php if(isset($order_timeouts['normal_out_order'])): ?>value="<?php echo $order_timeouts['normal_out_order']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>                          							                                                                                                 

                            <div class="form-group">
                                <label class="col-sm-2 control-label">秒杀订单关闭时间（分钟）</label>
                                <div class="col-sm-6">
                                    <input type="text" name="rushactivity_out_order" <?php if(isset($order_timeouts['rushactivity_out_order'])): ?>value="<?php echo $order_timeouts['rushactivity_out_order']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>   
                            
<!--                            <div class="form-group">-->
<!--                                <label class="col-sm-2 control-label">团购订单关闭时间（分钟）</label>-->
<!--                                <div class="col-sm-6">-->
<!--                                    <input type="text" name="group_out_order" <?php if(isset($order_timeouts['group_out_order'])): ?>value="<?php echo $order_timeouts['group_out_order']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">-->
<!--                                </div>-->
<!--                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>-->
<!--                            </div>-->
<!--                            <div class="hr-line-dashed"></div>-->
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">拼团订单自动关闭时间（分钟）</label>
                                <div class="col-sm-6">
                                    <input type="text" name="assemorder_timeout" <?php if(isset($order_timeouts['assemorder_timeout'])): ?>value="<?php echo $order_timeouts['assemorder_timeout']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div> 
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">拼团订单未成团过期关闭时间（小时）</label>
                                <div class="col-sm-6">
                                    <input type="text" name="assem_timeout" <?php if(isset($order_timeouts['assem_timeout'])): ?>value="<?php echo $order_timeouts['assem_timeout']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">过期自动确认收货时间（天）</label>
                                <div class="col-sm-6">
                                    <input type="text" name="zdqr_sh_time" <?php if(isset($order_timeouts['zdqr_sh_time'])): ?>value="<?php echo $order_timeouts['zdqr_sh_time']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">商家审核售后订单过期时间（天）</label>
                                <div class="col-sm-6">
                                    <input type="text" name="check_timeout" <?php if(isset($order_timeouts['check_timeout'])): ?>value="<?php echo $order_timeouts['check_timeout']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">商家退款过期时间（天）</label>
                                <div class="col-sm-6">
                                    <input type="text" name="shoptui_timeout" <?php if(isset($order_timeouts['shoptui_timeout'])): ?>value="<?php echo $order_timeouts['shoptui_timeout']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户发货过期时间（天）</label>
                                <div class="col-sm-6">
                                    <input type="text" name="yhfh_timeout" <?php if(isset($order_timeouts['yhfh_timeout'])): ?>value="<?php echo $order_timeouts['yhfh_timeout']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">换货用户确认收货过期时间（天）</label>
                                <div class="col-sm-6">
                                    <input type="text" name="yhshou_timeout" <?php if(isset($order_timeouts['yhshou_timeout'])): ?>value="<?php echo $order_timeouts['yhshou_timeout']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">订单到期自动好评时间（天）</label>
                                <div class="col-sm-6">
                                    <input type="text" name="comment_timeout" <?php if(isset($order_timeouts['comment_timeout'])): ?>value="<?php echo $order_timeouts['comment_timeout']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">自动好评类容</label>
                                <div class="col-sm-6">
                                    <input type="text" name="comment_content" <?php if(isset($order_timeouts['comment_content'])): ?>value="<?php echo $order_timeouts['comment_content']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                           
                           <?php if(!empty($order_timeouts['id'])): ?> 
                           <input type="hidden" name="id" value="<?php echo $order_timeouts['id']; ?>">
                           <?php endif; ?>
                           
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" id="doSubmit" style="margin-right:100px;">保存内容</button>
                                    <button type="reset" class="btn btn-default">重置</button>
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
    <script type="text/javascript" src="/static/uploadify/jquery.uploadify.min.js"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>	
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>      

	<script>
    	$(function(){    		
    	    var icon = "<i class='fa fa-times-circle'></i>&nbsp;&nbsp;";
        	$('#form').validate({
	        	errorElement : 'span',
	        	debug: true,//只验证不提交表单
	        	//layer ajax提交表单
	            submitHandler:function(){
	               // 序列化 表单数据 后提交 ，太简洁了
	            	post(infoUrl,'POST',$('#form').serialize(),1);
	                return false;
	            },//这是关键的语句，配置这个参数后表单不会自动提交，验证通过之后会去调用的方法
	                
	        	rules:{
	        		normal_out_order:{required:true},
	        		rushactivity_out_order:{required:true},
	        		group_out_order:{required:true},
	        		assemorder_timeout:{required:true},
	        		assem_timeout:{required:true},
	        		zdqr_sh_time:{required:true},
	        		check_timeout:{required:true},
	        		shoptui_timeout:{required:true},
	        		yhfh_timeout:{required:true},
	        		yhshou_timeout:{required:true}
	        	},
	        		
	        	messages:{
	        		normal_out_order:{required:icon+'必填'},
	        		rushactivity_out_order:{required:icon+'必填'},
	        		group_out_order:{required:icon+'必填'},
	        		assemorder_timeout:{required:icon+'必填'},
	        		assem_timeout:{required:icon+'必填'},
	        		zdqr_sh_time:{required:icon+'必填'},
	        		check_timeout:{required:icon+'必填'},
	        		shoptui_timeout:{required:icon+'必填'},
	        		yhfh_timeout:{required:icon+'必填'},
	        		yhshou_timeout:{required:icon+'必填'},
	        	}
        	});
      });
    	
	  function cl(){
	     location.href = url;
	  }	  
    </script>
        

</body>
</html>
