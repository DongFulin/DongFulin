<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/www/wwwroot/ywscs.com/public/../application/admin/view/shop_order/lst.html";i:1640266359;s:70:"/www/wwwroot/ywscs.com/application/admin/view/shop_order/ajaxpage.html";i:1640266299;}*/ ?>
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
//删除url
var deleteUrl = "<?php echo url('shop_order/delete'); ?>";
var url = "/<?php echo \think\Request::instance()->module(); ?>/shop_order";
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
                        <h5>订单列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
						   <div class="col-sm-5 m-b-xs">                    
                               <div style="width:1300px; height:40px; margin-bottom:25px;">
                               <a href="<?php echo url('shop_order/lst',array('filter'=>10)); ?>"><div class="qiehuan" <?php if($filter && $filter == 10): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>全部</div></a>
                               <a href="<?php echo url('shop_order/lst',array('filter'=>1)); ?>"><div class="qiehuan" <?php if($filter && $filter == 1): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>待发货</div></a>
                               <a href="<?php echo url('shop_order/lst',array('filter'=>2)); ?>"><div class="qiehuan" <?php if($filter && $filter == 2): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>已发货</div></a>
                               <a href="<?php echo url('shop_order/lst',array('filter'=>3)); ?>"><div class="qiehuan" <?php if($filter && $filter == 3): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>已完成</div></a>
                               <a href="<?php echo url('shop_order/lst',array('filter'=>4)); ?>"><div class="qiehuan" <?php if($filter && $filter == 4): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>待支付</div></a>
                               <a href="<?php echo url('shop_order/lst',array('filter'=>5)); ?>"><div class="qiehuan" <?php if($filter && $filter == 5): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>已关闭</div></a>
                               </div>
                            </div>                                                                                             
                        </div>
                        
						<div class="row" style="margin-top:15px;">
                            <form action="<?php echo url('shop_order/search'); ?>" method="post" id="form_search">          
                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入订单号" <?php if((isset($keyword)) AND ($keyword)): ?>value="<?php echo $keyword; ?>"<?php endif; ?> class="input-sm form-control" /><span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary">搜索</button></span>
                                </div>
                            </div>
                            
                            <div style="float:right; font-size:15px; margin-right:10px;">
                            <input type="text" name="shop_name" placeholder="请输入商家名称" <?php if((isset($shop_name)) AND ($shop_name)): ?>value="<?php echo $shop_name; ?>"<?php endif; ?> class="input-sm form-control" />
                            </div>
                            
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="zf_type">
                                    <option value="0" <?php if(isset($zf_type) && $zf_type == 0): ?>selected="selected"<?php endif; ?>>支付方式</option>
                                    <option value="1" <?php if(isset($zf_type) && $zf_type == 1): ?>selected="selected"<?php endif; ?>>支付宝支付</option>
                                    <option value="2" <?php if(isset($zf_type) && $zf_type == 2): ?>selected="selected"<?php endif; ?>>微信支付</option>
                                    <option value="3" <?php if(isset($zf_type) && $zf_type == 3): ?>selected="selected"<?php endif; ?>>余额支付</option>
                                </select>
                            </div>
                            
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="order_zt">
                                    <option value="0" <?php if(isset($order_zt) && $order_zt == 0): ?>selected="selected"<?php endif; ?>>状态</option>
                                    <option value="1" <?php if(isset($order_zt) && $order_zt == 1): ?>selected="selected"<?php endif; ?>>待发货</option>
                                    <option value="2" <?php if(isset($order_zt) && $order_zt == 2): ?>selected="selected"<?php endif; ?>>已发货</option>
                                    <option value="3" <?php if(isset($order_zt) && $order_zt == 3): ?>selected="selected"<?php endif; ?>>已完成</option>
                                    <option value="4" <?php if(isset($order_zt) && $order_zt == 4): ?>selected="selected"<?php endif; ?>>待支付</option>
                                    <option value="5" <?php if(isset($order_zt) && $order_zt == 5): ?>selected="selected"<?php endif; ?>>已关闭</option>
                                </select>
                            </div>
                            
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="order_type">
                                    <option value="0" <?php if(isset($order_type) && $order_type == 0): ?>selected="selected"<?php endif; ?>>全部类型</option>
                                    <option value="1" <?php if(isset($order_type) && $order_type == 1): ?>selected="selected"<?php endif; ?>>普通订单</option>
                                    <option value="2" <?php if(isset($order_type) && $order_type == 2): ?>selected="selected"<?php endif; ?>>拼团订单</option>
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
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/shop_order/lst/filter/"+filter+".html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/shop_order/search.html?page="+pnum;
	<?php endif; ?>
