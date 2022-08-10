<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"/www/wwwroot/ywscs.com/public/../application/admin/view/admin/lst.html";i:1618769683;s:65:"/www/wwwroot/ywscs.com/application/admin/view/admin/ajaxpage.html";i:1643087030;}*/ ?>
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
var deleteUrl = "<?php echo url('admin/delete'); ?>";
var url = "/<?php echo \think\Request::instance()->module(); ?>/admin";
</script>

<body class="gray-bg" >
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>后台管理员列表</h5>
                    </div>
                    <div class="ibox-content">
						<div class="row">
						   <div class="col-sm-8 m-b-xs">
                                <a href="<?php echo url('admin/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;添加</button></a>                     
                                <button type="button" class="btn btn-sm btn-danger" id="del">批量删除</button>
                            </div> 
                           <form action="<?php echo url('admin/search'); ?>" method="post" id="form_search">          
                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入管理员名称" <?php if((isset($admin_name)) && ($admin_name)): ?>value="<?php echo $admin_name; ?>"<?php endif; ?> class="input-sm form-control" /><span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary" id="submit_search">搜索</button></span>
                                </div>
                            </div>
                           </form>                                 
                        </div>
                        <div id="ajaxpagetest">
                        <script>
	var pnum = <?php echo $pnum; ?>;
	<?php if((!isset($search)) OR (!$search)): ?>
	var search = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/admin/lst.html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/admin/search.html?page="+pnum;
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
                                    <th style="width:5%"><input type="checkbox" id="checkAll"/></th>
                                    <th style="width:10%">管理员昵称</th>
                                    <th style="width:10%">管理员账号</th>
                                    <th style="width:10%">管理员级别</th>
                                    <th style="width:15%">注册时间</th>
                                    <th style="width:15%">登录IP</th>
                                    <th style="width:15%">登录时间</th>
                                    <th style="width:5%">状态</th>
                                    <th style="width:10%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?> 
                                <tr>
                                    <td><input type="checkbox" class="text_id" name="id" value="<?php echo $v['id']; ?>" /></td>
                                    <td><?php echo $v['en_name']; ?></td>
                                    <td><?php echo $v['username']; ?></td>
                                    <td><?php echo $v['rolename']; ?></td>
                                    <td><?php echo date('Y-m-d H:i:s',$v['addtime']); ?></td>
                                    <td><?php echo $v['login_ip']; ?></td>
                                    <td><?php echo !empty($v['login_time'])?date('Y-m-d H:i:s',$v['login_time']) : ''; ?></td>
                                    <td>
                                    <?php switch($v['suo']): case "0": ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableValadmin(<?php echo $v['id']; ?>,'suo',this);"><i class="fa fa-check"></i></button>
                                    <?php break; case "1": ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableValadmin(<?php echo $v['id']; ?>,'suo',this);"><i class="fa fa-times"></i></button>
                                    <?php break; endswitch; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php if($v['id'] != 1): ?>
                                        <button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; else: ?>
							<tr><td colspan="9" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
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