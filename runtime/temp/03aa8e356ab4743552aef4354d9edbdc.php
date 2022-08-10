<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/www/wwwroot/ywscs.com/public/../application/admin/view/shop_comment/lst.html";i:1618769683;s:72:"/www/wwwroot/ywscs.com/application/admin/view/shop_comment/ajaxpage.html";i:1618769683;}*/ ?>
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
    <link href="/static/admin/css/double-date.css" rel="stylesheet">
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/double-date.js"></script>
    <link href="/static/admin/js/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
    <style>
        .comment_pic{
            max-width: 70px;
            max-height: 70px;
            border: 1px solid #f1f0f0;
            margin: 3px;
        }
    </style>
</head>

<script>
//删除url
var deleteUrl = "<?php echo url('shop_comment/delete'); ?>";
var url = "/<?php echo \think\Request::instance()->module(); ?>/shop_comment";
</script>

<body class="gray-bg" >
    <div class="wrapper wrapper-content" id="server">
       <style>
		.qiehuan{
		width:120px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#333; background-color:#F5F5F6; float:left; margin-top:15px; margin-right:10px; text-align:center; cursor:pointer;
		}
		</style>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>商家评价列表</h5>
                    </div>
                    <div class="ibox-content">
                        
						<div class="row" style="margin-top:15px;">
						  	<div class="col-sm-4 m-b-xs">                    
                               <div style="width:640px; height:40px; margin-bottom:25px;">
                               <a href="<?php echo url('shop_comment/lst',array('filter'=>3)); ?>"><div class="qiehuan" <?php if((isset($filter)) AND ($filter == 3)): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>全部</div></a>
                               <a href="<?php echo url('shop_comment/lst',array('filter'=>1)); ?>"><div class="qiehuan" <?php if((isset($filter)) AND ($filter == 1)): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>正常</div></a>
                               <a href="<?php echo url('shop_comment/lst',array('filter'=>2)); ?>"><div class="qiehuan" <?php if((isset($filter)) AND ($filter == 2)): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>违规</div></a>    
                               </div>
                            </div> 
						
						
						    <div class="col-sm-8 m-b-xs" style="float:right; margin-top:25px;">
                            <form action="<?php echo url('shop_comment/search'); ?>" method="post" id="form_search">          
                            <div class="col-sm-5" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="评论内容..." <?php if((isset($keyword)) AND ($keyword)): ?>value="<?php echo $keyword; ?>"<?php endif; ?> class="input-sm form-control" /><span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary">搜索</button></span>
                                </div>
                            </div>
                            
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="pj_zt">
                                    <option value="0" <?php if(isset($pj_zt) && $pj_zt == 0): ?>selected="selected"<?php endif; ?>>全部</option>
                                    <option value="1" <?php if(isset($pj_zt) && $pj_zt == 1): ?>selected="selected"<?php endif; ?>>正常</option>
                                    <option value="2" <?php if(isset($pj_zt) && $pj_zt == 2): ?>selected="selected"<?php endif; ?>>违规</option>
                                </select>
                            </div>

                            <div class="date fr" id="to" style="float:right; font-size:15px; margin-right:10px;"> 
                                <input type="text" name="endtime" readonly="readonly" placeholder="结束时间" <?php if((isset($endtime)) AND ($endtime)): ?>value="<?php echo date('Y-m-d',$endtime); ?>"<?php endif; ?> class="date-check">                           
                            </div> 
                            
                            <div class="date date1 fl" id="from" style="float:right; font-size:15px; margin-right:10px;">
                                <input type="text" name="starttime" readonly="readonly" placeholder="开始时间" <?php if((isset($starttime)) AND ($starttime)): ?>value="<?php echo date('Y-m-d',$starttime); ?>"<?php endif; ?> class="date-check">                              
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
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/shop_comment/lst/filter/"+filter+".html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/shop_comment/search.html?page="+pnum;
	<?php endif; ?>
</script>  

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:15%">商品名称</th>
                                    <th style="width:10%">所属商家</th>
                                    <th style="width:10%">手机号</th>
                                    <th style="width:10%">昵称</th>
                                    <th style="width:5%">评分</th>
                                    <th style="width:15%">评论内容</th>
                                    <th>评论图片</th>
                                    <th style="width:10%">评论时间</th>
                                    <th style="width:5%">审核</th>
                                    <th style="width:10%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?> 
                                <tr>
                                    <td><?php echo $v['goods_name']; ?><br><?php echo $v['goods_attr_str']; ?></td>
                                    <td><?php echo $v['shop_name']; ?></td>
                                    <td><?php echo $v['phone']; ?></td>
                                    <td><?php echo $v['user_name']; ?></td>
                                    <td>商品：<?php echo $v['goods_star']; ?>星<br>物流：<?php echo $v['logistics_star']; ?>星<br>服务：<?php echo $v['service_star']; ?>星</td>
                                    <td><?php echo $v['content']; ?></td>
                                    <td>
                                        <?php if(is_array($v['images']) || $v['images'] instanceof \think\Collection || $v['images'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['images'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                                        <a class="fancybox" href="<?php echo $data; ?>" title="<?php echo $v['goods_name']; ?>">
                                            <img class="image comment_pic" src="<?php echo $data; ?>">
                                        </a>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </td>
                                    <td><?php echo date('Y-m-d H:i:s',$v['time']); ?></td>
                                    <td>
                                        <?php if($v['checked'] == 1): ?>正常
                                        <?php elseif($v['checked'] == 2): ?>违规
                                        <?php else: ?>未审核
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-success btn-xs" onclick="checkedpinglun(<?php echo $v['id']; ?>,this);"><i class="fa fa-paste"></i>&nbsp;审核</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button>
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

    <!-- Fancy box -->
    <script src="/static/admin/js/plugins/fancybox/jquery.fancybox.js"></script>
    <script>
        $(document).ready(function () {
            $('.fancybox').fancybox({
                openEffect: 'none',
                closeEffect: 'none'
            });
        });
    </script>
    <script>
    function checkedpinglun(id,obj){
    	if(search == 0){
    		var infoUrl = url+'/checked/com_id/'+id+'/page/'+pnum+'/filter/'+filter;
    	}else{
    		var infoUrl = url+'/checked/com_id/'+id+'/page/'+pnum+'/s/'+search+'/filter/'+filter;
    	}
    	layer.open({
    		type : 2,
    		title : '审核',
    		shadeClose : true,
    		shade : 0.5,
    		area : ['1000px','650px'],
    		content : infoUrl
    	});
    }
    
	</script>

</body>
</html>