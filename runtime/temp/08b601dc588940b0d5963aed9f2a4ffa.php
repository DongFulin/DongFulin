<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"/www/wwwroot/ywscs.com/public/../application/admin/view/ad/lst.html";i:1631589123;s:62:"/www/wwwroot/ywscs.com/application/admin/view/ad/ajaxpage.html";i:1631594575;}*/ ?>
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
var deleteUrl = "<?php echo url('ad/delete'); ?>";
var url = '/<?php echo \think\Request::instance()->module(); ?>/ad';
</script>

<body class="gray-bg">
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><if condition="$cate_name"><?php if((isset($cate_name)) AND ($cate_name)): ?><?php echo $cate_name; endif; ?>广告列表</h5>
                    </div>
                    <div class="ibox-content">
						<div class="row">
						   <div class="col-sm-7 m-b-xs">
                                <button type="button" class="btn btn-sm btn-primary" id="addar" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;增加广告</button>
                                <button type="button" class="btn btn-sm btn-danger" id="del">批量删除</button>
                            </div> 
                            
                            <form action="<?php echo url('ad/search'); ?>" method="post" id="form_search">
                            <div class="col-sm-2 m-b-xs">
                                <select class="input-sm form-control input-s-sm inline" name="cate_id">
                                    <option value="0" <?php if((isset($cate_id)) AND ($cate_id == 0)): ?>selected="selected"<?php endif; ?>>搜索全部</option>
                                    <?php if(is_array($adCateList) || $adCateList instanceof \think\Collection || $adCateList instanceof \think\Paginator): if( count($adCateList)==0 ) : echo "" ;else: foreach($adCateList as $key=>$v): ?>
                                    <option value="<?php echo $v['id']; ?>" <?php if((isset($cate_id)) AND ($cate_id == $v['id'])): ?>selected="selected"<?php endif; ?>><?php echo $v['cate_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>             

                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入广告名称" <?php if((isset($ad_name)) AND ($ad_name)): ?>value="<?php echo $ad_name; ?>"<?php endif; ?> class="input-sm form-control"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary" id="submit_search">搜索</button></span>
                                </div>
                            </div>
                           </form>
                        </div>                          
                        
                        <div id="ajaxpagetest">
                        <script>
	var pnum = <?php echo $pnum; ?>;
	<?php if((!isset($search)) AND (!isset($cate_id))): ?>
	var search = 0;
	var cate_id = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/ad/lst.html?page="+pnum;
	var addUrl = "<?php echo url('ad/add'); ?>";
	<?php elseif((isset($cate_id)) AND ($cate_id)): ?>
	var cate_id = <?php echo $cate_id; ?>;
	var search = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/ad/poslist/cate_id/"+cate_id+".html?page="+pnum;
	var addUrl = "/<?php echo \think\Request::instance()->module(); ?>/ad/add/cate_id/"+cate_id;
	<?php elseif((isset($search)) AND ($search)): ?>
	var search = <?php echo $search; ?>;
	var cate_id = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/ad/search.html?page="+pnum;
	var addUrl = "<?php echo url('ad/add'); ?>";
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
                                    <th style="width:20%">广告图片</th>
                                    <th style="width:20%">广告名称</th>
                                    <th style="width:15%">所属分类</th>
                                    <th style="width:5%">排序</th>
                                    <th style="width:5%">是否开启</th>
                                    <th style="width:15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><input type="checkbox" class="text_id" name="id[]" value="<?php echo $v['id']; ?>" /></td>
                                    <td><img src="<?php echo $v['ad_pic']; ?>" style="max-width: 200px; max-height: 100px;" alt=""></td>
                                    <td><?php echo $v['ad_name']; ?></td>
                                    <td><?php echo $v['cate_name']; ?></td>
                                    <td>
                                        <?php echo $v['sort']; ?>
                                    </td>
                                    <td>
                                    <?php switch($v['is_on']): case "0": ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_on',this);"><i class="fa fa-times"></i></button>
                                    <?php break; case "1": ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_on',this);"><i class="fa fa-check"></i></button>
                                    <?php break; endswitch; ?>
                                    </td>
                                    <td><button type="button" class="btn btn-primary btn-xs" <?php if(!isset($cate_id) || !$cate_id): ?>onclick="edit(<?php echo $v['id']; ?>,this);"<?php else: ?>onclick="editpos(<?php echo $v['id']; ?>,<?php echo $cate_id; ?>,this);"<?php endif; ?>><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button></td>
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
    <script src="/static/admin/js/common/ajax.js"></script>
	<script src="/static/admin/js/common/admin.js"></script>
	
</body>
</html>