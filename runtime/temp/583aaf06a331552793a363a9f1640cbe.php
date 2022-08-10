<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/ywscs.com/public/../application/admin/view/member_level/lst.html";i:1618769683;}*/ ?>
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
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<script>
var url = "/<?php echo \think\Request::instance()->module(); ?>/member_level";
var deleteUrl = "<?php echo url('member_level/delete'); ?>";
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
	           url:"<?php echo url('member_level/paixu'); ?>",
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
                        <h5>会员等级列表</h5>
                    </div>
                    <div class="ibox-content">
						<div class="row">
						   <div class="col-sm-8 m-b-xs">
                                <a href="<?php echo url('member_level/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;增加会员等级</button></a>    
                            </div>              

                        </div>
						<div id="sj">
                        <table id="sort" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:25%">等级名称</th>
                                    <th style="width:15%">最小积分</th>
                                    <th style="width:15%">最大积分</th>
                                    <th style="width:15%">折扣率</th>
                                    <th style="width:10%" class="index">排序</th>
                                    <th style="width:15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><?php echo $v['level_name']; ?></td>
                                    <td><?php echo $v['points_min']; ?></td>
                                    <td><?php echo $v['points_max']; ?></td>
                                    <td><?php echo $v['rate']; ?></td>
                                    <td class="index" shuxing="<?php echo $v['id']; ?>"><?php echo $v['sort']; ?></td>
                                    <td><button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button></td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; else: ?>
							<tr><td colspan="4" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
							<?php endif; ?>				
                            </tbody>
                        </table>
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
    <script src="/static/admin/js/common/catecommon.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>

</body>
</html>