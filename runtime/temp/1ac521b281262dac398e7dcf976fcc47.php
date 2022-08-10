<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"/www/wwwroot/ywscs.com/public/../application/admin/view/news/lst.html";i:1618769683;s:64:"/www/wwwroot/ywscs.com/application/admin/view/news/ajaxpage.html";i:1618769683;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo \think\Config::get('webname'); ?></title>
    <meta name="keywords" content="<?php echo \think\Config::get('keyword'); ?>">
    <meta name="description" content="<?php echo \think\Config::get('description'); ?>">
    <link rel="shortcut icon" href="favicon.ico"> 
	<link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/page.css" rel="stylesheet">
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<style>
    tr{cursor: pointer;}
</style>

<script>
//删除url
var deleteUrl = "<?php echo url('news/delete'); ?>";
var url = '/<?php echo \think\Request::instance()->module(); ?>/news';
</script>

  <script>
  $(document).ready(function(){
      var fixHelperModified = function(e, tr) {
                  var $originals = tr.children();
                  var $helper = tr.clone();
                  $helper.children().each(function(index) {
                      $(this).width($originals.eq(index).width())
                  });
                  return $helper;
              },
              updateIndex = function(e, ui) {
                  var sort = '';
                  var ids = '';
                  $('td.index', ui.item.parent()).each(function (i) {
                      $(this).html(i + 1);
	        		  ids+=$(this).attr('shuxing')+',';
	        		  sort+=$(this).text()+',';
                  });
                  ids = ids.substring(0,ids.length-1);
                  sort = sort.substring(0,sort.length-1);

	              $.ajax({
	            	type:'POST',
	            	url:"<?php echo url('news/paixu'); ?>",
	            	  data:{'ids':ids,'sort':sort},
	            	  dataType:'json',
	            	  success:function(data){
	            	     layer.msg(data.mess, {icon: 1,time: 1000});
	            	  },
	            	  error:function(){
	            		  layer.msg('操作失败或您没有权限，请重试', {icon: 2,time: 2000});
	            	  }
	              });
              };

      $("#sort tbody").sortable({
          helper: fixHelperModified,
          stop: updateIndex
      }).disableSelection();
  });
  </script>

