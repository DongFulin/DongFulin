<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/ywscs.com/public/../application/admin/view/goods/ajaxpage.html";i:1633589491;}*/ ?>
<!--
 * @Descripttion: 
 * @Copyright: 武汉一一零七科技有限公司©版权所有
 * @Link: www.s1107.com
 * @Contact: QQ:2487937004
 * @LastEditors: cbing
 * @LastEditTime: 2020-05-01 18:40:18
 -->
<script>
	var pnum = <?php echo $pnum; ?>;
	<?php if((isset($filter)) AND ($filter)): ?>
	var filter = <?php echo $filter; ?>;
	<?php endif; if(!isset($search) && !isset($cate_id)): ?>
	var search = 0;
	var cate_id = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/goods/lst/filter/"+filter+".html?page="+pnum;
	<?php elseif(isset($search) && $search): ?>
	var search = <?php echo $search; ?>;
	var cate_id = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/goods/search.html?page="+pnum;
	<?php elseif(isset($cate_id) && $cate_id): ?>
	var cate_id = <?php echo $cate_id; ?>;
	var search = 0;
	var goUrl = "/<?php echo \think\Request::instance()->module(); ?>/goods/catelist/cate_id/"+cate_id+"/filter/"+filter+".html?page="+pnum;
	<?php endif; ?>
</script>                           
                        
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:5%"><input type="checkbox" id="checkAll"/></th>
                                    <th style="width:5%">ID</th>
                                    <th style="width:20%">商品标题</th>
                                    <th style="width:8%">缩略图</th>
                                    <th style="width:10%">所属分类</th>
                                    <th style="width:8%">市场价格</th>
                                    <th style="width:8%">销售价格</th>
                                    <th style="width:5%">上架</th>
                                    <th style="width:5%">是否直播间商品</th>
                                    <th style="width:15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list->isEmpty() == false): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?> 
                                <tr>
                                    <td><input type="checkbox" id="goods_id" class="text_id" name="id[]" value="<?php echo $v['id']; ?>" /></td>
                                    <td><?php echo $v['id']; ?></td>
                                    <td>
                                            <?php if(($v['integral_cate'] == 1)): ?>
                                            <div class="integral-box">
                                                积分商品：积分抵扣金额
                                            </div>
                                            <?php elseif(($v['integral_cate'] == 2)): ?>
                                            <div class="integral-box">
                                                积分商品：积分+商品金额
                                            </div>
                                            <?php elseif(($v['integral_cate'] == 3)): ?>
                                            <div class="integral-box">
                                                积分商品：积分换购
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php echo $v['goods_name']; ?>
                                    </td>   
                                    <td>
                                        <img src="<?php echo $v['thumb_url']; ?>" width="80px" height="80px"/>
                                    </td>                                   
                                    <td><?php echo $v['cate_name']; ?></td>
                                    <td><?php echo $v['market_price']; ?>元</td>
                                    <td><?php echo $v['shop_price']; ?>元</td>
                                    <td>
                                    <?php if($v['onsale'] == 1): ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'onsale',this);"><i class="fa fa-check"></i></button>
                                    <?php elseif($v['onsale'] == 0): ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'onsale',this);"><i class="fa fa-times"></i></button>
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php if($v['is_live'] == 1): ?>
                                    <button class="btn btn-primary btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_live',this);"><i class="fa fa-check"></i></button>
                                    <?php elseif($v['is_live'] == 0): ?>
                                    <button class="btn btn-danger btn-xs" type="button" onclick="changeTableVal(<?php echo $v['id']; ?>,'is_live',this);"><i class="fa fa-times"></i></button>
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" onclick="editgoods(<?php echo $v['id']; ?>,this);"><i class="fa fa-pencil"></i>&nbsp;编辑</button>
                                        <button type="button" class="btn btn-danger btn-xs" onclick="recycle(<?php echo $v['id']; ?>,this);"><i class="fa fa-close"></i>&nbsp;删除</button>
                                    </td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                                <tr><td colspan="9" style="text-align:center; font-size:14px;">没有找到相关数据</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="row"><div class="pagination" style="float:right; margin-right:20px;"><?php echo $page; ?></div></div>