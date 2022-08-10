<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/ywscs.com/public/../application/admin/view/find_cate/lst.html";i:1618769683;}*/ ?>
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
var deleteUrl = "<?php echo url('FindCate/delete'); ?>";
</script>
<body class="gray-bg">

    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>分类列表</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="row" style="margin-top:10px;margin-bottom:10px;">  
                            <div class="col-sm-3 m-b-xs">
                                <a href="<?php echo url('FindCate/add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;添加分类</a>
                            </div>
                        </div>
                        
                        <div id="ajaxpagetest">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>名称</th>
                                    <th>标题</th>
                                    <th>是否显示</th>
                                    <th>排序</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                                <tr>
                                    <td><?php echo $v['name']; ?></td>
                                    <td><?php echo $v['title']; ?></td>
                                    <td>
                                        <?php if($v['is_show'] == 1): ?>
                                        <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>, <?php echo $v['is_show']; ?>);"><i class="fa fa-check"></i></button>
                                        <?php elseif($v['is_show'] == 0): ?>
                                        <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>, <?php echo $v['is_show']; ?>);"><i class="fa fa-times"></i></button>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $v['sort']; ?></td>
                                    <td><?php echo $v['create_time']; ?></td>
                                    <td>
                                        <a href="<?php echo url('FindCate/edit',array('id'=>$v['id'])); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>&nbsp;编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button></td>
                                    </td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                                <tr><td colspan="6" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
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
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/admin.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>

	<script type="text/javascript">

        //是否显示
        function changeTableVal(id, is_show) {
            $.ajax({
                url:"<?php echo url('FindCate/changeShow'); ?>",
                type:'POST',
                data:{id: id,is_show: is_show},
                dataType:'json',
                success:function(data) {
                    if (!data.status) {
                        layer.msg(data.mess, {icon: 2,time: 2000});
                    } else {
                        location.reload();
                    }
                }
            });
        }
        
        function cl(){
            location.href = "<?php echo url('FindCate/lst'); ?>";
        }

    </script>
	
</body>
</html>