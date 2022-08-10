<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/www/wwwroot/ywscs.com/public/../application/admin/view/config/lst.html";i:1618769683;s:66:"/www/wwwroot/ywscs.com/application/admin/view/config/ajaxpage.html";i:1618769683;}*/ ?>
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
var deleteUrl = "<?php echo url('config/delete'); ?>";
var url = "/<?php echo \think\Request::instance()->module(); ?>/config";
</script>

<body class="gray-bg">
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>配置列表</h5>
                    </div>
                    <div class="ibox-content">
						<div class="row">
						   <div class="col-sm-7 m-b-xs">
                                <a href="<?php echo url('config/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;添加配置</button></a>
                                <button type="button" class="btn btn-sm btn-danger" id="del">批量删除</button>
                            </div> 

                            <form action="<?php echo url('config/search'); ?>" method="post" id="form_search">          
                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入配置名称" <?php if((isset($cname)) AND ($cname)): ?>value="<?php echo $cname; ?>"<?php endif; ?> class="input-sm form-control"><span class="input-group-btn">
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
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/config/lst.html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/config/search.html?page="+pnum;
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
                                    <th style="width:5%"><input type="checkbox" id="checkAll"></th>
                                    <th style="width:20%">配置名称</th>
                                    <th style="width:20%">英文名称</th>
                                    <th style="width:20%">所属分类</th>
                                    <th style="width:15%">类型</th>
                                    <th style="width:20%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><input type="checkbox" class="text_id" name="id" value="<?php echo $v['id']; ?>"></td>
                                    <td><?php echo $v['cname']; ?></td>
                                    <td><?php echo $v['ename']; ?></td>
                                    <td>
                                    <?php echo $v['ca_name']; ?>
                                    </td>
                                    <td>
                                    <?php switch($v['type']): case "0": ?>
                                                                                                    文本框
                                    <?php break; case "1": ?>
                                                                                                    文本域
                                    <?php break; case "2": ?>
                                                                                                    单选按钮
                                    <?php break; case "3": ?>
                                                                                                    复选框
                                    <?php break; case "4": ?>
                                                                                                   下拉框  
                                    <?php break; endswitch; ?>
                                    </td>
                                    <td><button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button></td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; else: ?>
							<tr><td colspan="6" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
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