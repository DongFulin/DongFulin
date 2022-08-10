<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"/www/wwwroot/ywscs.com/public/../application/admin/view/goods/lst.html";i:1632618348;s:65:"/www/wwwroot/ywscs.com/application/admin/view/goods/ajaxpage.html";i:1633589491;}*/ ?>
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
</head>

<script>
//删除url
var url = "/<?php echo \think\Request::instance()->module(); ?>/goods";
var recycleUrl = "<?php echo url('goods/recycle'); ?>";
</script>

<body class="gray-bg">
<style>
    .qiehuan{
        width:120px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#333; background-color:#F5F5F6; float:left; margin-right:10px; text-align:center; cursor:pointer;
    }
    .integral-box{
        text-align: center;
        color: #ff0000;
        border: 1px solid #ff0000;
        border-radius: 3px;
        padding: 3px;
        width: 180px;
        line-height: normal;
        margin-bottom: 3px;
    }
</style>
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php if(isset($cate_name) && $cate_name): ?><?php echo $cate_name; endif; ?>商品列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                        <div class="col-sm-5 m-b-xs">                    
                               <div style="width:1300px; height:40px; margin-bottom:25px;">
                               <a href="<?php echo url('goods/lst',array('filter'=>3)); ?>"><div class="qiehuan" <?php if($filter && $filter == 3): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>全部</div></a>
                               <a href="<?php echo url('goods/lst',array('filter'=>1)); ?>"><div class="qiehuan" <?php if($filter && $filter == 1): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>上架</div></a>
                               <a href="<?php echo url('goods/lst',array('filter'=>2)); ?>"><div class="qiehuan" <?php if($filter && $filter == 2): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>下架</div></a>         
                               </div>
                        </div> 
                        </div>
                        
                        <div class="row" style="margin-top:10px;margin-bottom:20px;">  
                        	<div class="col-sm-3 m-b-xs">
                                <button type="button" class="btn btn-sm btn-primary" id="addgoods" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;增加商品</button>
                                <a href="<?php echo url('goods/hslst'); ?>"><button type="button" class="btn btn-sm btn-success"><i class="fa fa-paste"></i>&nbsp;回收站</button></a>
                                <button type="button" style="margin-left:15px;" class="btn btn-sm btn-primary" onclick="selectGoods();">批量修改分类</button>
                            </div>
                        
                            <form action="<?php echo url('goods/search'); ?>" method="post" id="form_search">
                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入商品名称" <?php if(isset($goods_name) && $goods_name): ?>value="<?php echo $goods_name; ?>"<?php endif; ?> class="input-sm form-control"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary" id="submit_search2">搜索</button></span>
                                </div>
                            </div>
                            
                            <div style="float:right; font-size:15px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="onsale">
                                    <option value="0" <?php if(isset($onsale) && $onsale == 0): ?>selected="selected"<?php endif; ?>>全部</option>
                                    <option value="1" <?php if(isset($onsale) && $onsale == 1): ?>selected="selected"<?php endif; ?>>上架</option>
                                    <option value="2" <?php if(isset($onsale) && $onsale == 2): ?>selected="selected"<?php endif; ?>>下架</option>
                                </select>
                            </div> 
                            
                            
                            <div style="float:right; margin-right:10px; font-size:15px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="attr">
                                    <option value="0" <?php if(isset($attr) && $attr == 0): ?>selected="selected"<?php endif; ?>>全部</option>
                                    <option value="is_special" <?php if(isset($attr) && $attr == 'is_special'): ?>selected="selected"<?php endif; ?>>特价</option>
                                    <option value="is_new" <?php if(isset($attr) && $attr == 'is_new'): ?>selected="selected"<?php endif; ?>>新品</option>                                    
                                    <option value="is_hot" <?php if(isset($attr) && $attr == 'is_hot'): ?>selected="selected"<?php endif; ?>>热销</option>
                                    <option value="is_recommend" <?php if(isset($attr) && $attr == 'is_recommend'): ?>selected="selected"<?php endif; ?>>推荐</option>
                                </select>
                            </div> 
                            
                            
                            <div style="float:right; margin-right:10px; font-size:15px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="brand_id">
                                    <option value="0" <?php if(isset($brand_id) && $brand_id == 0): ?>selected="selected"<?php endif; ?>>所有品牌</option>
                                    <?php if(is_array($brandres) || $brandres instanceof \think\Collection || $brandres instanceof \think\Paginator): if( count($brandres)==0 ) : echo "" ;else: foreach($brandres as $key=>$v): ?>
                                    <option value="<?php echo $v['id']; ?>" <?php if(isset($brand_id) && $brand_id == $v['id']): ?>selected="selected"<?php endif; ?>><?php echo $v['brand_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div> 
                            
                            <div style="float:right; margin-right:10px; font-size:15px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="cate_id">
                                    <option value="0" <?php if(isset($cate_id) && $cate_id == 0): ?>selected="selected"<?php endif; ?>>所有分类</option>
                                    <?php if(is_array($cateres) || $cateres instanceof \think\Collection || $cateres instanceof \think\Paginator): if( count($cateres)==0 ) : echo "" ;else: foreach($cateres as $key=>$v): ?>
                                    <option value="<?php echo $v['id']; ?>" <?php if(isset($cate_id) && $cate_id == $v['id']): ?>selected="selected"<?php endif; ?>><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $v['level']); if($v["level"] > 0): ?>|<?php endif; ?><?php echo $v['html']; ?><?php echo $v['cate_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>                         
                           </form>
                           
                        </div>  
                        
                        
                        <div id="ajaxpagetest">
                        <!--
 * @Descripttion: 
 * @Copyright: 武汉一一零七科技有限公司©版权所有
 * @Link: www.s1107.com
 * @Contact: QQ:2487937004
 * @LastEditors: cbing
 * @LastEditTime: 2020-05-01 18:40:18
 -->
<script>
	var pnum = <?php echo $pnum; ?>;
	<?php if((isset($filter)) AND ($filter)): ?>
	var filter = <?php echo $filter; ?>;
	<?php endif; if(!isset($search) && !isset($cate_id)): ?>
	var search = 0;
	var cate_id = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/goods/lst/filter/"+filter+".html?page="+pnum;
	<?php elseif(isset($search) && $search): ?>
	var search = <?php echo $search; ?>;
	var cate_id = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/goods/search.html?page="+pnum;
	<?php elseif(isset($cate_id) && $cate_id): ?>
	var cate_id = <?php echo $cate_id; ?>;
	var search = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/goods/catelist/cate_id/"+cate_id+"/filter/"+filter+".html?page="+pnum;
	<?php endif; ?>
</script>                           
                        
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:5%"><input type="checkbox" id="checkAll"/></th>
                                    <th style="width:5%">ID</th>
                                    <th style="width:20%">商品标题</th>
                                    <th style="width:8%">缩略图</th>
                                    <th style="width:10%">所属分类</th>
                                    <th style="width:8%">市场价格</th>
                                    <th style="width:8%">销售价格</th>
                                    <th style="width:5%">上架</th>
                                    <th style="width:5%">是否直播间商品</th>
                                    <th style="width:15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?> 
                                <tr>
                                    <td><input type="checkbox" id="goods_id" class="text_id" name="id[]" value="<?php echo $v['id']; ?>" /></td>
                                    <td><?php echo $v['id']; ?></td>
                                    <td>
                                            <?php if(($v['integral_cate'] == 1)): ?>
                                            <div class="integral-box">
                                                积分商品：积分抵扣金额
                                            </div>
                                            <?php elseif(($v['integral_cate'] == 2)): ?>
                                            <div class="integral-box">
                                                积分商品：积分+商品金额
                                            </div>
                                            <?php elseif(($v['integral_cate'] == 3)): ?>
                                            <div class="integral-box">
                                                积分商品：积分换购
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php echo $v['goods_name']; ?>
                                    </td>   
                                    <td>
                                        <img src="<?php echo $v['thumb_url']; ?>" width="80px" height="80px"/>
                                    </td>                                   
                                    <td><?php echo $v['cate_name']; ?></td>
                                    <td><?php echo $v['market_price']; ?>元</td>
                                    <td><?php echo $v['shop_price']; ?>元</td>
                                    <td>
                                    <?php if($v['onsale'] == 1): ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'onsale',this);"><i class="fa fa-check"></i></button>
                                    <?php elseif($v['onsale'] == 0): ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'onsale',this);"><i class="fa fa-times"></i></button>
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php if($v['is_live'] == 1): ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_live',this);"><i class="fa fa-check"></i></button>
                                    <?php elseif($v['is_live'] == 0): ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_live',this);"><i class="fa fa-times"></i></button>
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" onclick="editgoods(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>
                                        <button type="button" class="btn btn-danger btn-xs" onclick="recycle(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button>
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
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/admin.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>

	<script type="text/javascript">
    $(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
        
        $('#addgoods').click(function(){
        	if(cate_id == 0){        		
        		location.href=url+'/add';
        	}else{
        		location.href=url+'/add/cate_id/'+cate_id;
        	}
        }); 
          	
    });
    //获取选择的值
    function selectGoods(){
        var ids=[];
        var r = document.getElementsByName("id[]");
        for (var i = 0; i < r.length; i++) {
            if(r[i].checked){
                ids[i]=r[i].value;
            }
        }
        if(ids == ''){
            layer.msg('请选择商品', {icon: 2,time: 1000});
            return false;
        }
        var goodsurl="<?php echo url('goods/setcate'); ?>";
        layer.open({
            type: 2,
            title: '批量修改分类',
            shadeClose: true,
            shade: 0.3,
            area: ['70%', '80%'],
            content: goodsurl,
            success: function (layero, index) {
                //找到它的子窗口的body
                var body = layer.getChildFrame('body', index);  //巧妙的地方在这里哦
                //为子窗口元素赋值
                body.contents().find("#ids").val(ids);
            }
        });
    }

    function call_backcate(){
        var url=window.location.href;
        location.href=url+'?page='+pnum;
    }
    //库存
    function product(id,obj){
    	location.href=url+'/product/id/'+id;
    }
    </script>
	
</body>
</html>