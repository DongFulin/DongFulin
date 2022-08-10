<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/www/wwwroot/ywscs.com/public/../application/admin/view/role/lst.html";i:1618769683;}*/ ?>
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
</head>

<script>
//删除url
var deleteUrl = "<?php echo url('role/delete'); ?>";
var url = "/<?php echo \think\Request::instance()->module(); ?>/role";
</script>

<body class="gray-bg">
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>角色管理列表</h5>
                    </div>
                    <div class="ibox-content">
						<div class="row">
						   <div class="col-sm-8 m-b-xs">
                                <a href="<?php echo url('role/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;增加角色</button></a>                               
                            </div>              
                        </div>

						<div id="sj">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:20%">角色名称</th>
                                    <th style="width:60%">角色权限</th>
                                    <th style="width:15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>

							<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><?php echo $v['rolename']; ?></td>
                                    <td><?php if($v['id'] == '1'): ?>所有权限<?php else: ?><?php echo $v['pri_name']; endif; ?></td>
                                    <td><?php if($v['id'] != '1'): ?><button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button><?php endif; ?></td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; ?>						
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