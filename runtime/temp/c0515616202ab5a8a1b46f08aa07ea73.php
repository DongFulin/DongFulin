<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/www/wwwroot/ywscs.com/public/../application/admin/view/member/lst.html";i:1618769683;s:66:"/www/wwwroot/ywscs.com/application/admin/view/member/ajaxpage.html";i:1626423462;}*/ ?>
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
var deleteUrl = "<?php echo url('member/delete'); ?>";
var url = "/<?php echo \think\Request::instance()->module(); ?>/member";
</script>

<body class="gray-bg" >
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>会员列表</h5>（共计会员：<?php echo $count; ?>人）
                    </div>
                    <div class="ibox-content">
						<div class="row" style="margin-bottom:20px;">
                            <div class="col-sm-5 m-b-xs">
                                <a href="<?php echo url('member/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;增加用户</button></a>
                            </div>
                            <form action="<?php echo url('member/search'); ?>" method="post" id="form_search">          
                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入用户手机号" <?php if((isset($keyword)) AND ($keyword)): ?>value="<?php echo $keyword; ?>"<?php endif; ?> class="input-sm form-control" /><span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary">搜索</button></span>
                                </div>
                            </div>
                           </form>   
                                          
                        </div>
                        <div id="ajaxpagetest">
                        <!--
 * @Descripttion: 
 * @Author: cbing
 * @Date: 2019-06-10 14:42:00
 * @LastEditors: cbing
 * @LastEditTime: 2019-08-24 18:15:04
 -->
<script>
    var pnum = <?php echo $pnum; ?>;
    <?php if((!isset($search)) OR (!$search)): ?>
    var search = 0;
    var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/member/lst.html?page="+pnum;
    <?php else: ?>
        var search = <?php echo $search; ?>;
        var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/member/search.html?page="+pnum;
        <?php endif; ?>
</script>
<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th style="width:5%">ID</th>
        <th style="width:10%">头像</th>
        <th style="width:10%">用户名</th>
        <th style="width:10%">手机号</th>
        <th style="width:10%">钱包金额</th>
        <th style="width:10%">注册方式</th>
        <th style="width:15%">注册时间</th>
        <th style="width:8%">正常/禁用</th>
        <th style="width:20%">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
    <tr>
        <td><?php echo $v['id']; ?></td>
        <td><img src="<?php echo $v['headimgurl']; ?>" class="well no-padding no-margins" style="width: 50px; height: 50px;"/></td>
        <td><?php if($v['user_name']): ?><?php echo $v['user_name']; else: ?>/<?php endif; ?></td>
        <td><?php if($v['phone']): ?><?php echo $v['phone']; else: ?>/<?php endif; ?></td>
        <td><?php echo $v['price']; ?>&nbsp;元</td>
        <td><?php if($v['oauth'] == 0): ?>手机号注册<?php elseif($v['oauth'] == 1): ?>微信注册<?php endif; ?></td>
        <td><?php echo date('Y-m-d H:i:s',$v['regtime']); ?></td>
        <td>
            <?php switch($v['checked']): case "0": ?>
            <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'checked',this);"><i class="fa fa-times"></i></button>
            <?php break; case "1": ?>
            <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'checked',this);"><i class="fa fa-check"></i></button>
            <?php break; endswitch; ?>
        </td>
        <td>
            <button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>
            <button type="button" class="btn btn-primary btn-xs" onclick="qianbaomx(<?php echo $v['id']; ?>,this);"><i class="fa fa-paste"></i>&nbsp;钱包明细</button>
            <button type="button" class="btn btn-success btn-xs" onclick="getyhorder(<?php echo $v['id']; ?>,this);"><i class="fa fa-paste"></i>&nbsp;查看订单</button>
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
    
    <script>
    function qianbaomx(id,obj){
    	var qbmxUrl = "/<?php echo \think\Request::instance()->module(); ?>/detail/lst/user_id/"+id;
        location.href=qbmxUrl;
    }

    function getyhorder(id,obj){
    	var getorderyyUrl = "/<?php echo \think\Request::instance()->module(); ?>/yhorder/lst/user_id/"+id;
        location.href=getorderyyUrl;
    }
	</script>

</body>
</html>