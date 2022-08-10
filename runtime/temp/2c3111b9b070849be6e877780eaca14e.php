<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/ywscs.com/public/../application/admin/view/shops_info/info.html";i:1645834363;}*/ ?>
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
</head>

<script>
var url = "<?php echo url('shops_info/info'); ?>";
var infoUrl = "<?php echo url('shops_info/info'); ?>";
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
                        <h5>自营店铺基本信息</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" enctype="multipart/form-data" class="form-horizontal" id="form"> 
                           <div class="form-group">
                                <label class="col-sm-2 control-label">店铺名称：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="shop_name" value="<?php echo $shops['shop_name']; ?>" class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                           </div>
                           <div class="hr-line-dashed"></div> 
                            
                           <div class="form-group">
                           <label class="col-sm-2 control-label">店铺描述：</label>
                                <div class="col-sm-6">
                                    <textarea name="shop_desc" class="form-control"><?php echo $shops['shop_desc']; ?></textarea>
                                </div>  
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                           </div>
                           <div class="hr-line-dashed"></div>
                           
                            <div class="form-group">
                                <label class="col-sm-2 control-label">搜索关键字：</label>
                                <div class="col-sm-6">
                                    <textarea name="search_keywords" class="form-control"><?php echo $shops['search_keywords']; ?></textarea>
                                </div>  
                                <label class="col-sm-2" style="padding-top:7px; color:#333; font-size:12px;">(多个以英文,号隔开)</label>
                            </div>
                            <div class="hr-line-dashed"></div>                      							                                                                                                 

                            <div class="form-group">
                                <label class="col-sm-2 control-label">联系人：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="contacts" value="<?php echo $shops['contacts']; ?>" class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">手机号：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="telephone" value="<?php echo $shops['telephone']; ?>" class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>  
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">微信号：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="wxnum" value="<?php echo $shops['wxnum']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">QQ号：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="qqnum" value="<?php echo $shops['qqnum']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div> 
                            
                            <div class="form-group">
							<label  class="col-sm-2 control-label">logo图:</label>
							<div class="col-sm-6">
                            <div style="margin-bottom:7px; margin-top:5px;">
                            <img id="imageinfo" <?php if($shops['logo']): ?>src="<?php echo $shops['logo']; ?>"<?php else: ?>src="/static/admin/img/nopic.jpg"<?php endif; ?> width="100" height="100" border="0" />
                            <br/><button type="button" class="btn btn-danger btn-xs del" style="display:none;">删除</button>
                            </div>
                            <div id="uploaderInput"></div>
                            <input type="hidden" name="pic_id" value="" >
                            <div class="repicm" style="display:none;"><?php echo $shops['logo']; ?></div>
                            </div>
                            </div>
                            <div class="hr-line-dashed"></div> 
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">营业时间：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sertime" value="<?php echo $shops['sertime']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">运费：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="freight" value="<?php echo $shops['freight']; ?>" class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">满减金额：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="reduce" value="<?php echo $shops['reduce']; ?>" class="form-control">
                                </div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
	                        <div class="form-group">
	                            <label class="col-sm-2 control-label">店铺省.市.区/县:</label>
	                            <div class="col-sm-2">
	                                <select class="form-control m-b" name="pro_id">
	                                    <?php if(is_array($prores) || $prores instanceof \think\Collection || $prores instanceof \think\Paginator): if( count($prores)==0 ) : echo "" ;else: foreach($prores as $key=>$v): ?>
	                                    <option <?php if($shops['pro_id'] == $v['id']): ?>selected="selected"<?php endif; ?> value="<?php echo $v['id']; ?>"}><?php echo $v['zm']; ?>.<?php echo $v['pro_name']; ?></option>
	                                    <?php endforeach; endif; else: echo "" ;endif; ?>
	                                </select>
	                            </div>
	                            <div class="col-sm-2">
	                                <select class="form-control m-b" name="city_id" id="cityname">
		                                <?php if(is_array($cityres) || $cityres instanceof \think\Collection || $cityres instanceof \think\Paginator): if( count($cityres)==0 ) : echo "" ;else: foreach($cityres as $key=>$v): ?>
		                                <option <?php if($shops['city_id'] == $v['id']): ?>selected="selected"<?php endif; ?> value="<?php echo $v['id']; ?>"><?php echo $v['zm']; ?>.<?php echo $v['city_name']; ?></option>
		                                <?php endforeach; endif; else: echo "" ;endif; ?>
	                                </select>
	                            </div>
	                            <div class="col-sm-2">
	                                <select class="form-control m-b" name="area_id" id="areaname">
	                                    <?php if(is_array($areares) || $areares instanceof \think\Collection || $areares instanceof \think\Paginator): if( count($areares)==0 ) : echo "" ;else: foreach($areares as $key=>$v): ?>
		                                <option <?php if($shops['area_id'] == $v['id']): ?>selected="selected"<?php endif; ?> value="<?php echo $v['id']; ?>"><?php echo $v['zm']; ?>.<?php echo $v['area_name']; ?></option>
		                                <?php endforeach; endif; else: echo "" ;endif; ?>
	                                </select>
	                            </div>
	                            <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
	                        </div>
	                        <div class="hr-line-dashed"></div>
	                        
	                       <div class="form-group">
                           <label class="col-sm-2 control-label">详细地址：</label>
                                <div class="col-sm-6">
                                    <textarea name="address" class="form-control"><?php echo $shops['address']; ?></textarea>
                                </div>  
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                           </div>
                           <div class="hr-line-dashed"></div>  
                           
                           <div class="form-group">
                                <label class="col-sm-2 control-label">店铺所在位置：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="latlon" value="<?php echo $shops['lng']; ?>,<?php echo $shops['lat']; ?>" class="form-control">
                                </div>
                                <div class="col-sm-1"><button class="btn btn-info" type="button" id="zbxz">打开坐标选择器</button></div>
                                <label class="col-sm-1" style="padding-top:7px; color:#F00; font-size:16px;">*</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                                              
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否开启商品分销：</label>
                                <div class="col-sm-6">
                                        <label class="radio-inline"><input type="radio" name="fenxiao" <?php if($shops['fenxiao'] == 1): ?>checked="checked"<?php endif; ?> value="1">开启</label>
                                        <label class="radio-inline"><input type="radio" name="fenxiao" <?php if($shops['fenxiao'] == 0): ?>checked="checked"<?php endif; ?> value="0">关闭</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">绑定主播用户ID：</label>
                                <div class="col-sm-6">
                                    <input type="text" name="bind_user_id" value="<?php echo $bind_user_id; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
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
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- 自定义js -->
    <script type="text/javascript" src="/static/admin/Huploadify/jquery.Huploadify.js"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>	
    <!-- iCheck -->
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/common/ajax.js"></script>      

	<script>
    	$(function(){
    		$('#zbxz').click(function(){
    			var zbUrl = "//api.map.baidu.com/lbsapi/getpoint/index.html";
    			layer.open({
    				type : 2,
    				title : '选择坐标',
    				shadeClose : true,
    				shade : 0.5,
    				area : ['1000px','650px'],
    				content : zbUrl
    			});
    		});
    		
    		//上传图片
	        $('#uploaderInput').Huploadify({
	            uploader : '<?php echo url("Common/Upload/uploadPic"); ?>',
		        method:'post',
		        formData: {name:'shop_logo'},//发送给服务端的参数，格式：{key1:value1,key2:value2}
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
	    	        	$('#imageinfo').attr('src',picpath);
	    	        	$('.del').show();
	    	        	$('input[name=pic_id]').val(picpath);
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
                $('input[name=pic_id]').val('');
                var picval = $('.repicm').text();
                if(picval != ''){
                    $('#imageinfo').attr('src',picval);
                }else{
                    $('#imageinfo').attr('src','/static/admin/img/nopic.jpg');
                }
                $('.del').hide();
    		});
        	
            $('select[name=pro_id]').change(function(){
            	var pro_id = $(this).val();
            	if(pro_id != '' && pro_id != 0){
            		$.ajax({
         			   url:"<?php echo url('shops_info/getcitylist'); ?>",
         			   type:'POST',
         			   data:{'pro_id':pro_id},
         		       dataType:'json',
         			   success:function(data){
         				   if(data){
                         	  var html = '';
                         	  var html='<option value="">--选择市--</option>';
                              $.each(data,function(i,v){
                             	 html+='<option value="'+v.id+'">'+v.zm+'.'+v.city_name+'</option>';
                              });
                          	  $('#cityname').html(html);
                          	  var html2='<option value="">--选择区/县--</option>';
                          	  $('#areaname').html(html2);
         				   }else{
         					  var html='<option value="">--选择市--</option>';
         					  var html2='<option value="">--选择区/县--</option>';
         					  $('#cityname').html(html);
         					  $('#areaname').html(html2);
         				   }
         			   }
         		    });
            	}else{
    				var html='<option value="">--选择市--</option>';
    		        var html2='<option value="">--选择区/县--</option>';
    			    $('#cityname').html(html);
    			    $('#areaname').html(html2);
            	}
            });            
            
            $('select[name=city_id]').change(function(){
            	var city_id = $(this).val();
            	if(city_id != '' && city_id != 0){
            		$.ajax({
         			   url:"<?php echo url('shops_info/getarealist'); ?>",
         			   type:'POST',
         			   data:{'city_id':city_id},
         		       dataType:'json',
         			   success:function(data){
         				   if(data){
                         	    var html = '';
                         	    var html='<option value="">--选择区/县--</option>';
                                $.each(data,function(i,v){
                             	   html+='<option value="'+v.id+'">'+v.zm+'.'+v.area_name+'</option>';
                                });
                          	   $('#areaname').html(html);
         				   }else{
         					   var html='<option value="">--选择区/县--</option>';
         					   $('#areaname').html(html);
         				   }
         			   }
         		    });
            	}else{
            		var html='<option value="">--选择区/县--</option>';
    				$('#areaname').html(html);
            	}
            });
            
    		//手机号验证
        	jQuery.validator.addMethod("phone", function(value, element){   
        	    var tel = /^1[3456789]\d{9}$/;
        	    return this.optional(element) || (tel.test(value));
        	}, "手机格式不正确");
                                    
    	    var icon = "<i class='fa fa-times-circle'></i>&nbsp;&nbsp;";
        	$('#form').validate({
	        	errorElement : 'span',
	        	debug: true,//只验证不提交表单
	        	//layer ajax提交表单
	            submitHandler:function(){
	               // 序列化 表单数据 后提交 ，太简洁了
	            	post(infoUrl,'POST',$('#form').serialize(),1);
	                return false;
	            },//这是关键的语句，配置这个参数后表单不会自动提交，验证通过之后会去调用的方法
	                
	        	rules:{
	        		shop_name:{required:true},
	        		contacts:{required:true},
	        		telephone:{
		        		required:true,
		        		phone:true
		        	},
		        	search_keywords:{required:true},
		        	freight:{required:true},
		        	reduce:{required:true},
	        		pro_id:{
	        			required:true,
	        			digits:true
	        		},
	        		city_id:{
	        			required:true,
	        			digits:true
	        		},
	        		area_id:{
	        			required:true,
	        			digits:true
	        		},
		        	address:{required:true},
		        	latlon:{required:true}
	        	},
	        		
	        	messages:{
	        		shop_name:{required:icon+'必填'},
	        		contacts:{required:icon+'必填'},
	        		telephone:{
	        			required:icon+'必填',
	        			phone:icon+'手机号格式不正确'
	        		},
	        		search_keywords:{required:icon+'必填'},
	        		freight:{required:icon+'必填'},
	        		reduce:{required:icon+'必填'},
	        		pro_id:{
	        			required:icon+'必选',
	        			digits:icon+'省份id必须是整数'
	        		},
	        		city_id:{
	        			required:icon+'必选',
	        			digits:icon+'城市id必须是整数'
	        		},
	        		area_id:{
	        			required:icon+'必选',
	        			digits:icon+'区县id必须是整数'
	        		},
	        		address:{required:icon+'必填'},
	        		latlon:{required:icon+'必填'}
	        	}
        	});
      });
    	
	  function cl(){
	     location.href = url;
	  }	  
    </script>
        

</body>
</html>
