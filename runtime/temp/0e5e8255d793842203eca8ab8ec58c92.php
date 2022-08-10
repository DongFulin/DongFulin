<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/www/wwwroot/ywscs.com/public/../application/admin/view/integral_task/lst.html";i:1642694342;s:73:"/www/wwwroot/ywscs.com/application/admin/view/integral_task/ajaxpage.html";i:1642694348;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/page.css" rel="stylesheet">
</head>
<script>
    var deleteUrl = "<?php echo url('IntegralTask/delete'); ?>";
    var sortUrl = "<?php echo url('IntegralTask/updateSort'); ?>";
</script>

<body class="gray-bg">
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>任务列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row" style="margin-top:10px;margin-bottom:10px;">
                            <div class="col-sm-3 m-b-xs">
<!--                                <a href="<?php echo url('IntegralTask/add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;添加任务</a>-->
                                <button type="button" class="btn btn-sm btn-success" id="order">更新排序</button>
                            </div>
                            
                            <form action="<?php echo url('IntegralTask/lst'); ?>" method="post">
                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入任务名称或标签名称" value="<?php echo $keyword; ?>" class="input-sm form-control">
                                    <span class="input-group-btn"><button type="submit" class="btn btn-sm btn-primary">搜索</button></span>
                                </div>
                            </div>
                           </form>
                        </div>
                        
                        <div id="ajaxpagetest">
                            <script>
    <?php if(isset($pnum)): ?>
    var pnum = <?php echo $pnum; ?>;
    <?php else: ?>
    var pnum = 0;
    <?php endif; ?>
    var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/integral_task/lst.html?page="+pnum;
</script>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th>任务名称</th>
            <th>标签名称</th>
            <th>获得积分</th>
            <th>是否开启</th>
            <th>排序</th>
            <th width="15%">创建时间</th>
            <th width="15%">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
        <tr>
            <td><?php echo $v['id']; ?></td>
            <td><?php echo $v['task_name']; ?></td>
            <td><?php echo $v['tag_name']; ?></td>
            <td><?php echo $v['integral']; ?></td>
            <td>
                <?php switch($v['status']): case "0": ?>
                <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>, <?php echo $v['status']; ?>);"><i class="fa fa-times"></i></button>
                <?php break; case "1": ?>
                <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>, <?php echo $v['status']; ?>);"><i class="fa fa-check"></i></button>
                <?php break; endswitch; ?>
            </td>
            <td><input name="<?php echo $v['id']; ?>" type="text" value="<?php echo $v['sort']; ?>" class="sort" size="3"></td>
            <td><?php echo $v['create_time']; ?></td>
            <td>
                <a href="<?php echo url('IntegralTask/edit',array('id'=>$v['id'])); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>&nbsp;编辑</a>&nbsp;
<!--                <button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>, this);"><i class="fa fa-close"></i>&nbsp;删除</button></td>-->
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
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/admin.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>
    
    <script type="text/javascript">

        //显示/隐藏
        function changeTableVal(id, status) {
            $.ajax({
                url:"<?php echo url('IntegralTask/changeStatus'); ?>",
                type:'POST',
                data:{id: id, status: status},
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

    </script>
    
    
	
</body>
</html>