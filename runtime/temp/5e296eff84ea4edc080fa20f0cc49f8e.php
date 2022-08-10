<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/www/wwwroot/ywscs.com/public/../application/admin/view/index/index.html";i:1640166871;}*/ ?>
<!--
 * @Descripttion: 总后台框架视图
 * @Copyright: 武汉一一零七科技有限公司©版权所有
 * @Contact: QQ:2487937004
 * @Date: 2020-03-09 17:51:33
 * @LastEditors: cbing
 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>总台管理-<?php echo $webconfig['webtitle']; ?></title>
    <meta name="keywords" content="<?php echo $webconfig['keywords']; ?>">
    <meta name="description" content="<?php echo $webconfig['description']; ?>">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link rel="shortcut icon" href="/static/favicon.ico"> 
	<link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/custom.css?v=1.0.0" rel="stylesheet">
</head>
<body class="fixed-sidebar full-height-layout white-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side parent-nav" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <div class="profile-element p-sm">
                    <img class="img-preview m-t-sm m-b-sm" src="/static/images/logo_white.png" />
                </div>
                <div class="logo-element">总台
                </div>
                <ul class="nav" id="side-menu">
                    <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $k=>$v): ?>
                    <li>
                        <a class="parent-menu-item <?php if($k == '0'): ?>active<?php endif; ?>" href="javascript:;" data-id="<?php echo $k; ?>">
                            <span class="icon"><i class="<?php echo $v['icon']; ?>"></i></span>
                            <span class="nav-label"><?php echo lang($v['pri_name']);?></span></a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </nav>
        <nav class="navbar-default navbar-static-side sub-nav" role="navigation">
            <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $k=>$v): ?>
            <ul class="sub-nav-ul sub-nav-ul-<?php echo $k; ?>">

                <li class="sub-nav-1-title"><?php echo $v['pri_name']; ?></li>
                    <ul class="nav nav-second-level">

                        <?php if(is_array($v['child']) || $v['child'] instanceof \think\Collection || $v['child'] instanceof \think\Paginator): if( count($v['child'])==0 ) : echo "" ;else: foreach($v['child'] as $key=>$v2): if(empty($v2['child']) || (($v2['child'] instanceof \think\Collection || $v2['child'] instanceof \think\Paginator ) && $v2['child']->isEmpty())): ?>
                        <li><a class="J_menuItem sub-nav-2-title" href="<?php echo url($v2['cname'].'/'.$v2['aname']); ?>"><?php echo $v2['pri_name']; ?></a></li>
                        <?php else: ?>
                        <li><span class="sub-nav-2-title"><b><?php echo $v2['pri_name']; ?></b></span></li>
                        <ul class="nav nav-third-level">
                            <?php if(is_array($v2['child']) || $v2['child'] instanceof \think\Collection || $v2['child'] instanceof \think\Paginator): if( count($v2['child'])==0 ) : echo "" ;else: foreach($v2['child'] as $key=>$v3): ?>
                            <li><a class="J_menuItem" href="<?php echo url($v3['cname'].'/'.$v3['aname']); ?>"><?php echo $v3['pri_name']; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
            </ul>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom row-top">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
<!--                         <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-dedent"></i> </a>-->
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="label label-primary"><?php echo $countNum; ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a class="J_menuItem" href="<?php echo url('order/lst','filter=1'); ?>">
                                        <div>
                                            <i class="fa fa-comment fa-fw"></i> 待发货订单
                                            <span class="pull-right text-muted small"><?php echo $deliverOrderNum; ?>个</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="J_menuItem" href="<?php echo url('order/lst','filter=4'); ?>">
                                        <div>
                                            <i class="fa fa-commenting fa-fw"></i> 待付款订单
                                            <span class="pull-right text-muted small"><?php echo $paymentOrderNum; ?>个</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="J_menuItem" href="<?php echo url('th_apply/lst','filter=1'); ?>">
                                        <div>
                                            <i class="fa fa-commenting fa-fw"></i> 售后申请订单
                                            <span class="pull-right text-muted small"><?php echo $thApplyNum; ?>个</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
<!--                        <?php if(($lang_list)): ?>-->
<!--                        <li class="dropdown hidden-xs">-->
<!--                            <a href="javascript:void(0);" class="right-sidebar-toggle" aria-expanded="false">-->
<!--                                <?php echo lang('语言切换'); ?>-->
<!--                            </a>-->
<!--                            <div class="lang-content">-->
<!--                                <?php if(is_array($lang_list) || $lang_list instanceof \think\Collection || $lang_list instanceof \think\Paginator): if( count($lang_list)==0 ) : echo "" ;else: foreach($lang_list as $key=>$v): ?>-->
<!--                                <div onclick="changeLang('<?php echo $v['lang_code']; ?>')">-->
<!--                                    <?php echo $v['lang_name']; ?>-->
<!--                                </div>-->
<!--                                <?php endforeach; endif; else: echo "" ;endif; ?>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <?php endif; ?>-->
                        
                        <li class="dropdown hidden-xs">
                            <a href="<?php echo url('admin/loginOut'); ?>" class="right-sidebar-toggle" aria-expanded="false">
                                 <!--<i class="fa fa-power-off"></i>-->  
                                <i class="fa fa fa-sign-out"></i> <?php echo lang('退出'); ?>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft border-bottom border-top"><i class="fa fa-backward"></i></button>
                <nav class="page-tabs J_menuTabs border-bottom border-top">
                    <div class="page-tabs-content" style="margin-left: 0px;">
                        <a href="javascript:;" class="active J_menuTab" data-id="<?php echo url('dashboard'); ?>">控制台</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight border-bottom border-top"><i class="fa fa-forward"></i></button>
                <div class="btn-group roll-nav roll-right">

                    <button class="dropdown J_tabClose border-bottom border-top" data-toggle="dropdown" aria-expanded="false"><span class="fa fa-close"></span>
                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo url('dashboard'); ?>" frameborder="0" data-id="<?php echo url('dashboard'); ?>" seamless></iframe>
            </div>
            
<!--            <div class="footer">-->
<!--                <div class="text-center"><?php echo lang($webconfig['web_banquan']); ?></div>-->
<!--            </div>-->
        </div>
        <!--右侧部分结束-->
    </div>
    <!-- 全局js -->
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/static/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <!-- 自定义js -->
    <script src="/static/admin/js/hplus.js?v=4.1.0"></script>
    <script type="text/javascript" src="/static/admin/js/contabs.js"></script>
    <!-- 第三方插件 -->
    <script src="/static/admin/js/plugins/pace/pace.min.js"></script>
    
<!--    <script>-->
<!--        function changeLang(lang) {-->
<!--            $.post("<?php echo url('lang/changeLang'); ?>", {lang: lang}, function(data){-->
<!--                window.location.reload();-->
<!--            }, 'json');-->
<!--        }-->
<!--    </script>-->
    <script>
        $('.parent-menu-item').click(function(){
            var sub_id = $(this).data('id')
            $('.sub-nav-ul').hide();
            $('.sub-nav-ul-'+sub_id).show();
            $('.parent-menu-item').removeClass('active');
            $(this).addClass('active');
        })
    </script>
</body>
</html>