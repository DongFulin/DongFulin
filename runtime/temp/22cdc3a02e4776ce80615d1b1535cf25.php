<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/www/wwwroot/ywscs.com/public/../application/admin/view/uni_push/lst.html";i:1618769683;}*/ ?>
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
    <link href="/static/admin/css/page.css" rel="stylesheet">
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<script>
var url = "/<?php echo \think\Request::instance()->module(); ?>/uni_push";
var deleteUrl = "<?php echo url('uni_push/delete'); ?>";
</script>

  
  
<body class="gray-bg">
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>推送列表</h5>
                    </div>
                    <div class="ibox-content">
						<div class="row">
						   <div class="col-sm-8 m-b-xs">
                                <a href="<?php echo url('uni_push/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;发布推送</button></a>
                            </div>

                        </div>
						<div id="sj">
                        <table id="sort" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:15%">推送标题</th>
                                    <th style="width:25%">推送内容</th>
                                    <th style="width:10%">推送类型</th>
                                    <th style="width:25%">推送链接</th>
                                    <th style="width:10%">推送时间</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><?php echo $v['title']; ?></td>
                                    <td><?php echo $v['content']; ?></td>
                                    <td><?php if($v['push_type'] == 0): ?>普通系统推送消息<?php else: ?>会员消息<?php endif; ?></td>
                                    <td><?php echo $v['push_url']; ?></td>
                                    <td><?php echo $v['created']; ?></td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; else: ?>
							<tr><td colspan="7" style="text-align:center; font-size:14px;">暂无推送数据</td></tr>
							<?php endif; ?>					
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- 全局js -->
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/catecommon.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>

</body>
</html>