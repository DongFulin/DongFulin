<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/ywscs.com/public/../application/admin/view/shop_shdz/info.html";i:1618769683;}*/ ?>
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
var url = "<?php echo url('shop_shdz/info'); ?>";
var infoUrl = "<?php echo url('shop_shdz/info'); ?>";
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
                        <h5>自营售后地址</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" enctype="multipart/form-data" class="form-horizontal" id="form"> 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">收货人姓名：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" <?php if(!empty($dizhis['name'])): ?>value="<?php echo $dizhis['name']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>                          							                                                                                                 

                            <div class="form-group">
                                <label class="col-sm-2 control-label">收货人手机号：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="telephone" <?php if(!empty($dizhis['telephone'])): ?>value="<?php echo $dizhis['telephone']; ?>"<?php else: ?>value=""<?php endif; ?> class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">省市区：</label>
                                <div class="col-sm-6">
                                <div id="city_1">
                                <select class="prov form-control m-b" style="width:30%; float:left; margin-right:10px;" id="province" name="province"></select> 
					            <select class="city form-control m-b" style="width:30%; float:left; margin-right:10px;" id="city" name="city" disabled="disabled"></select>
					            <select class="dist form-control m-b" style="width:30%; float:left; margin-right:10px;" id="area" name="area" disabled="disabled"></select>
                                </div>
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>

                           <div class="form-group">
                           <label class="col-sm-2 control-label">详细地址：</label>
                                <div class="col-sm-6">
                                    <textarea name="address" class="form-control"><?php if(!empty($dizhis['address'])): ?><?php echo $dizhis['address']; endif; ?></textarea>
                                </div>  
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                           </div>
                           <div class="hr-line-dashed"></div>  
                           
                           <?php if(!empty($dizhis['id'])): ?> 
                           <input type="hidden" name="id" value="<?php echo $dizhis['id']; ?>">
                           <?php endif; ?>
                           
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" id="doSubmit">保存内容</button>
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
    		<?php if(!empty($dizhis)): ?>
    		$("#city_1").citySelect({prov:"<?php echo $dizhis['province']; ?>",city:"<?php echo $dizhis['city']; ?>",dist:"<?php echo $dizhis['area']; ?>"});
    		<?php else: ?>
    		$("#city_1").citySelect({prov:"北京",nodata:"none"});
    		<?php endif; ?>
    		//手机号验证
        	jQuery.validator.addMethod("phone", function(value, element){   
        	    var tel = /^1[3456789]\d{9}$/;
        	    return this.optional(element) || (tel.test(value));
        	}, "手机格式不正确");
    		
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
	        		name:{required:true},
	        		telephone:{
		        		required:true,
		        		phone:true
		        	},
	        		province:{required:true},
	        		city:{required:true},
	        		area:{required:true},
	        		address:{required:true},
	        	},
	        		
	        	messages:{
	        		name:{required:icon+'必填'},
	        		telephone:{
	        			required:icon+'必填',
	        			phone:icon+'手机号格式不正确'
	        		},
	        		province:{required:icon+'必选'},
	        		city:{required:icon+'必选'},
	        		area:{required:icon+'必选'},
	        	    address:{required:icon+'必填'},
	        	}
        	});
      });
    	
	  function cl(){
	     location.href = url;
	  }	  
    </script>
        

</body>
</html>
