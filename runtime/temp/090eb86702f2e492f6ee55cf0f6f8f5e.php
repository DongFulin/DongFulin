<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/www/wwwroot/ywscs.com/public/../application/admin/view/login/index.html";i:1640077205;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>总台管理-<?php echo $webconfig['webtitle']; ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="/favicon.ico">
	<link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
    <style>
        input.error{
            border:1px solid red;
        }
        span.error{
            padding-top:10px;
            color: #f00;
            font-size:12px;
        }
        .gray-bg{
            background:url("/static/admin/img/z-backstage-a.jpg") no-repeat center fixed;
            background-size: 100% 100%;
            height: auto;
        }
        .backStagea{
            width: 825px;
            margin: 0 auto;
            margin-top: 150px;
        }
        .backStageb{
            width: 100%;
            height: 100%;
            height: 350px;
            display: flex;
            flex-wrap: wrap;
            /*justify-content:center;*/
        }
        .backStagec{
            width: 100%;
            height: 80px;
            background:url("/static/admin/img/z-backstage-b.png") no-repeat center center;
            background-size: contain;
        }
        .backStaged{
            width: 510px;
            height: 350px;
            background:url("/static/admin/img/z-backstage-d.png") no-repeat;
            background-size: 100% 100%;
        }
        .backStagee{
            display: flex;
            margin-top: 30px;
            position: relative;
        }
        .backStagef{
            width: 260px;
            height: 315px;
            position: absolute;
            /* top: 100px; */
            background: #fff;
            right: -208px;
            top: 16px;
            border-radius:0 10px 10px 0;
        }
        .backStageg{
            color: #474747;
            font-size: 22px;
            line-height: 30px;
            margin-top: 25px;
            letter-spacing: 2px;
        }
        .backStageg>span{
            font-size: 24px;
        }
        .backStageh{
            width: 80%;
            margin: 0 auto;
            border:none;
            border-bottom: 1px #e5e6e7 solid;
            padding-left: 35px;
            background:url("/static/admin/img/z-backstage-ren.png")no-repeat 12px center;
        }
        .backStagei{
            width: 80%;
            margin: 0 auto;
            border:none;
            border-bottom: 1px #e5e6e7 solid;
            padding-left: 35px;
            background:url("/static/admin/img/z-backstage-suo.png")no-repeat 12px center;
        }
        .backStagej{
            width: 80%;
            height: 40px;
            border-radius:10px;
            border: none;
            outline:none;
            background: url("/static/admin/img/z-backstage-c.png")no-repeat;
            background-size: 100% 100%;
            position: absolute;
            left: 30px;
            bottom: 40px;
        }
        .copyright-bottom{
            width: 100%;
            position: fixed;
            bottom: 0;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #9e9e9e;
            line-height: 50px;
        }
    </style>
</head>
<script>
var loginUrl = "<?php echo url('login/index'); ?>";
var url = "<?php echo url('index/index'); ?>";
</script>

<body class="gray-bg">


    <div class=" text-center loginscreen  animated fadeInDown backStagea">
        <ul class="backStageb">
            <li class="backStagec"></li>
            <li>
                <ul class="backStagee">
                    <li class="backStaged"><li>
                    <li class="backStagef">
                        <div>
                            <h3 class="backStageg"><span>欢迎登录</span></br>电商平台管理系统</h3>
                            <form class="m-t" method="post" id="form">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control backStageh" placeholder="请输入用户名" >
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control  backStagei" placeholder="请输入密码" >
                                </div>
                                <button type="submit" id="submitBtn" class="backStagej"></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="copyright-bottom"><?php echo $webconfig['web_banquan']; ?></div>

    <!-- 全局js -->
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
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
               post(loginUrl,'POST',$('#form').serialize(),1);
               return false;
            },//这是关键的语句，配置这个参数后表单不会自动提交，验证通过之后会去调用的方法

        	rules:{
        		username:{required:true},
        		password:{required:true},
        	},

        	messages:{
                username:{required:icon+'必填'},
                password:{required:icon+'必填'},
        	}
    	});
    });
    function cl(){
    	location.href=url;
    }
    </script>
</body>
</html>
