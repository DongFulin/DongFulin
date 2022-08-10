<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/ywscs.com/public/../application/admin/view/manage_cate/info.html";i:1618769683;}*/ ?>
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
    <script src="/static/admin/js/double-date.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.all.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/static/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>

<script>
var filter = <?php echo $filter; ?>;
var pnum = <?php echo $pnum; ?>;

<?php if((!isset($search)) OR (!$search)): ?>
var url = "/<?php echo \think\Request::instance()->module(); ?>/manage_cate/lst/filter/"+filter+".html?page="+pnum;
<?php else: ?>
var url = "/<?php echo \think\Request::instance()->module(); ?>/manage_cate/search.html?page="+pnum;
<?php endif; ?>

var checkedUrl = "<?php echo url('manage_cate/checked'); ?>";
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
                        <h5>审核商家经营类目</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">状态：</label>
                                <div class="col-sm-6">
                                    <div style="font-size:14px; width:500px; height:35px; line-height:35px;">
                                    <?php switch($manages['checked']): case "0": ?>
                                    <span style="color:#1c84c6;">待审核</span>
                                    <?php break; case "1": ?>
                                    <span style="color:#1992FC;">已通过</span>
                                    <?php break; case "2": ?>
                                    <span style="color:#ed5565;">已拒绝</span>
                                    <?php break; endswitch; ?>
                                    </div>
                                </div>     
                            </div>
                            <div class="hr-line-dashed"></div>
                        
                            <div class="form-group">
                                <label class="col-sm-2 control-label">申请类目：</label>
                                <div class="col-sm-6">
                                    <div style="font-size:14px; width:500px; height:35px; line-height:35px;"><?php echo $manages['cate_name']; ?></div>
                                </div>     
                            </div>
                            <div class="hr-line-dashed"></div>
                                                    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">所属商家：</label>
                                <div class="col-sm-6">
                                    <div style="font-size:14px; width:500px; height:35px; line-height:35px;"><?php echo $manages['shop_name']; ?></div>
                                </div>     
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">商家主营行业：</label>
                                <div class="col-sm-6">
                                    <div style="font-size:14px; width:500px; height:35px; line-height:35px;"><?php echo $manages['industry_name']; ?></div>
                                </div>     
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">申请时间：</label>
                                <div class="col-sm-6">
                                    <div style="font-size:14px; width:500px; height:35px; line-height:35px;"><?php echo date('Y-m-d H:i:s',$manages['apply_time']); ?></div>
                                </div>     
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <?php if($manages['checked_time']): ?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">审核时间：</label>
                                <div class="col-sm-6">
                                    <div style="font-size:14px; width:500px; height:35px; line-height:35px;"><?php echo date('Y-m-d H:i:s',$manages['checked_time']); ?></div>
                                </div>     
                            </div>
                            <div class="hr-line-dashed"></div>
                            <?php endif; ?>
                        </div>
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


</body>
</html>