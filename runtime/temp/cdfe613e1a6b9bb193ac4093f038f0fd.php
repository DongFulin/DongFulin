<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/ywscs.com/public/../application/admin/view/shop_cate/lst.html";i:1618769683;}*/ ?>
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
</head>

<script>
var url = "/<?php echo \think\Request::instance()->module(); ?>/shop_cate";
var deleteUrl = "<?php echo url('shop_cate/delete'); ?>";
var sortUrl = "<?php echo url('shop_cate/order'); ?>";
</script>

<body class="gray-bg">
    <div class="wrapper wrapper-content" id="server">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>店铺分类管理</h5>
                    </div>
                    <div class="ibox-content">
						<div class="row">
						   <div class="col-sm-8 m-b-xs">
                                <a href="<?php echo url('shop_cate/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;增加分类</button></a>
                                <button type="button" class="btn btn-sm btn-success" style="margin-right:15px;" id="order">更新排序</button>
                            </div>                     
                        </div>
						
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:5%"></th>                                   
                                    <th style="width:30%">分类名称</th>
                                    <th style="width:10%">ID</th>
                                    <th style="width:10%">是否显示</th>
                                    <th style="width:15%">排序</th>
                                    <th style="width:15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr cid="<?php echo $v['id']; ?>" pid="<?php echo $v['pid']; ?>" level="<?php echo $v['level']; ?>" <?php if($v['pid'] != 0): ?>style="display:none;"<?php endif; ?>>
                                    <td><a href="javascript:;" class="catezk" onclick="cateshow(this);" style="font-size:15px;">[+]</a></td>                                   
                                    <td><a style="color:#676a6c;" href="<?php echo url('goods/catelist',array('shcate_id'=>$v['id'])); ?>"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $v['level']); if($v["level"] > 0): ?>|<?php endif; ?><?php echo $v['html']; if($v["pid"] == 0): ?><b><?php echo $v['cate_name']; ?></b><?php else: ?><?php echo $v['cate_name']; endif; ?></a></td>
                                    <td><?php echo $v['id']; ?></td>
                                    <td>
                                    <?php if($v['is_show'] == 1): ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_show',this);"><i class="fa fa-check"></i></button>
                                    <?php elseif($v['is_show'] == 0): ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_show',this);"><i class="fa fa-times"></i></button>
                                    <?php endif; ?>
                                    </td>
                                    <td><input name="<?php echo $v['id']; ?>" type="text" value="<?php echo $v['sort']; ?>" class="sort" size="1"></td>
                                    <td><button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button></td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; else: ?>
							<tr><td colspan="6" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
							<?php endif; ?>							
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 全局js -->
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/catecommon.js"></script>
	<script src="/static/admin/js/common/ajax.js"></script>
	
</body>
</html>