</script> 

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:16%">订单号</th>
                                    <th style="width:7%">类型</th>
                                    <th style="width:15%">商家名称</th>
                                    <th style="width:10%">订单状态</th>
                                    <th style="width:10%">会员姓名</th>
                                    <th style="width:10%">联系电话</th>
                                    <th style="width:10%">订单总价</th>
                                    <th style="width:15%">下单时间</th>                                
                                    <th style="width:10%">操作</th>  
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?> 
                                <tr>
                                    <td><?php echo $v['ordernumber']; ?></td>
                                    <td><?php if($v['order_type'] == 1): ?>普通订单<?php elseif($v['order_type'] == 2): ?>拼团订单<?php endif; ?></td>
                                    <td><?php echo $v['shop_name']; ?></td>
                                    <td>

                                        <?php if($v['state'] == 1 && $v['fh_status'] == 0 && $v['order_status'] == 0): ?>
                                        <font style="color:#1c84c6;">待发货</font>
                                        <?php elseif($v['state'] == 1 && $v['fh_status'] == 1 && $v['order_status'] == 0): ?>
                                        <font style="color:#1c84c6;">已发货</font>
                                        <?php elseif($v['state'] == 1 && $v['fh_status'] == 1 && $v['order_status'] == 1): ?>
                                        <font style="color:#1992FC;">已完成</font>
                                        <?php elseif($v['state'] == 0 && $v['fh_status'] == 0 && $v['order_status'] == 0): ?>
                                        <font style="color:#1c84c6;">待支付</font>
                                        <?php elseif($v['order_status'] == 2): ?>
                                        <font style="color:#F00;">已关闭</font>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $v['user_name']; ?></td>
                                    <td><?php echo $v['phone']; ?></td>
                                    <td><?php echo $v['total_price']; ?>&nbsp;元</td>
                                    <td><?php echo date('Y-m-d H:i:s',$v['addtime']); ?></td>
                                    <td>
                                    <button type="button" class="btn btn-success btn-xs" onclick="getinfo(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;详情</button>
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
    
    $(function(){
        $('select[name=pro_id]').change(function(){
        	var pro_id = $(this).val();
        	if(pro_id != 0){
        		$.ajax({
     			   url:"<?php echo url('order/getcitylist'); ?>",
     			   type:'POST',
     			   data:{'pro_id':pro_id},
     		       dataType:'json',
     			   success:function(data){
     				   if(data){
                     	   var html = '';
                     	   html='<option value="0">全部城市</option>';
                           $.each(data,function(i,v){
                         	   html+='<option value="'+v.id+'">'+v.zm+'.'+v.city_name+'</option>';
                           });
                           $('#cityname').html(html);
     					   var html2='<option value="0">全部区县</option>';
     					   $('#areaname').html(html2);
     				   }else{
     					   var html='<option value="0">全部城市</option>';
     					   $('#cityname').html(html);
     					   var html2='<option value="0">全部区县</option>';
     					   $('#areaname').html(html2);
     				   }
     			   },
     			   error:function(){
                       location.reload();
     			   }
     		    });
        	}else{
				var html='<option value="0">全部城市</option>';
				$('#cityname').html(html);
				var html2='<option value="0">全部区县</option>';
				$('#areaname').html(html2);
        	}
        });
        
        $('select[name=city_id]').change(function(){
        	var city_id = $(this).val();
        	if(city_id != 0){
        		$.ajax({
     			   url:"<?php echo url('order/getarealist'); ?>",
     			   type:'POST',
     			   data:{'city_id':city_id},
     		       dataType:'json',
     			   success:function(data){
     				   if(data){
                     	   var html = '';
                     	   var html='<option value="0">全部区县</option>';
                           $.each(data,function(i,v){
                         	  html+='<option value="'+v.id+'">'+v.zm+'.'+v.area_name+'</option>';
                           });
                      	   $('#areaname').html(html);
     				   }else{
     					   var html='<option value="0">全部区县</option>';
     					   $('#areaname').html(html);
     				   }
     			   },
     			   error:function(){
                       location.reload();
    			   }
     		    });
        	}else{
				var html='<option value="0">全部区县</option>';
				$('#areaname').html(html);
        	}
        });
    });
    
    function getinfo(id,obj){
    	var infoUrl = url+'/info/order_id/'+id;
        location.href=infoUrl;
    }
    
	</script>

</body>
</html>