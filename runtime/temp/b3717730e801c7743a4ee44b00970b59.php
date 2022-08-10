<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"/www/wwwroot/ywscs.com/public/../application/admin/view/brand/lst.html";i:1618769683;s:65:"/www/wwwroot/ywscs.com/application/admin/view/brand/ajaxpage.html";i:1618769683;}*/ ?>
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
var url = "/<?php echo \think\Request::instance()->module(); ?>/brand";
var deleteUrl = "<?php echo url('brand/delete'); ?>";
</script>

<body class="gray-bg" >
<style>
.qiehuan{
width:120px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#333; background-color:#F5F5F6; float:left; margin-right:10px; text-align:center; cursor:pointer;
}
</style>

    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>品牌列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
						   <div class="col-sm-8 m-b-xs">                    
                               <div style="width:1200px; height:40px; margin-bottom:10px;">
                               <a href="<?php echo url('brand/lst',array('filter'=>10)); ?>"><div class="qiehuan" <?php if((isset($filter)) AND ($filter == 10)): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>全部</div></a>
                               <a href="<?php echo url('brand/lst',array('filter'=>1)); ?>"><div class="qiehuan" <?php if((isset($filter)) AND ($filter == 1)): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>显示</div></a>    
                               <a href="<?php echo url('brand/lst',array('filter'=>2)); ?>"><div class="qiehuan" <?php if((isset($filter)) AND ($filter == 2)): ?>style="background-color: #1992FC;color: #FFF;"<?php endif; ?>>隐藏</div></a>               
                               </div>
                            </div>                                                                                             
                        </div>
                        
                    
                        <div class="row" style="margin-top:10px; margin-bottom:20px;"> 
                        	<div class="col-sm-3 m-b-xs">
                                 <a href="<?php echo url('brand/add'); ?>"><button type="button" class="btn btn-sm btn-primary" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;添加品牌</button></a>
                            </div>   
                            
                            <form action="<?php echo url('brand/search'); ?>" method="post" id="form_search">          
                            <div class="col-sm-2" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入品牌名称" <?php if((isset($keyword)) AND ($keyword)): ?>value="<?php echo $keyword; ?>"<?php endif; ?> class="input-sm form-control" /><span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary">搜索</button></span>
                                </div>
                            </div>
                            
                            <div style="float:right; font-size:15px; margin-right:10px;">
                                <select style="height:30px; line-height:30px; border:1px solid #e5e6e7;" name="brand_zt">
                                    <option value="0" <?php if((isset($brand_zt)) AND ($brand_zt == 0)): ?>selected="selected"<?php endif; ?>>全部</option>
                                    <option value="1" <?php if((isset($brand_zt)) AND ($brand_zt == 1)): ?>selected="selected"<?php endif; ?>>显示</option>
                                    <option value="2" <?php if((isset($brand_zt)) AND ($brand_zt == 2)): ?>selected="selected"<?php endif; ?>>隐藏</option>
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
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/brand/lst/filter/"+filter+".html?page="+pnum;
	<?php else: ?>
	var search = <?php echo $search; ?>;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/brand/search.html?page="+pnum;
	<?php endif; ?>
</script>

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:30%">品牌名称</th>
                                    <th style="width:30%">logo</th>
                                    <th style="width:20%">显示/隐藏</th>
                                    <th style="width:20%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?> 
                                <tr>
                                    <td><?php echo $v['brand_name']; ?></td>
                                    <td><img <?php if($v['brand_logo']): ?>src="/<?php echo $v['brand_logo']; ?>"<?php else: ?>src="/static/admin/img/nopic.jpg"<?php endif; ?> width="30px" height="30px"/></td>
                                    <td>
                                    <?php switch($v['is_show']): case "0": ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_show',this);"><i class="fa fa-times"></i></button>
                                    <?php break; case "1": ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_show',this);"><i class="fa fa-check"></i></button>
                                    <?php break; endswitch; ?>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="editpic(<?php echo $v['id']; ?>,this);"><i class="fa fa-paste"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button>
                                    </td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; else: ?>
							<tr><td colspan="4" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
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