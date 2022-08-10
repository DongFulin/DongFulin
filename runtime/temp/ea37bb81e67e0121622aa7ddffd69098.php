<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/www/wwwroot/ywscs.com/public/../application/admin/view/pay_type/lst.html";i:1640938834;}*/ ?>
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
var url = "/<?php echo \think\Request::instance()->module(); ?>/pay_type";
var deleteUrl = "<?php echo url('pay_type/delete'); ?>";
var sortUrl = "<?php echo url('pay_type/order'); ?>";
</script>

<body class="gray-bg">
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>支付方式列表</h5>
                    </div>
                    <div class="ibox-content">
						<div class="row">
						   <div class="col-sm-8 m-b-xs">
<!--                                <a class="J_menuItem" href="<?php echo url('pay_type/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;新增支付方式</button></a>-->
                                <button type="button" class="btn btn-sm btn-success" style="margin-right:15px;" id="order">更新排序</button>
                            </div>              

                        </div>
						<div id="sj">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:20%">支付方式名称</th>
                                    <th style="width:20%">英文别名</th>
                                    <th style="width:20%">缩略图</th>
                                    <th style="width:10%">开启/关闭</th>
                                    <th style="width:10%">排序</th>
                                    <th style="width:20%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><?php echo $v['pay_name']; ?></td>
                                    <td><?php echo $v['only_name']; ?></td>
                                    <td><img src="/<?php echo $v['pay_pic']; ?>" width="60px" height="60px"/></td>   
                                    <td>
                                    <?php switch($v['is_open']): case "0": ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_open',this);"><i class="fa fa-times"></i></button>
                                    <?php break; case "1": ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_open',this);"><i class="fa fa-check"></i></button>
                                    <?php break; endswitch; ?>
                                    </td>
                                    <td><input name="<?php echo $v['id']; ?>" typed="text" value="<?php echo $v['sort']; ?>" class="sort" size="5" /></td>
                                    <td><button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-success btn-xs" <?php if($v['only_name'] == 'wxpay'): ?>onclick="wxpayinfo(this);"<?php elseif($v['only_name'] == 'alipay'): ?>onclick="alipayinfo(this);"<?php endif; ?>><i class="fa fa-pencil"></i>&nbsp;配置信息</button>&nbsp;&nbsp;&nbsp;&nbsp;
<!--                                    <button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button></td>-->
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
    
    <script>
    function wxpayinfo(obj){
        var wxpayinfourl = "/<?php echo \think\Request::instance()->module(); ?>/wxpay_config/info";
        location.href = wxpayinfourl;
        // window.open(wxpayinfourl);
    }
    
    function alipayinfo(obj){
        var alipayinfourl = "/<?php echo \think\Request::instance()->module(); ?>/alipay_config/info";
        location.href = alipayinfourl;
    }
    </script>
</body>
</html>