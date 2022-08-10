<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/ywscs.com/public/../application/admin/view/logistics/lst.html";i:1628740418;}*/ ?>
<!--
 * @Author: your name
 * @Date: 2020-08-04 23:10:49
 * @LastEditTime: 2020-08-04 23:34:02
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /daohang/Users/wutong/Library/Caches/com.binarynights.ForkLift-3/FileCache/70019986-F559-4C20-80DE-A95891B40BF5/lst.html
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
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/page.css" rel="stylesheet">
</head>

<script>
    var url = "/<?php echo \think\Request::instance()->module(); ?>/logistics";
    var deleteUrl = "<?php echo url('logistics/delete'); ?>";
    var sortUrl = "<?php echo url('logistics/order'); ?>";
</script>

<body class="gray-bg">
<div class="wrapper wrapper-content" id="server">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>物流信息列表</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-8 m-b-xs">
                            <a href="<?php echo url('logistics/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;增加物流</button></a>
                            <button type="button" class="btn btn-sm btn-success" style="margin-right:15px;" id="order">更新排序</button>
                            <a href="https://kdniao.com/file/快递鸟接口支持快递公司编码.xlsx" target="_blank"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-download" style="color:#FFF;"></i>&nbsp;快递鸟物流公司编码</button></a>
                        </div>

                    </div>
                    <div id="sj">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width:35%">物流名称</th>
                                <th style="width:15%">快递鸟编码</th>
                                <th style="width:10%">物流电话</th>
                                <th style="width:10%">开启/关闭</th>
                                <th style="width:10%">排序</th>
                                <th style="width:15%">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                            <tr>
                                <td><?php echo $v['log_name']; ?></td>
                                <td><?php echo $v['kdniao_code']; ?></td>
                                <td><?php echo $v['telephone']; ?></td>
                                <td>
                                    <?php switch($v['is_show']): case "0": ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_show',this);"><i class="fa fa-times"></i></button>
                                    <?php break; case "1": ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_show',this);"><i class="fa fa-check"></i></button>
                                    <?php break; endswitch; ?>
                                </td>
                                <td><input name="<?php echo $v['id']; ?>" typed="text" value="<?php echo $v['sort']; ?>" class="sort" size="5" /></td>
                                <td><button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <tr><td colspan="4" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
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