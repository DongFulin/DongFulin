<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/www/wwwroot/ywscs.com/public/../application/admin/view/th_apply/lst.html";i:1618769683;s:68:"/www/wwwroot/ywscs.com/application/admin/view/th_apply/ajaxpage.html";i:1618769683;}*/ ?>
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
</head>

<script>
var url = "/<?php echo \think\Request::instance()->module(); ?>/th_apply";
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
                        <h5>售后申请列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
						   <div class="col-sm-5 m-b-xs">                    
                               <div style="width:1300px; height:40px; margin-bottom:25px;">
                               <a href="<?php echo url('th_apply/lst',array('filter'=>10)); ?>"><div class="qiehuan" <?php if($filter && $filter == 10): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>全部</div></a>
                               <a href="<?php echo url('th_apply/lst',array('filter'=>1)); ?>"><div class="qiehuan" <?php if($filter && $filter == 1): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>待审核</div></a>
                               <a href="<?php echo url('th_apply/lst',array('filter'=>2)); ?>"><div class="qiehuan" <?php if($filter && $filter == 2): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>售后中</div></a>
                               <a href="<?php echo url('th_apply/lst',array('filter'=>3)); ?>"><div class="qiehuan" <?php if($filter && $filter == 3): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>已拒绝</div></a>
                               <a href="<?php echo url('th_apply/lst',array('filter'=>5)); ?>"><div class="qiehuan" <?php if($filter && $filter == 5): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>已完成</div></a>
                               <a href="<?php echo url('th_apply/lst',array('filter'=>4)); ?>"><div class="qiehuan" <?php if($filter && $filter == 4): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>用户已撤销</div></a>
                               </div>
                            </div>                                                                                             
                        </div>
                        
						<div class="row" style="margin-top:15px;">
                            <form action="<?php echo url('th_apply/search'); ?>" method="post" id="form_search">          
                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入退换订单号" <?php if((isset($keyword)) AND ($keyword)): ?>value="<?php echo $keyword; ?>"<?php endif; ?> class="input-sm form-control" /><span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary">搜索</button></span>
                                </div>
                            </div>
                                     
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="th_status">
                                    <option value="0" <?php if(isset($th_status) && $th_status == 0): ?>selected="selected"<?php endif; ?>>全部状态</option>
                                    <option value="1" <?php if(isset($th_status) && $th_status == 1): ?>selected="selected"<?php endif; ?>>待审核</option>
                                    <option value="2" <?php if(isset($th_status) && $th_status == 2): ?>selected="selected"<?php endif; ?>>售后中</option>
                                    <option value="3" <?php if(isset($th_status) && $th_status == 3): ?>selected="selected"<?php endif; ?>>已拒绝</option>
                                    <option value="5" <?php if(isset($th_status) && $th_status == 5): ?>selected="selected"<?php endif; ?>>已完成</option>
                                    <option value="4" <?php if(isset($th_status) && $th_status == 4): ?>selected="selected"<?php endif; ?>>用户已撤销</option>
                                </select>
                            </div>
                              
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="thfw_id">
                                    <option value="0" <?php if(isset($thfw_id) && $thfw_id == 0): ?>selected="selected"<?php endif; ?>>全部退换方式</option>
                                    <option value="1" <?php if(isset($thfw_id) && $thfw_id == 1): ?>selected="selected"<?php endif; ?>>仅退款</option>
                                    <option value="2" <?php if(isset($thfw_id) && $thfw_id == 2): ?>selected="selected"<?php endif; ?>>退货退款</option>
                                    <option value="3" <?php if(isset($thfw_id) && $thfw_id == 3): ?>selected="selected"<?php endif; ?>>换货</option>
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
                        <div id="ajaxpagetest">
                        <script>
	var pnum = <?php echo $pnum; ?>;
	<?php if((isset($filter)) AND ($filter)): ?>
	var filter = <?php echo $filter; ?>;
	<?php endif; if((!isset($search)) OR (!$search)): ?>
	var search = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/th_apply/lst/filter/"+filter+".html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/th_apply/search.html?page="+pnum;
	<?php endif; ?>
</script> 

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:15%">售后流水单号</th>
                                    <th style="width:10%">类型</th>
                                    <th style="width:10%">状态</th>
                                    <th style="width:15%">会员昵称</th>
                                    <th style="width:15%">会员手机号</th>
                                    <th style="width:10%">退款金额</th>
                                    <th style="width:15%">申请时间</th>                                
                                    <th style="width:10%">操作</th>  
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?> 
                                <tr>
                                    <td><?php echo $v['th_number']; ?></td>
                                    <td><?php echo $v['cate_name']; ?></td>
                                    <td>
                                    <?php if($v['apply_status'] == 0): ?>
                                    <font style="color:#1c84c6;">待审核</font>
                                    <?php elseif($v['apply_status'] == 1): ?>
                                    <font style="color:#1c84c6;">售后中</font>
                                    <?php elseif($v['apply_status'] == 2): ?>
                                    <font style="color:#F00;">已拒绝</font>                                                             
                                    <?php elseif($v['apply_status'] == 3): ?>
                                    <font style="color:#1992FC;">已完成</font>    
                                    <?php elseif($v['apply_status'] == 4): ?>
                                    <font style="color:#1992FC;">用户已撤销</font>                                                                                                                                                                          
                                    <?php endif; ?>                                                               
                                    </td>
                                    <td><?php if($v['user_name']): ?><?php echo $v['user_name']; else: ?>/<?php endif; ?></td>
                                    <td><?php echo $v['phone']; ?></td>
                                    <td><?php echo $v['tui_price']; ?>&nbsp;元</td>
                                    <td><?php echo date('Y-m-d H:i:s',$v['apply_time']); ?></td>
                                    <td>
                                    <button type="button" class="btn btn-success btn-xs" onclick="getinfo(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;详情</button>
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
    function getinfo(id,obj){
    	var infoUrl = url+'/info/th_id/'+id;
        location.href=infoUrl;
    }
	</script>

</body>
</html>