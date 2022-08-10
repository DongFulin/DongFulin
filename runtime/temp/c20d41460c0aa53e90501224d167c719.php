<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"/www/wwwroot/ywscs.com/public/../application/admin/view/nav/lst.html";i:1618769683;s:63:"/www/wwwroot/ywscs.com/application/admin/view/nav/ajaxpage.html";i:1618769683;}*/ ?>
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
var deleteUrl = "<?php echo url('nav/delete'); ?>";
var url = "/<?php echo \think\Request::instance()->module(); ?>/nav";
</script>

<body class="gray-bg">
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>自定义导航位列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-7 m-b-xs">
                                <a href="<?php echo url('nav/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;增加导航位</button></a>
                            </div> 

                            <form action="<?php echo url('nav/search'); ?>" method="post" id="form_search">          
                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入导航位名称" <?php if((isset($keyword)) AND ($keyword)): ?>value="<?php echo $keyword; ?>"<?php endif; ?> class="input-sm form-control" /><span class="input-group-btn">
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
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/nav/lst.html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/nav/search.html?page="+pnum;
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
                                    <th style="width:60%">导航位名称</th>
                                    <th style="width:10%">id</th>
                                    <th style="width:30%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?> 
                                <tr>
                                    <td><a style="color:#676a6c;" href="<?php echo url('nav_menu/navlist',array('nav_id'=>$v['id'])); ?>"><?php echo $v['nav_name']; ?></a></td>
                                    <td><?php echo $v['id']; ?></td>
                                    <td><button type="button" class="btn btn-success btn-xs" onclick="navmenu(<?php echo $v['id']; ?>,this);"><i class="fa fa-paste"></i>&nbsp;菜单信息</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button></td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; else: ?>
							<tr><td colspan="3" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
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
    function navmenu(id,obj){
    	var adUrl = "/<?php echo \think\Request::instance()->module(); ?>/nav_menu/navlist/nav_id/"+id;
        location.href=adUrl;
    }
    </script>
    
</body>
</html>