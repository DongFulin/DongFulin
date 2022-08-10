<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/www/wwwroot/ywscs.com/public/../application/admin/view/nav/edit.html";i:1618769683;}*/ ?>
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
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
</head>

<script>
var pnum = <?php echo $pnum; ?>;
<?php if((!isset($search)) || !$search): ?>
var url = "/<?php echo \think\Request::instance()->module(); ?>/nav/lst.html?page="+pnum;
<?php else: ?>
var url = "/<?php echo \think\Request::instance()->module(); ?>/nav/search.html?page="+pnum;
<?php endif; ?>
var updateUrl = "<?php echo url('nav/edit'); ?>";
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
                        <h5>编辑导航位</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" id="form"> 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">导航位名称</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nav_name" value="<?php echo $navs['nav_name']; ?>" class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>                       							                  

                            <input type="hidden" name="id" value="<?php echo $navs['id']; ?>" />                                                                                                       
                            
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" id="doSubmit">保存内容</button>
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
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>	
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/uploadify/jquery.uploadify.min.js"></script>
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
	        	    nav_name:{required:true},
	        	},

	        	messages:{
	        		nav_name:{required:icon+'必填'},
	        	}
        	});
      });

	  function cl(){
		  parent.location.href = url;
	  }	  
    </script>

</body>
</html>