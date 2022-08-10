<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/www/wwwroot/ywscs.com/public/../application/admin/view/shop_coupon/lst.html";i:1618769683;s:71:"/www/wwwroot/ywscs.com/application/admin/view/shop_coupon/ajaxpage.html";i:1618769683;}*/ ?>
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
var url = "/<?php echo \think\Request::instance()->module(); ?>/shop_coupon";
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
                        <h5>商家优惠券列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                        <div class="col-sm-5 m-b-xs">                    
                               <div style="width:1300px; height:40px; margin-bottom:25px;">
                               <a href="<?php echo url('shop_coupon/lst',array('filter'=>3)); ?>"><div class="qiehuan" <?php if($filter && $filter == 3): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>全部</div></a>
                               <a href="<?php echo url('shop_coupon/lst',array('filter'=>1)); ?>"><div class="qiehuan" <?php if($filter && $filter == 1): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>正常</div></a>
                               <a href="<?php echo url('shop_coupon/lst',array('filter'=>2)); ?>"><div class="qiehuan" <?php if($filter && $filter == 2): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>违规</div></a>         
                               </div>
                        </div> 
                        </div>
         
						<div class="row"> 
                            <div class="col-sm-10 m-b-xs" style="float:right;">
                            <form action="<?php echo url('shop_coupon/search'); ?>" method="post" id="form_search" style="margin-top:10px;">
                            
                            <div class="col-sm-4" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入优惠券满金额" <?php if((isset($keyword)) AND ($keyword)): ?>value="<?php echo $keyword; ?>"<?php endif; ?> class="input-sm form-control" />
                                    <span class="input-group-btn"><button type="submit" class="btn btn-sm btn-primary">搜索</button></span>
                                </div>
                            </div> 
                            
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="checked">
                                    <option value="0" <?php if((isset($checked)) AND ($checked == 0)): ?>selected="selected"<?php endif; ?>>全部</option>
                                    <option value="1" <?php if((isset($checked)) AND ($checked == 1)): ?>selected="selected"<?php endif; ?>>正常</option>
                                    <option value="2" <?php if((isset($checked)) AND ($checked == 2)): ?>selected="selected"<?php endif; ?>>违规</option>
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
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/shop_coupon/lst/filter/"+filter+".html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/shop_coupon/search.html?page="+pnum;
	<?php endif; ?>
</script>    

                  
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:10%">状态</th>
                                    <th style="width:10%">上架/下架</th>
                                    <th style="width:10%">满金额</th>
                                    <th style="width:10%">减金额</th>
                                    <th style="width:15%">所属商家</th>
                                    <th style="width:10%">开始日期</th>
                                    <th style="width:10%">结束日期</th>
                                    <th style="width:15%">添加时间</th>
                                    <th style="width:10%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><?php switch($v['checked']): case "1": ?><font style="color:#1992FC;">正常</font><?php break; case "2": ?><font style="color:#F00;">违规</font><?php break; endswitch; ?></td>
                                    <td><?php if($v['onsale'] == 1): ?><font style="color:#1992FC;">上架</font><?php elseif($v['onsale'] == 0): ?><font style="color:#F00;">下架</font><?php endif; ?></td>
                                    <td><?php echo $v['man_price']; ?>&nbsp;元</td>
                                    <td><?php echo $v['dec_price']; ?>&nbsp;元</td>
                                    <td><?php echo $v['shop_name']; ?></td>
                                    <td><?php echo date('Y-m-d',$v['start_time']); ?></td>
                                    <td><?php echo date('Y-m-d',$v['end_time']); ?></td>
                                    <td><?php echo date('Y-m-d H:i:s',$v['addtime']); ?></td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="coupon_checked(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;审核</button>
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
    
    <script type="text/javascript">
    function coupon_checked(id,obj){
    	if(search == 0){
    		var checkedUrl = url+'/checked/id/'+id+'/page/'+pnum+'/filter/'+filter;
    	}else{
    		var checkedUrl = url+'/checked/id/'+id+'/page/'+pnum+'/s/'+search+'/filter/'+filter;
    	}
        location.href=checkedUrl;
    }
    </script>
    
</body>
</html>