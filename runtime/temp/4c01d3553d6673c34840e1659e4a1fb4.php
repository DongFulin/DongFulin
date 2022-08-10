<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/www/wwwroot/ywscs.com/public/../application/admin/view/member/edit.html";i:1640249528;}*/ ?>
<!--
 * @Descripttion: 
 * @Author: cbing
 * @Date: 2019-09-15 16:11:04
 * @LastEditors: cbing
 * @LastEditTime: 2019-09-15 16:12:15
 -->
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
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<script>
var url = "<?php echo url('member/lst'); ?>";
var updateUrl = "<?php echo url('member/edit'); ?>";
var checkUsername = "<?php echo url('member/checkUsername'); ?>";
var checkPhone = "<?php echo url('member/checkPhone'); ?>";
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
                        <h5>编辑用户信息</h5>
                    </div>
                    <div class="ibox-content">
                    <form method="post" class="form-horizontal" id="form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-6">
                                <input type="text" name="user_name" value="<?php echo $user['user_name']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">手机</label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" value="<?php echo $user['phone']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">积分</label>
                            <div class="col-sm-6">
                                <input type="text" name="integral" value="<?php echo $user['integral']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">登录密码</label>
                            <div class="col-sm-6">
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">支付密码</label>
                            <div class="col-sm-6">
                                <input type="text" name="paypwd" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" id="doSubmit" style="margin-right:20px;">保存</button>
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
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- 自定义js -->
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>	
    <script src="/static/admin/js/content.js?v=1.0.0"></script>
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>

	 <script>	
    	$(function(){    		
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

    	    var icon = "<i class='fa fa-times-circle'></i>&nbsp;&nbsp;";
        	$('#form').validate({
	            errorElement : 'span',
	        	debug: true,//只验证不提交表单
	            //layer ajax提交表单
	            submitHandler:function(){
	               // 序列化 表单数据 后提交 ，太简洁了
	            	post(updateUrl,'POST',$('#form').serialize(),1);
	                return false;
	            },//这是关键的语句，配置这个参数后表单不会自动提交，验证通过之后会去调用的方法

                rules:{
                    user_name:{
                        required:true,
                    },
                    phone:{
                        required:true,
                    },

                },

                messages:{
                    user_name:{
                        required:icon+'必填',
                        remote:icon+'已存在'
                    },
                    phone:{
                        required:icon+'必填',
                        remote:icon+'已存在'
                    },
                }
            });
      }); 

      function cl(){
    	  parent.location.href = url;
      }
    </script>

</body>
</html>