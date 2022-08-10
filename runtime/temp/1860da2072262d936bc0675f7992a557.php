<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/www/wwwroot/ywscs.com/public/../application/admin/view/nav_menu/lst.html";i:1618769683;s:68:"/www/wwwroot/ywscs.com/application/admin/view/nav_menu/ajaxpage.html";i:1631702635;}*/ ?>
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
        var deleteUrl = "<?php echo url('nav_menu/delete'); ?>";
        var url = '/<?php echo \think\Request::instance()->module(); ?>/nav_menu';
        var sortUrl = "<?php echo url('nav_menu/order'); ?>";
        var nav_id = "<?php echo $nav_id; ?>";
        var addUrl = "/<?php echo \think\Request::instance()->module(); ?>/nav_menu/add/nav_id/"+nav_id;
    </script>

    <body class="gray-bg">
        <div class="wrapper wrapper-content" id="server">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><if condition="$pos_name"><?php if((isset($nav_name)) AND ($nav_name)): ?><?php echo $nav_name; endif; ?>菜单列表</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-7 m-b-xs">
                                    <button type="button" class="btn btn-sm btn-primary" id="addar"><i class="fa fa-plus" style="color:#FFF;"></i>&nbsp;增加菜单</button>
                                    <button type="button" class="btn btn-sm btn-success" id="order">更新排序</button>
                                    <button type="button" class="btn btn-sm btn-danger" id="del">批量删除</button>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="goBackLst('/<?php echo \think\Request::instance()->module(); ?>/nav/lst');">返回</button>
                                </div> 
                            </div>                          

                            <div id="ajaxpagetest">
                                <script>
    var pnum = <?php echo $pnum; ?>;
    var search = 0;
    var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/nav_menu/navlist/nav_id/"+nav_id+".html?page="+pnum;

    $(function(){
        $("#checkAll").click(function () {
            $("input[class='text_id']:checkbox").prop("checked", this.checked);
        }); 
    });
</script>                          
                        
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="width:5%"><input type="checkbox" id="checkAll"/></th>
            <th style="width:15%">菜单名称</th>
            <th style="width:10%">icon配图</th>
            <th style="width:20%">url地址</th>
<!--            <th style="width:10%">url类型</th>-->
            <th style="width:10%">是否显示</th>
            <th style="width:10%">排序</th>
            <th style="width:15%">操作</th>
        </tr>
    </thead>
    <tbody>
    <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
        <tr>
            <td><input type="checkbox" class="text_id" name="id[]" value="<?php echo $v['id']; ?>" /></td>
            <td><?php echo $v['menu_name']; ?></td>
            <td><img src="<?php echo $v['image_path']; ?>" width="100px" height="100px" onerror="this.src='/static/admin/img/nopic.jpg'"></td>
            <td><?php echo $v['menu_url']; ?></td>
<!--            <td><?php if(($v['url_type'] == 1)): ?>App内部跳转<?php elseif(($v['url_type'] == 2)): ?>H5跳转<?php elseif(($v['url_type'] == 3)): ?>小程序跳转<?php endif; ?></td>-->
            <td>
            <?php switch($v['is_show']): case "0": ?>
            <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_show',this);"><i class="fa fa-times"></i></button>
            <?php break; case "1": ?>
            <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_show',this);"><i class="fa fa-check"></i></button>
            <?php break; endswitch; ?>
            </td>
            <td><input name="<?php echo $v['id']; ?>" type="text" value="<?php echo $v['sort']; ?>" class="sort" size="3"></td>
            <td>
                <a href="<?php echo url('NavMenu/edit',array('id'=>$v['id'],'nav_id' => $nav_id)); ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i>&nbsp;编辑
                </a>
                <button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>,this);">
                    <i class="fa fa-close"></i>&nbsp;删除
                </button>
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
        <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
        <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
        <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
        <!-- iCheck -->
        <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
        <script src="/static/admin/js/common/ajax.js"></script>
        <script src="/static/admin/js/common/admin.js"></script>

    </body>
</html>