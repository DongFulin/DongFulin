<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/ywscs.com/public/../application/admin/view/index/dashboard.html";i:1639371954;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $webtitle; ?></title>
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>22">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <!-- Morris -->
    <link href="/static/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="/static/admin/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/Highcharts/highcharts.js"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>

</head>


<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-users fa-4x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <h3> 总会员数 </h3>
                        <h2 class="font-bold"><?php echo $memberNum; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="widget style1 red-bg">
                <div class="row">
                    <div class="col-xs-4 text-center">
                        <i class="fa fa-rmb fa-4x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <h3> 总营业额 </h3>
                        <h2 class="font-bold"><?php echo $totalTurnover; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="widget style1 lazur-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-file-text fa-4x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <h3> 总订单数 </h3>
                        <h2 class="font-bold"><?php echo $order_num; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-calendar-check-o fa-4x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <h3> <?php echo $month; ?>月订单数 </h3>
                        <h2 class="font-bold"><?php echo $month_order_num; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-6">
            <div class="ibox float-e-margins well-lg p-sm white-bg">
                <div id="deal_container" style="min-width:600px;height:400px"></div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="ibox float-e-margins well-lg p-sm white-bg">
                <div id="month_container" style="min-width:600px;height:400px"></div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins well-lg p-sm white-bg">
                <div id="container" style="min-width:1200px;height:500px"></div>
            </div>
        </div>
    </div>
</div>

<!-- 全局js -->

<!-- Flot -->
<script src="/static/admin/js/plugins/flot/jquery.flot.js"></script>
<script src="/static/admin/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/static/admin/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="/static/admin/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="/static/admin/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="/static/admin/js/plugins/flot/jquery.flot.symbol.js"></script>

<!-- Peity -->
<script src="/static/admin/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/static/admin/js/demo/peity-demo.js"></script>

<!-- 自定义js -->
<script src="/static/admin/js/content.js?v=1.0.0"></script>


<!-- jQuery UI -->
<script src="/static/admin/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Jvectormap -->
<script src="/static/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/static/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- EayPIE -->
<script src="/static/admin/js/plugins/easypiechart/jquery.easypiechart.js"></script>

<!-- Sparkline -->
<script src="/static/admin/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="/static/admin/js/demo/sparkline-demo.js"></script>

<script>

    $(function () {
        var dealcontainer = Highcharts.chart('deal_container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: "<?php echo $year; ?><?php echo lang('年'); ?><?php echo $month; ?><?php echo lang('月'); ?> <?php echo lang('销售订单份额'); ?>"
            },
            credits:{
                enabled: false
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.2f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            colors: ['#7cb5ec', '#bdbdbd', '#f7a35c', '#f7a35c', '#8085e9',
                '#f15c80', '#e4d354', '#8085e8', '#8d4653', '#91e8e1'],
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: "<?php echo lang('成交率'); ?>",
                    y: <?php echo $deal_lv; ?>,
                    sliced: true,
                    selected: true
                }, {
                    name: "<?php echo lang('待支付率'); ?>",
                    y: <?php echo $dai_lv; ?>
                }, {
                    name: "<?php echo lang('售后率'); ?>",
                    y: <?php echo $shou_lv; ?>
                }]
            }]
        });


        $('#month_container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: "<?php echo $year; ?><?php echo lang('年'); ?><?php echo $month; ?><?php echo lang('月'); ?> <?php echo lang('商品销量统计'); ?>"
            },
            subtitle: {
                text: "<?php echo lang('数据来源'); ?>: <?php echo lang($webconfig['webtitle']); ?>"
            },
            credits:{
                enabled: false
            },
            xAxis: {
                categories: [
                    "<?php echo lang('销售量'); ?>","<?php echo lang('退款量'); ?>","<?php echo lang('换货量'); ?>"
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: "<?php echo lang('统计数量'); ?>"
                }
            },
            tooltip: {
                // head + 每个 point + footer 拼接成完整的 table
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} <?php echo lang('件'); ?></b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    colorByPoint:true,
                    borderWidth: 0
                }
            },
            colors: ['#7cb5ec', '#434348', '#f7a35c', '#f7a35c', '#8085e9',
                '#f15c80', '#e4d354', '#8085e8', '#8d4653', '#91e8e1'],
            series: [{
                name: "<?php echo lang('数量'); ?>",
                data: [<?php echo $month_salenum; ?>, <?php echo $month_tuinum; ?>, <?php echo $month_huannum; ?>]
            }]
        });


        var chart = Highcharts.chart('container',{
            chart: {
                type: 'column'
            },
            title: {
                text: "<?php echo lang('商品年度销量统计'); ?>"
            },
            subtitle: {
                text: "<?php echo lang('数据来源'); ?>: <?php echo lang($webconfig['webtitle']); ?>"
            },
            credits:{
                enabled: false
            },
            xAxis: {
                categories: [
                    "<?php echo lang('一月'); ?>","<?php echo lang('二月'); ?>","<?php echo lang('三月'); ?>","<?php echo lang('四月'); ?>","<?php echo lang('五月'); ?>","<?php echo lang('六月'); ?>","<?php echo lang('七月'); ?>","<?php echo lang('八月'); ?>","<?php echo lang('九月'); ?>","<?php echo lang('十月'); ?>","<?php echo lang('十一月'); ?>","<?php echo lang('十二月'); ?>"
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: "<?php echo lang('统计数量'); ?>"
                }
            },
            tooltip: {
                // head + 每个 point + footer 拼接成完整的 table
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} <?php echo lang('件'); ?></b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    borderWidth: 0
                }
            },
            colors: ['#7cb5ec', '#434348', '#f7a35c', '#f7a35c', '#8085e9',
                '#f15c80', '#e4d354', '#8085e8', '#8d4653', '#91e8e1'],
            series: [{
                name: "<?php echo lang('销售量'); ?>",
                data: [<?php echo $monthSalenumStr; ?>]
            }, {
                name: "<?php echo lang('退款量'); ?>",
                data: [<?php echo $monthTuinumStr; ?>]
            }, {
                name: "<?php echo lang('换货量'); ?>",
                data: [<?php echo $monthHuannumStr; ?>]
            }]
        });


        // var walletcontainer = Highcharts.chart('wallet_container', {
        // 	chart: {
        // 		type: 'line'
        // 	},
        // 	title: {
        // 		text: '平台年度收入支出统计'
        // 	},
        // 	subtitle: {
        // 		text: '数据来源: wosmart电商平台'
        // 	},
        // 	credits:{
        // 	    enabled: false
        // 	},
        // 	xAxis: {
        // 		categories: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月']
        // 	},
        // 	yAxis: {
        // 		title: {
        // 			text: '统计金额'
        // 		}
        // 	},
        // 	plotOptions: {
        // 		line: {
        // 			dataLabels: {
        // 				// 开启数据标签
        // 				enabled: true
        // 			},
        // 			// 关闭鼠标跟踪，对应的提示框、点击事件会失效
        // 			enableMouseTracking: false
        // 		}
        // 	},
        // 	series: [{
        // 		name: '收入',
        // 		data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        // 	}, {
        // 		name: '支出',
        // 		data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        // 	}]
        // });


    });



</script>


</body>

</html>
