<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/www/wwwroot/ywscs.com/public/../application/admin/view/goods_import/lst.html";i:1618769683;s:72:"/www/wwwroot/ywscs.com/application/admin/view/goods_import/ajaxpage.html";i:1618769683;}*/ ?>
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
    <link href="/static/admin/Huploadify/Huploadify.css" rel="stylesheet" type="text/css"/>
</head>

<script>
    var deleteUrl = "<?php echo url('goods_import/delete'); ?>";
    var url = "<?php echo url('goods_import/lst'); ?>";
</script>

<body class="gray-bg" >
    <div class="wrapper wrapper-content" id="server">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>商品导入记录列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row" style="margin-top:10px;margin-bottom:10px;">  
                            <div class="col-sm-3 m-b-xs">
                                <div id="uploaderInput" style="margin-right:10px; float:left;"></div>
                                <button type="button" class="btn btn-sm btn-primary" style="float:left;margin-right:15px;" onclick="downLoadTemp();">下载导入模板</button>
                            </div> 
                        
                            <form action="" method="post" id="form_search">
                                                
                       
                            </form>
                           
                        </div>  

                        <div id="ajaxpagetest">
                        

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="width:5%"><input type="checkbox" id="checkAll"/></th>
            <th style="width:45%">文件存放路径</th>
            <th style="width:10%">导入状态</th>
            <th style="width:15%">导入时间</th>
            <th style="width:20%">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
        <tr>
            <td><input type="checkbox" class="text_id" name="id" value="<?php echo $v['id']; ?>" /></td>
            <td><a href="<?php echo $weburl; ?><?php echo $v['file_path']; ?>">...<?php echo $v['file_path']; ?></a></td>
            <td>
                <?php if($v['status'] == 1): ?>
                    <font style="color:#1ab394;">导入成功</font>
                <?php elseif($v['status'] == 0): ?>
                    <font style="color:#F00;">导入失败</font>
                <?php endif; ?>
            </td>
            <td><?php echo $v['create_time']; ?></td>
            <td><button type="button" class="btn btn-danger btn-xs" onclick="delone(<?php echo $v['id']; ?>, this);"><i class="fa fa-close"></i>&nbsp;删除</button></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <tr><td colspan="5" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
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
    <script src="/static/admin/Huploadify/jquery.Huploadify.js"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/admin.js"></script>    
    <script src="/static/admin/js/common/ajax.js"></script>


    <script>
    	$(function(){
            //导入数据
            $('#uploaderInput').Huploadify({
                uploader : '<?php echo url("goods_import/import"); ?>',
                method:'post',
                formData:null,//发送给服务端的参数，格式：{key1:value1,key2:value2}
                buttonText : '商品数据导入', 
                removeTimeout: 2000,
                fileTypeDesc:'*.xls;*.xlsx;',  
                fileTypeExts:'*.xls;*.xlsx;', 
                fileObjName: 'filedata', //上传附件$_FILE标识  
                fileSizeLimit : 2048,
                //showUploadedPercent:false,//是否实时显示上传的百分比，如20%
                auto : true, //开启,自动上传
                multi : false, //开启,多选文件
                //开始上传
                onUploadStart:function(file){
                    layer.load(2);
                },
                onUploadSuccess : function(file, data, response) {
                    //解析成json对象
                    eval('var data='+data);
                    if(data.status == 1){
                        layer.msg(data.mess, {icon: 1,time: 1000},function(){
                            cl();
                        });
                    }else{
                        layer.msg(data.mess, {icon: 2,time: 2000});
                    }
                },
                //上传完成后执行的操作
                onUploadComplete:function(file){
                    layer.closeAll('loading');
                },
                //上传错误  
                onUploadError : function(file, errorCode, errorMsg, errorString) { 
                    layer.msg('文件' + file.name + '上传失败:' + errorString, {icon: 2,time: 2000}); 
                }
            }); 
        });
    	
        function cl(){
            location.href = url;
        }
        
        function downLoadTemp() {
            window.location.href = "/download/goods_temp/商品数据导入模板.xlsx";
        }
    </script>
</body>
</html>