<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/www/wwwroot/ywscs.com/public/../application/admin/view/news/edit.html";i:1618769683;}*/ ?>
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
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/admin/Huploadify/Huploadify.css"/>
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/datepicker.css" rel="stylesheet">
    <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.all.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/static/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>

<script>
var pnum = <?php echo $pnum; ?>;
<?php if((!isset($search)) && (!isset($cate_id))): ?>
	var url = "/<?php echo \think\Request::instance()->module(); ?>/news/lst.html?page="+pnum;
<?php elseif((isset($search)) && ($search)): ?>
	var url = "/<?php echo \think\Request::instance()->module(); ?>/news/search.html?page="+pnum;
<?php elseif((isset($cate_id)) && ($cate_id)): ?>
    var cate_id = <?php echo $cate_id; ?>;
	var url = "/<?php echo \think\Request::instance()->module(); ?>/news/catelist/cate_id/"+cate_id+".html?page="+pnum;
<?php endif; ?>
var updateUrl = "<?php echo url('news/edit'); ?>";
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
                        <h5>编辑文章</h5>
                    </div>
                    <div class="ibox-content">
                    <form method="post" enctype="multipart/form-data" class="form-horizontal" id="form"> 
                    
                          <div class="form-group">
                                <label class="col-sm-2 control-label">所属栏目</label>
                                <div class="col-sm-6">
                                    <select class="form-control m-b" name="cate_id">
                                        <?php if(is_array($cateres) || $cateres instanceof \think\Collection || $cateres instanceof \think\Paginator): if( count($cateres)==0 ) : echo "" ;else: foreach($cateres as $key=>$v): ?>
                                        <option value="<?php echo $v['id']; ?>" <?php if($v['pid'] == '0'): ?>style="font-weight:bold;"<?php endif; if($v['id'] == $ars['cate_id']): ?>selected = "selected"<?php endif; ?>><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $v['level']); if($v['level'] > '0'): ?>|<?php endif; ?><?php echo $v['html']; ?><?php echo $v['cate_name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div> 
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">文章标题</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ar_title" value="<?php echo $ars['ar_title']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">标识</label>
                                <div class="col-sm-6">
                                    <input type="text" name="tag" value="<?php echo $ars['tag']; ?>" placeholder="用于前端接口调用" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">作者</label>
                                <div class="col-sm-6">
                                    <input type="text" name="author" value="<?php echo $ars['author']; ?>" class="form-control">
                                </div>
                            </div>						
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">出处</label>
                                <div class="col-sm-6">
                                    <input type="text" name="source" value="<?php echo $ars['source']; ?>" class="form-control">
                                </div>
                            </div>						
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">发布日期</label>
                                <div class="col-sm-6">
                                    <input type="text" name="addtime" onClick="new Calendar().show(this);" readonly="readonly" value="<?php echo date('Y-m-d',$ars['addtime']); ?>" class="form-control">
                                </div>
                            </div>						
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">排序</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sort" value="<?php echo $ars['sort']; ?>" class="form-control">
                                </div>
                            </div>						
                            <div class="hr-line-dashed"></div>
                                             
                            <div class="form-group">
							<label  class="col-sm-2 control-label">文章缩略图:</label>
							<div class="col-sm-6">
                            <div style="margin-bottom:7px; margin-top:5px;">
                            <img id="image" <?php if($ars['ar_pic']): ?>src="/<?php echo $ars['ar_pic']; ?>"<?php else: ?>src="/static/admin/img/nopic.jpg"<?php endif; ?> width="180" height="120" border="0" />
                            <br/><button type="button" class="btn btn-danger btn-xs del" style="display:none;">删除</button>
                            </div>
                            <div id="uploaderInput"></div>
                            <input type="hidden" name="pic_id" value="" >
                            <div class="repicm" style="display:none;"><?php echo $ars['ar_pic']; ?></div>
                            </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">seo标题</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ar_name" value="<?php echo $ars['ar_name']; ?>" class="form-control">
                                </div>
                            </div>						
                            <div class="hr-line-dashed"></div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">seo关键字</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ar_keywords" value="<?php echo $ars['ar_keywords']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div> 
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">seo描述</label>
                                <div class="col-sm-6">
                                    <textarea id="ar_desc" name="ar_desc" class="form-control"><?php echo $ars['ar_desc']; ?></textarea>
                                </div> 
                            </div>
                            <div class="hr-line-dashed"></div>                        
                      
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">内容简述</label>
                                <div class="col-sm-6">
                                    <textarea id="ar_jianjie" name="ar_jianjie" class="form-control"><?php echo $ars['ar_jianjie']; ?></textarea>
                                </div> 
                            </div>
                            <div class="hr-line-dashed"></div> 
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否推荐</label>
                                <div class="col-sm-6" id="atype">
                                        <label class="radio-inline"><input type="radio" <?php if($ars['is_rem'] == 1): ?>checked="checked"<?php endif; ?> value="1" name="is_rem">推荐</label>
                                        <label class="radio-inline"><input type="radio" <?php if($ars['is_rem'] == 0): ?>checked="checked"<?php endif; ?> value="0" name="is_rem">不推荐</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否显示</label>
                                <div class="col-sm-6" id="atype">
                                        <label class="radio-inline"><input type="radio" <?php if($ars['is_show'] == 1): ?>checked="checked"<?php endif; ?> value="1" name="is_show">显示</label>
                                        <label class="radio-inline"><input type="radio" <?php if($ars['is_show'] == 0): ?>checked="checked"<?php endif; ?> value="0" name="is_show">不显示</label>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">文章正文</label>
                                <div class="col-sm-10">
                                    <textarea id="ar_content" name="ar_content"><?php echo $ars['ar_content']; ?></textarea>
                                </div>  
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <input type="hidden" name="id" value="<?php echo $ars['id']; ?>" />

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" id="doSubmit">保存内容</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- 全局js -->
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/Calendar.js"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- 自定义js -->
    <script type="text/javascript" src="/static/admin/Huploadify/jquery.Huploadify.js"></script>  
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>	
    <script src="/static/admin/js/content.js?v=1.0.0"></script>
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>
    
    <script type="text/javascript">
		//实例化编辑器
		//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
		UE.getEditor('ar_content', {initialFrameWidth:'100%', initialFrameHeight:500, enterTag:''}); 
	</script>

	 <script>	
    	$(function(){
    		//上传图片
	        $('#uploaderInput').Huploadify({
	            uploader : '<?php echo url("news/uploadify"); ?>',
		        method:'post',
		        formData:null,//发送给服务端的参数，格式：{key1:value1,key2:value2}
		        buttonText : '上传图像', 
		        removeTimeout: 2000,
		        fileTypeDesc:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;',  
		        fileTypeExts:'*.jpg;*.jpeg;*.gif;*.png;*.JPG;*.JPEG;*.GIF;*.PNG;', 
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
		        		var picpath = data.path;
	    	        	$('#imageinfo').attr('src','/'+picpath.img_url);
	    	        	$('.del').show();
	    	        	$('input[name=pic_id]').val(picpath.pic_id);
		        	}else{
		        		layer.msg(data.msg, {icon: 2,time: 2000});
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
    			layer.load(2);
    			$.ajax({
    				url:'<?php echo url("news/delfile"); ?>',
    				type:'POST',
    				data:{'zspic_id':$('input[name=pic_id]').val()},
    				dataType:'json',
    				success:function(data){
    					if(data == 1){  
    						layer.closeAll('loading');
    						$('input[name=pic_id]').val('');
    						var picval = $('.repicm').text();
    						if(picval != ''){
        						$('#image').attr('src','/'+picval);
    						}else{
    							$('#image').attr('src','/static/admin/img/nopic.jpg');
    						}
    						$('.del').hide();
    					}else{
    						layer.closeAll('loading');
    						layer.msg('删除临时图片失败', {icon: 2,time: 1000});
    					}
    				},
    		        error:function(){
    		        	layer.closeAll('loading');
    		        	layer.msg('操作失败，请重试', {icon: 2,time: 2000});
    		        }
    			});
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
	        		ar_title:{required:true},
	        		author:{required:true},
	        		source:{required:true},
	        		cate_id:{required:true},
	        		sort:{required:true},
	        		ar_content:{required:true}
	        	},
	        		
	        	messages:{
	        		ar_title:{required:icon+'必填'},
	        		author:{required:icon+'必填'},
	        		source:{required:icon+'必填'},
	        		cate_id:{required:icon+'必选'},
	        		sort:{required:icon+'必填'},
	        		ar_content:{required:icon+'内容必填'}
	        	}
            });
      });  
    	
      function cl(){
      	 location.href = url;
      }
    </script>

</body>
</html>