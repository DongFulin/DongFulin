<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/www/wwwroot/ywscs.com/public/../application/admin/view/shop_promotion/lst.html";i:1618769683;s:74:"/www/wwwroot/ywscs.com/application/admin/view/shop_promotion/ajaxpage.html";i:1618769683;}*/ ?>
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
var url = "/<?php echo \think\Request::instance()->module(); ?>/shop_promotion";
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
                        <h5>商家商品促销活动列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                        <div class="col-sm-5 m-b-xs">                    
                               <div style="width:1300px; height:40px; margin-bottom:25px;">
                               <a href="<?php echo url('shop_promotion/lst',array('filter'=>5)); ?>"><div class="qiehuan" <?php if($filter && $filter == 5): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>全部</div></a>
                               <a href="<?php echo url('shop_promotion/lst',array('filter'=>1)); ?>"><div class="qiehuan" <?php if($filter && $filter == 1): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>即将开始</div></a>         
                               <a href="<?php echo url('shop_promotion/lst',array('filter'=>2)); ?>"><div class="qiehuan" <?php if($filter && $filter == 2): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>活动中</div></a> 
                               <a href="<?php echo url('shop_promotion/lst',array('filter'=>3)); ?>"><div class="qiehuan" <?php if($filter && $filter == 3): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>已结束</div></a>    
                               </div>
                        </div> 
                        </div>
         
						<div class="row">
                            <div class="col-sm-12 m-b-xs" style="float:right;">
                            <form action="<?php echo url('shop_promotion/search'); ?>" method="post" id="form_search" style="margin-top:10px;">
                            
                            <div class="col-sm-4" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入活动标题" <?php if((isset($keyword)) AND ($keyword)): ?>value="<?php echo $keyword; ?>"<?php endif; ?> class="input-sm form-control" />
                                    <span class="input-group-btn"><button type="submit" class="btn btn-sm btn-primary">搜索</button></span>
                                </div>
                            </div> 
                            
                            <div style="float:right; font-size:15px;">
                                    <input type="text" name="shop_name" placeholder="请输入商家名称" <?php if(isset($shop_name) && $shop_name): ?>value="<?php echo $shop_name; ?>"<?php endif; ?> class="input-sm form-control">                   
                            </div> 
                            
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="recommend">
                                    <option value="0" <?php if((isset($recommend)) AND ($recommend == 0)): ?>selected="selected"<?php endif; ?>>全部</option>
                                    <option value="1" <?php if((isset($recommend)) AND ($recommend == 1)): ?>selected="selected"<?php endif; ?>>推荐</option>
                                    <option value="2" <?php if((isset($recommend)) AND ($recommend == 2)): ?>selected="selected"<?php endif; ?>>未推荐</option>
                                </select>
                            </div> 
                                                
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="status">
                                    <option value="0" <?php if((isset($status)) AND ($status == 0)): ?>selected="selected"<?php endif; ?>>全部</option>
                                    <option value="1" <?php if((isset($status)) AND ($status == 1)): ?>selected="selected"<?php endif; ?>>即将开始</option>
                                    <option value="2" <?php if((isset($status)) AND ($status == 2)): ?>selected="selected"<?php endif; ?>>抢购中</option>
                                    <option value="3" <?php if((isset($status)) AND ($status == 3)): ?>selected="selected"<?php endif; ?>>已结束</option>
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
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/shop_promotion/lst/filter/"+filter+".html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/shop_promotion/search.html?page="+pnum;
	<?php endif; ?>
</script>    

                  
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:5%">id</th>
                                    <th style="width:10%">状态</th>
                                    <th style="width:15%">活动名称</th>                                    
                                    <th style="width:10%">活动类型</th>
                                    <th style="width:15%">所属商家</th>
                                    <th style="width:15%">开始时间</th>
                                    <th style="width:15%">结束时间</th>
                                    <th style="width:5%">推荐</th>
                                    <th style="width:10%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><?php echo $v['id']; ?></td>
                                    <td>
                                    <?php switch($v['zhuangtai']): case "1": ?>
                                    <span style="color:#1c84c6;">即将开始</span>
                                    <?php break; case "2": ?>
                                    <span style="color:#1c84c6;">活动中</span>                                    
                                    <?php break; case "3": ?>
                                    <span style="color:#1992FC;">已结束</span>                                    
                                    <?php break; endswitch; ?>
                                    </td>
                                    <td><?php echo $v['activity_name']; ?></td>
                                    <td><?php switch($v['type']): case "1": ?>直接打折<?php break; case "2": ?>减价优惠<?php break; endswitch; ?></td>
                                    <td><?php echo $v['shop_name']; ?></td>
                                    <td><?php echo date('Y-m-d H:i:s',$v['start_time']); ?></td>
                                    <td><?php echo date('Y-m-d H:i:s',$v['end_time']); ?></td>
                                    <td>
                                    <?php switch($v['recommend']): case "1": ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'recommend',this);"><i class="fa fa-check"></i></button>
                                    <?php break; case "0": ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'recommend',this);"><i class="fa fa-times"></i></button>
                                    <?php break; endswitch; ?>
                                    </td>
                                    <td> 
                                    <button type="button" class="btn btn-primary btn-xs" onclick="editmatr(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>                                 
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