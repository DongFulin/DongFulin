<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/www/wwwroot/ywscs.com/public/../application/admin/view/cation/edit.html";i:1618769683;}*/ ?>
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
var url = "<?php echo url('cation/lst'); ?>";
var updateUrl = "<?php echo url('cation/edit'); ?>";
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
                        <h5>编辑配置分类</h5>
                    </div>
                    <div class="ibox-content">
                    <form method="post" class="form-horizontal" id="form">         
                            <div class="form-group">
                                <label class="col-sm-2 control-label">分类名称：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ca_name" value="<?php echo $cations['ca_name']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>                           

                            <div class="form-group">
                                <label class="col-sm-2 control-label">排序：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sort" value="<?php echo $cations['sort']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>                                                

                            <input type="hidden" name="id" value="<?php echo $cations['id']; ?>" />

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" id="doSubmit">保存</button>
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
	        		ca_name:{required:true},
	        		sort:{
	        			required:true,
	        			digits:true
	        	    }
	        	},

	        	messages:{
	        		ca_name:{required:icon+'必填'},
	                sort:{
	                	required:icon+'必填',
	                	digits:icon+'排序必须是整数'
	                }
	        	}
            });
      }); 

      function cl(){
    	  parent.location.href = url;
      }
    </script>

</body>
</html>