<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/www/wwwroot/ywscs.com/public/../application/admin/view/dispatch/lst.html";i:1641452175;s:68:"/www/wwwroot/ywscs.com/application/admin/view/dispatch/ajaxpage.html";i:1641049528;}*/ ?>
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
</head>

<script>
    //删除url
    var deleteUrl = "<?php echo url('dispatch/delete'); ?>";
    var url = "/<?php echo \think\Request::instance()->module(); ?>/dispatch";
    var sortUrl = "<?php echo url('dispatch/order'); ?>";
    var enableUrl = "<?php echo url('dispatch/enable'); ?>";
</script>

<body class="gray-bg">
<div class="wrapper wrapper-content" id="server">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>配送方式列表</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-7 m-b-xs">
                            <a href="<?php echo url('dispatch/add'); ?>"><button type="button" class="btn btn-sm btn-primary" id="add" style="margin-right:15px;"><i class="fa fa-plus" style="color:#FFF;"></i> 添加配送方式</button></a>
                            <button type="button" class="btn btn-sm btn-success" style="margin-right:15px;" id="order">更新排序</button>
                            <button type="button" class="btn btn-sm btn-default" onclick="enable(1)" style="margin-right:15px;"><i class="fa fa-check-circle-o" style="color:#FFF;"></i> 启用</button>
                            <button type="button" class="btn btn-sm btn-default" onclick="enable(0)" style="margin-right:15px;"><i class="fa fa-ban" style="color:#FFF;"></i> 禁用</button>
                            <button type="button" class="btn btn-sm btn-default" id="del" style="margin-right:15px;"><i class="fa fa-trash" style="color:#FFF;"></i> 删除</button>
                        </div>

                        <form action="<?php echo url('dispatch/search'); ?>" method="post" id="form_search">
                            <div class="col-sm-3" style="float:right;">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="请输入配送方式名称" <?php if(!(empty($dispatch_name) || (($dispatch_name instanceof \think\Collection || $dispatch_name instanceof \think\Paginator ) && $dispatch_name->isEmpty()))): ?>value="<?php echo $dispatch_name; ?>"<?php endif; ?> class="input-sm form-control"><span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary" id="submit_search">搜索</button></span>
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
    <?php endif; if((!isset($search)) OR (!$search)): ?>
    var search = 0;
    var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/dispatch/lst.html?page="+pnum;
    <?php else: ?>
    var search = <?php echo $search; ?>;
    var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/dispatch/search.html?page="+pnum;
    <?php endif; ?>
    $(function(){
        $("#checkAll").click(function () {
            $("input[class='text_id']:checkbox").prop("checked", this.checked);
        });
    });
</script>

<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th style="width:5%"><input type="checkbox" id="checkAll"></th>
        <th style="width:25%">名称</th>
        <th style="width:20%">计费方式</th>
        <th style="width:10%">首重(首件)价格</th>
        <th style="width:10%">续重(续件)价格</th>
        <th style="width:10%">状态</th>
        <th style="width:5%">默认</th>
        <th style="width:5%">排序</th>
        <th style="width:10%">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
    <tr>
        <td><input type="checkbox" class="text_id" name="id" value="<?php echo $v['id']; ?>"></td>
        <td><?php echo $v['dispatch_name']; ?></td>
        <?php if($v['calculate_type']==0): ?>
        <td>按重量计费</td>
        <td><?php echo $v['first_price']; ?></td>
        <td><?php echo $v['second_price']; ?></td>
        <?php else: ?>
        <td>按件计费</td>
        <td><?php echo $v['first_num_price']; ?></td>
        <td><?php echo $v['second_num_price']; ?></td>
        <?php endif; ?>
        <td>
            <?php switch($v['enabled']): case "0": ?>
            <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'enabled',this);"><i class="fa fa-times"></i></button>
            <?php break; case "1": ?>
            <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'enabled',this);"><i class="fa fa-check"></i></button>
            <?php break; endswitch; ?>
        </td>
        <td>
            <?php switch($v['is_default']): case "0": ?>
            <button class="btn btn-danger btn-xs dispatch_is_default" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_default',this);"><i class="fa fa-times"></i></button>
            <?php break; case "1": ?>
            <button class="btn btn-primary btn-xs dispatch_is_default" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_default',this);"><i class="fa fa-check"></i></button>
            <?php break; endswitch; ?>
        </td>
        <td><input name="<?php echo $v['id']; ?>" typed="text" value="<?php echo $v['sort']; ?>" class="sort" size="5" /></td>
        <td>
            <button type="button" class="btn btn-primary btn-xs" onclick="edit2(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; else: ?>
    <tr><td colspan="6" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
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
    function enable(i){
        var id_array=new Array();
        $('input[class=text_id]:checked').each(function(i,o){
            id_array.push($(o).val());//向数组中添加元素
        });
        var idstr=id_array.join(',');//将数组元素连接起来以构建一个字符串
        post(enableUrl,'POST',{'id':idstr,'enable':i},1);
    }

</script>
</body>
</html>