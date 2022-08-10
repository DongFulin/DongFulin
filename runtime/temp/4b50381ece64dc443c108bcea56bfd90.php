<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/ywscs.com/public/../application/admin/view/config/config.html";i:1645689132;}*/ ?>
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
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="/static/admin/Huploadify/Huploadify.css"/>
</head>

<script>
var addUrl = "<?php echo url('config/config'); ?>";
</script>

<body class="gray-bg">
<style>
input.error{
	border:1px solid red;
}
span.error{
	padding-top:10px;
	color: #f00;
	font-size:12px;
}
</style>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                       <h5>系统配置</h5>
                    </div>
                    <div class="ibox-content">
                    <div class="tabs-container">
                    <ul class="nav nav-tabs">
                    <?php if(is_array($cationres) || $cationres instanceof \think\Collection || $cationres instanceof \think\Paginator): if( count($cationres)==0 ) : echo "" ;else: foreach($cationres as $k=>$v): ?>
                        <li <?php if($k == 0): ?>class="active"<?php endif; ?>><a data-toggle="tab" href="#tab-<?php echo $k+1; ?>" <?php if($k == 0): ?>aria-expanded="true"<?php else: ?>aria-expanded="false"<?php endif; ?>><?php echo $v['ca_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div class="tab-content">
                    <?php if(is_array($cationres) || $cationres instanceof \think\Collection || $cationres instanceof \think\Paginator): if( count($cationres)==0 ) : echo "" ;else: foreach($cationres as $k=>$v): ?>
                    <div id="tab-<?php echo $k+1; ?>" <?php if($k == 0): ?>class="tab-pane active"<?php else: ?>class="tab-pane"<?php endif; ?>>
                    <div class="panel-body">
                        <form method="post" class="form-horizontal" id="form<?php echo $k+1; ?>"> 
                        <?php if(is_array($v['configres']) || $v['configres'] instanceof \think\Collection || $v['configres'] instanceof \think\Paginator): if( count($v['configres'])==0 ) : echo "" ;else: foreach($v['configres'] as $key=>$val): ?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><?php echo $val['cname']; ?>：</label>
                                <div class="col-sm-6">
                                    <?php switch($val['type']): case "0": ?>
                                    <input type="text" name="<?php echo $val['ename']; ?>" value="<?php echo $val['value']; ?>" class="form-control">
                                    <?php break; case "1": ?>
                                    <textarea name="<?php echo $val['ename']; ?>" class="form-control"><?php echo $val['value']; ?></textarea>
                                    <?php break; case "2": $values = explode(',',$val['values']); foreach($values as $v2): ?>
                                    <label class="radio-inline">
                                        <input type="radio" name="<?php echo $val['ename']; ?>" 
                                        <?php $value = explode(':',$v2); if($val['value'] == $value[0]): ?>checked="checked"<?php endif; ?> value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></label>
                                    <?php endforeach; break; case "3": $values = explode(',',$val['values']); foreach($values as $v2): ?>
                                    <input type="checkbox" name="<?php echo $val['ename']; ?>" <?php if($val['value'] == $v2): ?>checked="checked"<?php endif; ?> value="<?php echo $v2 ?>"><?php echo $v2; ?>&nbsp;&nbsp;&nbsp;
                                    <?php endforeach; break; case "4": ?>
                                    <select class="form-control m-b" name="<?php echo $val['ename']; ?>">
                                    <?php $values = explode(',',$val['values']); foreach($values as $v2): ?>
                                         <option value="<?php echo $v2 ?>" <?php if($val['value'] == $v2): ?>selected="selected"<?php endif; ?>><?php echo $v2; ?></option> 
                                    <?php endforeach; ?>                                                                                                                    
                                    </select>
                                    <?php break; case "5": ?>
									
									<div style="margin-bottom:7px; margin-top:5px;">
									<img id="imageinfo" <?php if($val['value']): ?>src="<?php echo $val['value']; ?>"<?php endif; ?> width="180" height="" border="0" onerror="this.src='/static/admin/img/nopic.jpg'"/>
									<br/><button type="button" class="btn btn-danger btn-xs del" style="display:none;">删除</button>
									</div>
									<div id="uploaderInput"></div>
									<input type="hidden" name="<?php echo $val['ename']; ?>" id="pic" value="<?php echo $val['value']; ?>" >
									<?php break; endswitch; ?>                                
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>  
                        
                        <input type="hidden" name="ca_id" value="<?php echo $v['id']; ?>"/>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="button" id="doSubmit<?php echo $k+1; ?>" style="margin-right:100px;">保存内容</button>
                                    <button type="reset" class="btn btn-default">重置</button>
                                </div>
                            </div>
                        </form>
                        </div>
                        </div>
                 <?php endforeach; endif; else: echo "" ;endif; ?>
                        
                 </div>
                </div>                
                </div>
                        
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 全局js -->
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- 自定义js -->
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>	
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>    
	
	<!-- 上传图片js --> 
	<script type="text/javascript" src="/static/admin/Huploadify/jquery.Huploadify.js"></script>
    
	<script>
    	$(function(){ 	                                    
            <?php if(is_array($cationres) || $cationres instanceof \think\Collection || $cationres instanceof \think\Paginator): if( count($cationres)==0 ) : echo "" ;else: foreach($cationres as $k=>$v): ?>
        	$('#doSubmit<?php echo $k+1; ?>').click(function(){
            	post(addUrl,'POST',$('#form<?php echo $k+1; ?>').serialize(),1);
                return false;
        	});
        	<?php endforeach; endif; else: echo "" ;endif; ?>
      });    

	  function cl(){
	     location.reload();
	  }
	  
        $(function(){
            //上传图片
            $('#uploaderInput').Huploadify({
                uploader : '<?php echo url("Common/Upload/uploadPic"); ?>',
                method:'post',
                formData: {name:'config'},//发送给服务端的参数，格式：{key1:value1,key2:value2}
                buttonText : '上传图像', 
                removeTimeout: 2000,
                fileTypeDesc:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;',  
                fileTypeExts:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;', 
                fileObjName: 'file', //上传附件$_FILE标识
                fileSizeLimit : 2048,
                //showUploadedPercent:false,//是否实时显示上传的百分比，如20%
                auto : true, //开启,自动上传
                multi : false, //开启,多选文件
                //开始上传
                onUploadStart:function(file){
                        layer.load(2);
                },
                onUploadSuccess : function(file, data, response) {
                    eval('var data='+data);
                    //解析成json对象
                    if(data.status == 200){
                        var picpath = data.data.path;
                        $('#imageinfo').attr('src', picpath);
                        //$('.del').show();
                        $('#pic').val(picpath);
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
	  	
			$('.del').click(function(){
                $('#pic').val('');
                $('#imageinfo').attr('src','/static/admin/img/nopic.jpg');
                $('.del').hide();
			});
		})
		
	  
    </script>

</body>
</html>