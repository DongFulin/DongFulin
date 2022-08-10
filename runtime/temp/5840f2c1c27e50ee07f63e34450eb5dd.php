<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/www/wwwroot/ywscs.com/public/../application/admin/view/assemble/lst.html";i:1633859747;s:68:"/www/wwwroot/ywscs.com/application/admin/view/assemble/ajaxpage.html";i:1618769683;}*/ ?>
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
var url = "/<?php echo \think\Request::instance()->module(); ?>/assemble";
var deleteUrl = "<?php echo url('assemble/delete'); ?>";
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
                        <h5>拼团活动列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                        <div class="col-sm-5 m-b-xs">                    
                               <div style="width:1300px; height:40px; margin-bottom:25px;">
                               <a href="<?php echo url('assemble/lst',array('filter'=>10)); ?>"><div class="qiehuan" <?php if($filter && $filter == 10): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>全部</div></a>
                               <a href="<?php echo url('assemble/lst',array('filter'=>1)); ?>"><div class="qiehuan" <?php if($filter && $filter == 1): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>待审核</div></a>
                               <a href="<?php echo url('assemble/lst',array('filter'=>2)); ?>"><div class="qiehuan" <?php if($filter && $filter == 2): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>即将开始</div></a>         
                               <a href="<?php echo url('assemble/lst',array('filter'=>3)); ?>"><div class="qiehuan" <?php if($filter && $filter == 3): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>抢购中</div></a> 
                               <a href="<?php echo url('assemble/lst',array('filter'=>4)); ?>"><div class="qiehuan" <?php if($filter && $filter == 4): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>已结束</div></a> 
                               <a href="<?php echo url('assemble/lst',array('filter'=>5)); ?>"><div class="qiehuan" <?php if($filter && $filter == 5): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>平台关闭</div></a> 
                               </div>
                        </div> 
                        </div>
         
						<div class="row">
						    <div class="col-sm-2 m-b-xs">
						    <a href="<?php echo url('assemble/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;新增拼团活动</button></a>
                            </div>  
                            
                            <div class="col-sm-10 m-b-xs" style="float:right;">
                            <form action="<?php echo url('assemble/search'); ?>" method="post" id="form_search" style="margin-top:10px;">
                            
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
                                                
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="checked">
                                    <option value="0" <?php if((isset($checked)) AND ($checked == 0)): ?>selected="selected"<?php endif; ?>>全部</option>
                                    <option value="1" <?php if((isset($checked)) AND ($checked == 1)): ?>selected="selected"<?php endif; ?>>待平台审核</option>
                                    <option value="2" <?php if((isset($checked)) AND ($checked == 2)): ?>selected="selected"<?php endif; ?>>即将开始</option>
                                    <option value="3" <?php if((isset($checked)) AND ($checked == 3)): ?>selected="selected"<?php endif; ?>>抢购中</option>
                                    <option value="4" <?php if((isset($checked)) AND ($checked == 4)): ?>selected="selected"<?php endif; ?>>已结束</option>
                                    <option value="5" <?php if((isset($checked)) AND ($checked == 5)): ?>selected="selected"<?php endif; ?>>平台关闭</option>
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
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/assemble/lst/filter/"+filter+".html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/assemble/search.html?page="+pnum;
	<?php endif; ?>
</script>    

                  
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:5%">ID</th>
                                    <th style="width:5%">状态</th>
                                    <th style="width:10%">拼团名称</th>
                                    <th style="width:20%">商品信息</th>
                                    <th style="width:10%">拼团价</th>
                                    <th style="width:10%">几人团</th>
                                    <th style="width:15%">开始时间</th>
                                    <th style="width:15%">结束时间</th>
                                    <th style="width:5%">推荐</th>
                                    <th style="width:15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><?php echo $v['id']; ?></td>
                                    <td>
                                    <?php if($v['zhuangtai'] == 1): ?>
                                    <span style="color:#1c84c6;">待审核</span>
                                    <?php elseif($v['zhuangtai'] == 2): ?>
                                    <span style="color:#1c84c6;">即将开始</span>
                                    <?php elseif($v['zhuangtai'] == 3): ?>
                                    <span style="color:#1c84c6;">拼团中</span>
                                    <?php elseif($v['zhuangtai'] == 4): ?>
                                    <span style="color:#1992FC;">已结束</span>
                                    <?php elseif($v['zhuangtai'] == 5): ?>
                                    <span style="color:#ed5565;">平台已关闭</span>
                                    <?php endif; ?>
                                    </td>
                                    <td><?php echo $v['pin_name']; ?></td>
                                    <td><?php echo $v['goods_name']; ?>&nbsp;&nbsp;<?php echo $v['goods_attr_str']; ?></td>
                                    <td><?php echo $v['price']; ?></td>
                                    <td><?php echo $v['pin_num']; ?>人团</td>
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
                                    <button type="button" class="btn btn-info btn-xs" onclick="group_info(<?php echo $v['id']; ?>,this);"><i class="fa fa-paste"></i>&nbsp;详细</button>&nbsp;&nbsp;&nbsp;&nbsp;                                         
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
    
    <script>
    function group_info(id,obj){
 		var infoUrl = url+'/info/id/'+id;
 		location.href = infoUrl;
    }
    </script>    
</body>
</html>