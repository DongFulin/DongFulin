<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"/www/wwwroot/ywscs.com/public/../application/admin/view/ad/edit.html";i:1645689132;}*/ ?>
<!--
 * @Descripttion: 
 * @Author: cbing
 * @Date: 2019-06-17 10:12:00
 * @LastEditors: cbing
 * @LastEditTime: 2019-09-05 10:05:17
 -->
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
    <link rel="stylesheet" type="text/css" href="/static/admin/Huploadify/Huploadify.css"/>
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
</head>

<script>
var pnum = <?php echo $pnum; ?>;
<?php if((!isset($search)) AND (!isset($cate_id))): ?>
	var url = "/<?php echo \think\Request::instance()->module(); ?>/ad/lst.html?page="+pnum;
<?php elseif((isset($search)) AND ($search)): ?>
	var url = "/<?php echo \think\Request::instance()->module(); ?>/ad/search.html?page="+pnum;
<?php elseif((isset($cate_id)) AND ($cate_id)): ?>
    var cate_id = <?php echo $cate_id; ?>;
	var url = "/<?php echo \think\Request::instance()->module(); ?>/ad/poslist/cate_id/"+cate_id+".html?page="+pnum;
<?php endif; ?>
var updateUrl = "<?php echo url('ad/edit'); ?>";
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
                        <h5>编辑广告</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" id="form">
                                                                              
                            <div class="form-group">
                                <label class="col-sm-2 control-label">广告名称：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ad_name" value="<?php echo $ads['ad_name']; ?>" class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>						
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">广告位置：</label>

                                <div class="col-sm-6">
                                    <select class="form-control m-b" name="cate_id">
                                        <option value="">请选择</option>
                                        <?php if(is_array($adCateList) || $adCateList instanceof \think\Collection || $adCateList instanceof \think\Paginator): if( count($adCateList)==0 ) : echo "" ;else: foreach($adCateList as $key=>$v): ?>
                                        <option value="<?php echo $v['id']; ?>" <?php if($ads['cate_id'] == $v['id']): ?>selected = "selected"<?php endif; ?>><?php echo $v['cate_name']; ?>&nbsp;&nbsp;<?php echo $v['width']; ?>*<?php echo $v['height']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
							<label  class="col-sm-2 control-label">广告图片:</label>
							<div class="col-sm-6">
                            <div style="margin-bottom:7px; margin-top:5px;">
                            <img id="imageinfo" <?php if($ads['ad_pic']): ?>src="<?php echo $ads['ad_pic']; ?>"<?php else: ?>src="/static/admin/img/nopic.jpg"<?php endif; ?> width="180" height="120" border="0" />
                            <br/><button type="button" class="btn btn-danger btn-xs del" style="display:none;">删除</button>
                            </div>
                            <div id="uploaderInput"></div>
                            <input type="hidden" name="ad_pic" value="<?php echo $ads['ad_pic']; ?>" >
                            <div class="repicm" style="display:none;"><?php echo $ads['ad_pic']; ?></div>
                            </div>
                            </div>
                            <div class="hr-line-dashed"></div> 
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">链接：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ad_url" value="<?php echo $ads['ad_url']; ?>" class="form-control">
                                </div>
                            </div>		
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-6" style="color:#F00;">

                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">排序：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sort" value="<?php echo $ads['sort']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否开启：</label>
                                <div class="col-sm-6">
                                        <label class="radio-inline"><input type="radio" name="is_on" <?php if($ads['is_on'] == 1): ?>checked="checked"<?php endif; ?> value="1">是</label>
                                        <label class="radio-inline"><input type="radio" name="is_on" <?php if($ads['is_on'] == 0): ?>checked="checked"<?php endif; ?> value="0">否</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <input type="hidden" name="id" value="<?php echo $ads['id']; ?>">                                                                

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" id="doSubmit" style="margin-right:20px;">保存内容</button>
                                    <button type="reset" class="btn btn-default">重置</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- 全局js -->
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- 自定义js -->
    <script type="text/javascript" src="/static/admin/Huploadify/jquery.Huploadify.js"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>	
    <script src="/static/admin/js/content.js?v=1.0.0"></script>
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>

	 <script>	
	 var ad_id = <?php echo $ads['id']; ?>;
	 
    	$(function(){  		
    		
    		//上传缩略图
	        $('#uploaderInput').Huploadify({
	            uploader : '<?php echo url("Common/Upload/uploadPic"); ?>',
		        method:'post',
		        formData:{name:'ad'},//发送给服务端的参数，格式：{key1:value1,key2:value2}
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
		        	//解析成json对象
		        	eval('var data='+data);
		        	if(data.status == 200){
		        		var picpath = data.data.path;
	    	        	$('#imageinfo').attr('src', picpath);
	    	        	$('.del').show();
	    	        	$('input[name=ad_pic]').val(picpath);
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
                $('input[name=ad_pic]').val('');
                var picval = $('.repicm').text();
                if(picval != ''){
                    $('#imageinfo').attr('src', picval);
                }else{
                    $('#imageinfo').attr('src','/static/admin/img/nopic.jpg');
                }
                $('.del').hide();
    		});
    		

            
    	    var icon = "<i class='fa fa-times-circle'></i>&nbsp;&nbsp;";
        	$('#form').validate({
	        	errorElement : 'span',
	        	debug: true,//只验证不提交表单
	        	//layer ajax提交表单
	            submitHandler:function(){
	                // 序列化 表单数据 后提交 ，太简洁了
	                post(updateUrl,'POST',$('#form').serialize(),1);
	                return false;
	            },//这是关键的语句，配置这个参数后表单不会自动提交，验证通过之后会去调用的方法
	                
	        	rules:{
	        		ad_name:{required:true},
	        		cate_id:{required:true}
	        	},
	        		
	        	messages:{
	        		ad_name:{required:icon+'必填'},
	        		cate_id:{required:icon+'必选'},
	        	}
            });
      });
    	
      function cl(){
      	 parent.location.href = url;
      }
    </script>

</body>
</html>