<body class="gray-bg">
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php if((isset($cate_name)) && ($cate_name)): ?><?php echo $cate_name; endif; ?>文章列表</h5>
                    </div>
                    <div class="ibox-content">
						<div class="row">
						   <div class="col-sm-7 m-b-xs">
                                <button type="button" class="btn btn-sm btn-primary" id="addar" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;增加文章</button>
                                <button type="button" class="btn btn-sm btn-danger" id="del">批量删除</button>
                            </div> 
                            
                            <form action="<?php echo url('news/search'); ?>" method="post" id="form_search">
                            <div class="col-sm-2 m-b-xs">
                                <select class="input-sm form-control input-s-sm inline" name="cate_id">
                                    <option value="0">全文搜索</option>
                                    <?php if(is_array($cateres) || $cateres instanceof \think\Collection || $cateres instanceof \think\Paginator): if( count($cateres)==0 ) : echo "" ;else: foreach($cateres as $key=>$v): ?>
                                    <option value="<?php echo $v['id']; ?>" <?php if((isset($cate_id)) && ($cate_id == $v['id'])): ?>selected="selected"<?php endif; if($v['pid'] == '0'): ?>style="font-weight:bold;"<?php endif; ?>><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $v['level']); if($v['level'] > '0'): ?>|<?php endif; ?><?php echo $v['html']; ?><?php echo $v['cate_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>             

                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入文章标题" <?php if(isset($ar_title)): ?>value="<?php echo $ar_title; ?>"<?php endif; ?> class="input-sm form-control"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary" id="submit_search2">搜索</button></span>
                                </div>
                            </div>
                           </form>
                        </div>                          
                        
                        <div id="ajaxpagetest">
                        <script>
	var pnum = <?php echo $pnum; ?>;
	<?php if((!isset($search)) AND (!isset($cate_id))): ?>
	var search = 0;
	var cate_id = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/news/lst.html?page="+pnum;
	var addUrl = "<?php echo url('news/add'); ?>";
	<?php elseif((isset($search)) AND ($search)): ?>
	var search = <?php echo $search; ?>;
	var cate_id = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/news/search.html?page="+pnum;
	var addUrl = "<?php echo url('news/add'); ?>";
	<?php elseif((isset($cate_id)) AND ($cate_id)): ?>
	var cate_id = <?php echo $cate_id; ?>;
	var search = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/news/catelist/cate_id/"+cate_id+".html?page="+pnum;
	var addUrl = "/<?php echo \think\Request::instance()->module(); ?>/news/add/cate_id/"+cate_id;
	<?php endif; ?>
	
	$(function(){
		$("#checkAll").click(function () {
	        $("input[class='text_id']:checkbox").prop("checked", this.checked);
	    }); 
	});
</script>   

 <script>
 var sy2 = $('td.index:first').text();
 var sy = $('td.index:first').text();

		 var fixHelperModified2 = function(e, tr) {
		      var $originals = tr.children();
		      var $helper = tr.clone();
		      $helper.children().each(function(index) {
		          $(this).width($originals.eq(index).width())
		      });
		      return $helper;
		 },
         
         updateIndex2 = function(e, ui) {
	       	  if(sy2 != sy){
	       		  sy = sy2;
	       	  }
	       	  
              var sort = '';
              var ids = '';
              
              $('td.index', ui.item.parent()).each(function (i) {
           	       if(i==0){
                       $(this).html(sy);
           	       }else{
           		      sy = parseInt(sy)+1;
                      $(this).html(sy);
           	       }
	        	   ids+=$(this).attr('shuxing')+',';
	        	   sort+=$(this).text()+',';
              });
              
              ids = ids.substring(0,ids.length-1);
              sort = sort.substring(0,sort.length-1);
              
              $.ajax({
	              type:'POST',
	              url:"<?php echo url('news/paixu'); ?>",
	              data:{'ids':ids,'sort':sort},
	              dataType:'json',
	              success:function(data){
	            	  layer.msg(data.mess, {icon: 1,time: 1000});
	              },
	              error:function(){
	            	  layer.msg('操作失败或您没有权限，请重试', {icon: 2,time: 2000});
	              }
	          });
         };

 $("#sort tbody").sortable({
     helper: fixHelperModified2,
     stop: updateIndex2
 }).disableSelection();
  </script>              
  
         
                        <table id="sort" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:5%"><input type="checkbox" id="checkAll"/></th>
                                    <th style="width:5%">id</th>
                                    <th style="width:25%">文章标题</th>
                                    <th style="width:5%">标识</th>
                                    <th style="width:15%">所属栏目</th>
                                    <th style="width:10%">是否显示</th>
                                    <th style="width:10%">是否推荐</th>
                                    <th style="width:5%" class="index">排序</th>
                                    <th style="width:10%">发布管理员</th>
                                    <th style="width:15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><input type="checkbox" class="text_id" name="id[]" value="<?php echo $v['id']; ?>" /></td>
                                    <td><?php echo $v['id']; ?></td>
                                    <td><?php echo $v['ar_title']; ?></td>
                                    <td>
                                        <?php echo $v['tag']; ?>
                                    </td>
                                    <td><?php echo $v['cate_name']; ?></td>
                                    <td>                                 
                                    <?php switch($v['is_show']): case "0": ?><button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_show',this);"><i class="fa fa-times"></i></button><?php break; case "1": ?><button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_show',this);"><i class="fa fa-check"></i></button><?php break; endswitch; ?>
                                    </td>
                                    <td>                                 
                                    <?php switch($v['is_rem']): case "0": ?><button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_rem',this);"><i class="fa fa-times"></i></button><?php break; case "1": ?><button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_rem',this);"><i class="fa fa-check"></i></button><?php break; endswitch; ?>
                                    </td>
                                    <td class="index" shuxing="<?php echo $v['id']; ?>"><?php echo $v['sort']; ?></td>
                                    <td><?php echo $v['en_name']; ?></td>
                                    <td><button type="button" class="btn btn-primary btn-xs" onclick="editar(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button></td>
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
    <script src="/static/admin/js/common/ajax.js"></script>
    <script src="/static/admin/js/common/admin.js"></script>
	
</body>
</html>