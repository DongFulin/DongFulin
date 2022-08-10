<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/ywscs.com/public/../application/admin/view/privilege/lst.html";i:1625818017;}*/ ?>
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
var url = "/<?php echo \think\Request::instance()->module(); ?>/privilege";
var deleteUrl = "<?php echo url('privilege/delete'); ?>";
var sortUrl = "<?php echo url('privilege/order'); ?>";
</script>

<body class="gray-bg">
    <div class="wrapper wrapper-content" id="server">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>权限管理</h5>
                    </div>
                    <div class="ibox-content">
						<div class="row">
						   <div class="col-sm-8 m-b-xs">
                                <a href="<?php echo url('privilege/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;增加权限</button></a>
                                <button type="button" class="btn btn-sm btn-success" style="margin-right:15px;" id="order">更新排序</button>
                            </div>
                        </div>
						
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:5%"><input type="checkbox" id="checkAll"/></th>
                                    <th style="width:25%">权限名称</th>
                                    <th style="width:10%">模块名称</th>
                                    <th style="width:10%">控制器名称</th>
                                    <th style="width:10%">方法名称</th>
                                    <th style="width:10%">控制器访问别名</th>
                                    <th style="width:10%">排序</th>
                                    <th style="width:15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><input type="checkbox" class="text_id" name="id[]" value="<?php echo $v['id']; ?>" /></td>
                                    <td><i class="<?php echo $v['icon']; ?>"></i> <?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $v['level']); if($v['level'] > '0'): ?>|<?php endif; ?><?php echo $v['html']; if($v['pid'] == '0'): ?><b><?php echo $v['pri_name']; ?></b><?php else: ?><?php echo $v['pri_name']; endif; ?></a></td>
                                    <td><?php echo $v['mname']; ?></td>
                                    <td><?php echo $v['cname']; ?></td>
                                    <td><?php echo $v['aname']; ?></td>
                                    <td><?php echo $v['fwname']; ?></td>
                                    <td><input name="<?php echo $v['id']; ?>" type="text" value="<?php echo $v['sort']; ?>" class="sort" size="6"></td>
                                    <td><button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;
                                        <?php if(!in_array(($v['id']), is_array($del)?$del:explode(',',$del))): ?>
                                        <button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>, this);"><i class="fa fa-close"></i>&nbsp;删除</button> <?php endif; ?>
                                    </td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; else: ?>
							<tr><td colspan="8" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>		
							<?php endif; ?>					
                            </tbody>
                        </table>
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