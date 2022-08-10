<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/www/wwwroot/ywscs.com/public/../application/admin/view/rz_order/lst.html";i:1618769683;s:68:"/www/wwwroot/ywscs.com/application/admin/view/rz_order/ajaxpage.html";i:1618769683;}*/ ?>
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
var url = "/<?php echo \think\Request::instance()->module(); ?>/rz_order";
</script>

<body class="gray-bg" >
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
                        <h5>入驻保证金订单列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
						   <div class="col-sm-5 m-b-xs">                    
                               <div style="width:1300px; height:40px; margin-bottom:25px;">
                               <a href="<?php echo url('rz_order/lst',array('filter'=>3)); ?>"><div class="qiehuan" <?php if((isset($filter)) AND ($filter == 3)): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>全部</div></a>
                               <a href="<?php echo url('rz_order/lst',array('filter'=>1)); ?>"><div class="qiehuan" <?php if((isset($filter)) AND ($filter == 1)): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>已支付</div></a>
                               <a href="<?php echo url('rz_order/lst',array('filter'=>2)); ?>"><div class="qiehuan" <?php if((isset($filter)) AND ($filter == 2)): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>待支付</div></a>
                               </div>
                            </div>                                                                                             
                        </div>
                        
						<div class="row">
                            <form action="<?php echo url('rz_order/search'); ?>" method="post" id="form_search">          
                            <div class="col-sm-2" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="" <?php if((isset($keyword)) AND ($keyword)): ?>value="<?php echo $keyword; ?>"<?php endif; ?> class="input-sm form-control" /><span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary">搜索</button></span>
                                </div>
                            </div>
                            
                            <div style="float:right; margin-right:10px; font-size:15px;">
                                <select class="input-sm form-control input-s-sm inline" name="search_type">
                                    <option value="1" <?php if((isset($search_type)) AND ($search_type == 1)): ?>selected="selected"<?php endif; ?>>按订单号</option>
                                    <option value="2" <?php if((isset($search_type)) AND ($search_type == 2)): ?>selected="selected"<?php endif; ?>>按商家手机号</option>
                                </select>
                            </div>

                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="zhifu_type">
                                    <option value="0" <?php if(isset($zhifu_type) && $zhifu_type == 0): ?>selected="selected"<?php endif; ?>>全部</option>
                                    <option value="1" <?php if(isset($zhifu_type) && $zhifu_type == 1): ?>selected="selected"<?php endif; ?>>已支付</option>
                                    <option value="2" <?php if(isset($zhifu_type) && $zhifu_type == 2): ?>selected="selected"<?php endif; ?>>待支付</option>
                                </select>
                            </div>

                            <div class="date fr" id="to" style="float:right; font-size:15px; margin-right:10px;"> 
                                <input type="text" name="endtime" readonly="readonly" placeholder="结束时间" <?php if((isset($endtime)) AND ($endtime)): ?> value="<?php echo date('Y-m-d',$endtime); ?>"<?php endif; ?> class="date-check">                           
                            </div> 
                            
                            <div class="date date1 fl" id="from" style="float:right; font-size:15px; margin-right:10px;">
                                <input type="text" name="starttime" readonly="readonly" placeholder="开始时间" <?php if((isset($starttime)) AND ($starttime)): ?> value="<?php echo date('Y-m-d',$starttime); ?>"<?php endif; ?> class="date-check">                              
                            </div> 
                            
                            <div style="float:right; margin-right:10px; font-size:15px;">
                                <select class="input-sm form-control input-s-sm inline" name="area_id" id="areaname">
	                                <option <?php if((isset($area_id)) AND ($area_id == 0)): ?>selected="selected"<?php endif; ?> value="0" >全部区县</option>
	                                <?php if((isset($areares)) AND ($areares)): if(is_array($areares) || $areares instanceof \think\Collection || $areares instanceof \think\Paginator): if( count($areares)==0 ) : echo "" ;else: foreach($areares as $key=>$v): ?>
		                            <option value="<?php echo $v['id']; ?>" <?php if((isset($area_id)) AND ($area_id == $v['id'])): ?>selected="selected"<?php endif; ?>><?php echo $v['zm']; ?>.<?php echo $v['area_name']; ?></option>
		                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </select>
                            </div>
                            
                            <div style="float:right; margin-right:10px; font-size:15px;">
                                <select class="input-sm form-control input-s-sm inline" name="city_id" id="cityname">
	                                <option <?php if((isset($city_id)) AND ($city_id == 0)): ?>selected="selected"<?php endif; ?> value="0">全部城市</option>
	                                <?php if((isset($cityres)) AND ($cityres)): if(is_array($cityres) || $cityres instanceof \think\Collection || $cityres instanceof \think\Paginator): if( count($cityres)==0 ) : echo "" ;else: foreach($cityres as $key=>$v): ?>
		                            <option value="<?php echo $v['id']; ?>" <?php if((isset($city_id)) AND ($city_id == $v['id'])): ?>selected="selected"<?php endif; ?>><?php echo $v['zm']; ?>.<?php echo $v['city_name']; ?></option>
		                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </select>
                            </div>
                            
                            <div style="float:right; margin-right:10px; font-size:15px;">
                                <select class="input-sm form-control input-s-sm inline" name="pro_id">
                                    <option <?php if((isset($pro_id)) AND ($pro_id == 0)): ?>selected="selected"<?php endif; ?> value="0">全部省份</option>
                                    <?php if(is_array($prores) || $prores instanceof \think\Collection || $prores instanceof \think\Paginator): if( count($prores)==0 ) : echo "" ;else: foreach($prores as $key=>$v): ?>
                                    <option value="<?php echo $v['id']; ?>" <?php if((isset($pro_id)) AND ($pro_id == $v['id'])): ?>selected="selected"<?php endif; ?>><?php echo $v['zm']; ?>.<?php echo $v['pro_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
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
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/rz_order/lst/filter/"+filter+".html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/rz_order/search.html?page="+pnum;
	<?php endif; ?>
</script>    
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:15%">订单号</th>
                                    <th style="width:10%">状态</th>
                                    <th style="width:10%">联系人</th>
                                    <th style="width:10%">手机号</th>
                                    <th style="width:10%">总金额</th>
                                    <th style="width:20%">省市区</th>
                                    <th style="width:15%">提交时间</th>
                                    <th style="width:10%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?> 
                                <tr>
                                    <td><?php echo $v['ordernumber']; ?></td>
                                    <td>
                                    <?php switch($v['state']): case "0": ?><span style="color:#1c84c6;">待支付</span><?php break; case "1": ?><span style="color:#1992FC;">已支付</span><?php break; endswitch; ?>
                                    </td>
                                    <td><?php echo $v['contacts']; ?></td>
                                    <td><?php echo $v['telephone']; ?></td>
                                    <td><?php echo $v['total_price']; ?>&nbsp;元</td>
                                    <td><?php echo $v['pro_name']; ?>&nbsp;<?php echo $v['city_name']; ?>&nbsp;<?php echo $v['area_name']; ?></td>
                                    <td><?php echo date('Y-m-d H:i:s',$v['addtime']); ?></td>
                                    <td><button type="button" class="btn btn-info btn-xs" onclick="orderinfo(<?php echo $v['id']; ?>,this);"><i class="fa fa-paste"></i>&nbsp;详细</button></td>
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

    
    function orderinfo(id,obj){
 		var infoUrl = url+'/info/order_id/'+id;
    	layer.open({
    		type : 2,
    		title : '入驻保证金订单详情',
    		shadeClose : true,
    		shade : 0.5,
    		area : ['1000px','650px'],
    		content : infoUrl
    	});
    }
    
	</script>

</body>
</html>