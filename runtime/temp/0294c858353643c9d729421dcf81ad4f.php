<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/ywscs.com/public/../application/admin/view/assem_content/info.html";i:1618769683;}*/ ?>
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
    <link href="/static/admin/css/double-date.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/uploadify/uploadify.css"/>
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.all.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/static/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>

<script>
var url = "<?php echo url('assem_content/info'); ?>";
var insertUrl = "<?php echo url('assem_content/info'); ?>";
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
                        <h5>设置拼团规则介绍</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" id="form">
                        
                            <div class="form-group" style="margin-top:20px;">
                                <label class="col-sm-2 control-label">拼团规则信息：</label>
                                <div class="col-sm-10">
                                    <textarea id="content" name="content"><?php if(isset($infos) && $infos): ?><?php echo $infos['content']; endif; ?></textarea>
                                </div>  
                            </div>
                            <div class="hr-line-dashed"></div>
                                                 
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
    
    <script type="text/javascript">
		//实例化编辑器
		//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
		UE.getEditor('content', {initialFrameWidth:'100%', initialFrameHeight:500, enterTag:''}); 
	</script>

	<script>
    	$(function(){  
    	    var icon = "<i class='fa fa-times-circle'></i>&nbsp;&nbsp;";
        	$('#form').validate({
	        	errorElement : 'span',
	        	debug: true,//只验证不提交表单
	            //layer ajax提交表单
	            submitHandler:function(){
	                // 序列化 表单数据 后提交 ，太简洁了
	                post(insertUrl,'POST',$('#form').serialize(),1);
	                return false;
	            },//这是关键的语句，配置这个参数后表单不会自动提交，验证通过之后会去调用的方法
	                
	        	rules:{
	        		content:{required:true}
	        	},
	        		
	        	messages:{
	        		content:{required:icon+'必填'}
	        	}
            });
      });
    	
      function cl(){
    	  location.href = url;
      }
    </script>

</body>
</html>