<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/www/wwwroot/ywscs.com/public/../application/admin/view/shop_admin/lst.html";i:1618769683;s:70:"/www/wwwroot/ywscs.com/application/admin/view/shop_admin/ajaxpage.html";i:1618769683;}*/ ?>
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
var deleteUrl = "<?php echo url('shop_admin/delete'); ?>";
var url = "/<?php echo \think\Request::instance()->module(); ?>/shop_admin";
</script>

<body class="gray-bg" >
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>商家账号信息列表</h5>
                    </div>
                    <div class="ibox-content">
                    <?php if(empty($shop_id)): ?>
						<div class="row" style="margin-bottom:15px;">
                           <form action="<?php echo url('shop_admin/search'); ?>" method="post" id="form_search">          
                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入商家手机号" <?php if((isset($keyword)) && ($keyword)): ?>value="<?php echo $keyword; ?>"<?php endif; ?> class="input-sm form-control" /><span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary" id="submit_search">搜索</button></span>
                                </div>
                            </div>
                           </form>                                 
                        </div>
                    <?php endif; ?>
                        <div id="ajaxpagetest">
                        <script>
	var pnum = <?php echo $pnum; ?>;
	<?php if((!isset($search)) AND (!isset($shop_id))): ?>
	var search = 0;
	var shop_id = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/shop_admin/lst.html?page="+pnum;
	<?php elseif((isset($search)) AND ($search)): ?>
	var search = <?php echo $search; ?>;
	var shop_id = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/shop_admin/search.html?page="+pnum;
	<?php elseif((isset($shop_id)) AND ($shop_id)): ?>
	var shop_id = <?php echo $shop_id; ?>;
	var search = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/shop_admin/shoplist/shop_id/"+shop_id+".html?page="+pnum;
	<?php endif; ?>
	$(function(){
		$("#checkAll").click(function () {
	        $("input[class='text_id']:checkbox").prop("checked", this.checked);
	    }); 
	});
</script>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:15%">联系手机</th>
                                    <th style="width:20%">商铺名称</th>
                                    <th style="width:15%">注册时间</th>
                                    <th style="width:15%">登录IP</th>
                                    <th style="width:15%">登录时间</th>
                                    <th style="width:10%">正常/关闭</th>
                                    <th style="width:10%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?> 
                                <tr>
                                    <td><?php echo $v['phone']; ?></td>
                                    <td><?php echo $v['shop_name']; ?></td>
                                    <td><?php echo date('Y-m-d H:i:s',$v['addtime']); ?></td>
                                    <td><?php echo $v['login_ip']; ?></td>
                                    <td><?php echo !empty($v['login_time'])?date('Y-m-d H:i:s',$v['login_time']) : ''; ?></td>
                                    <td>
                                    <?php switch($v['open_status']): case "1": ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'open_status',this);"><i class="fa fa-check"></i></button>
                                    <?php break; case "0": ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'open_status',this);"><i class="fa fa-times"></i></button>
                                    <?php break; endswitch; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>
                                    </td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; else: ?>
							<tr><td colspan="8" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
							<?php endif; ?>						
                            </tbody>
                        </table>
                        <div class="row"><div class="pagination" style="float:right; margin-right:20px;"><?php echo $page; ?></div></div>
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
    <script src="/static/admin/js/common/admin.js"></script>    
    <script src="/static/admin/js/common/ajax.js"></script>

</body>
</html>