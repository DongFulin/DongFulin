<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/www/wwwroot/ywscs.com/public/../application/admin/view/integral_shop/lst.html";i:1644485096;s:73:"/www/wwwroot/ywscs.com/application/admin/view/integral_shop/ajaxpage.html";i:1644485096;}*/ ?>
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
    <link href="/static/admin/css/double-date.css" rel="stylesheet">
    <link href="/static/admin/css/page.css" rel="stylesheet">
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/double-date.js"></script>
    <script src="/static/admin/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<script>
var url = "/<?php echo \think\Request::instance()->module(); ?>/integral_shop";
var deleteUrl = "<?php echo url('integral_shop/delete'); ?>";
</script>

<body class="gray-bg">
    <div class="wrapper wrapper-content" id="server">
        <style>
		.qiehuan{
		width:120px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#333; background-color:#F5F5F6; float:left; margin-right:10px; text-align:center; cursor:pointer;
		}
		</style>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>积分商城列表</h5>
                    </div>
                    <div class="ibox-content">
						<div class="row">
						    <div class="col-sm-2 m-b-xs">
						    <a href="<?php echo url('integral_shop/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;新增积分活动</button></a>
                            </div>
                            
                            <div class="col-sm-10 m-b-xs" style="float:right;">
                            <form action="<?php echo url('integral_shop/search'); ?>" method="post" id="form_search" style="margin-top:10px;">
                            
                            <div class="col-sm-4" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入活动标题" <?php if((isset($keyword)) AND ($keyword)): ?>value="<?php echo $keyword; ?>"<?php endif; ?> class="input-sm form-control" />
                                    <span class="input-group-btn"><button type="submit" class="btn btn-sm btn-primary">搜索</button></span>
                                </div>
                            </div> 
                            
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="recommend">
                                    <option value="0" <?php if((isset($recommend)) AND ($recommend == 0)): ?>selected="selected"<?php endif; ?>>全部</option>
                                    <option value="1" <?php if((isset($recommend)) AND ($recommend == 1)): ?>selected="selected"<?php endif; ?>>推荐</option>
                                    <option value="2" <?php if((isset($recommend)) AND ($recommend == 2)): ?>selected="selected"<?php endif; ?>>未推荐</option>
                                </select>
                            </div>
                           </form>  
                           </div>                                                                                          
                        </div>
                        
                        

                        <div id="ajaxpagetest">
                        <script>
	var pnum = <?php echo $pnum; ?>;
	<?php if((isset($filter)) AND ($filter)): ?>
	var filter = <?php echo $filter; ?>;
	<?php endif; if((!isset($search)) OR (!$search)): ?>
	var search = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/integral_shop/lst/filter/"+filter+".html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/integral_shop/search.html?page="+pnum;
	<?php endif; ?>
</script>    

                  
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:5%">ID</th>
                                    <th style="width:10%">活动名称</th>
                                    <th style="width:25%">商品信息</th>
                                    <th style="width:5%">已售</th>
                                    <th style="width:5%">推荐</th>
                                    <th style="width:16%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><?php echo $v['id']; ?></td>
                                    <td><?php echo $v['activity_name']; ?></td>
                                    <td><?php echo $v['goods_name']; ?></td>
                                    <td><?php echo $v['sold']; ?></td>
                                    <td>
                                    <?php switch($v['recommend']): case "1": ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'recommend',this);"><i class="fa fa-check"></i></button>
                                    <?php break; case "0": ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'recommend',this);"><i class="fa fa-times"></i></button>
                                    <?php break; endswitch; ?>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-info btn-xs" onclick="rush_info(<?php echo $v['id']; ?>,this);"><i class="fa fa-paste"></i>&nbsp;详细</button>&nbsp;&nbsp;&nbsp;&nbsp;                                  
                                    <button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button>
                                    </td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; else: ?>
							<tr><td colspan="10" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
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
    function rush_info(id,obj){
 		var infoUrl = url+'/info/id/'+id;
 		location.href = infoUrl;
    }
    </script>
</body>
</html>