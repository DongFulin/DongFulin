<?php

namespace app\api\controller;
use app\api\controller\Common;
use app\api\model\Video as VideoModel;
use app\api\model\VideoLike as VideoLikeModel;
use app\api\model\VideoComment as VideoCommentModel;

class Video extends Common {
    
    public function getVideoList() {
	    $tokenRes = $this->checkToken(0);
	    if ($tokenRes['status'] == 400) {
		    datamsg(400, $tokenRes['mess'], $tokenRes['data']);
	    }
        $page = input('post.page', 1);
        if (!preg_match("/^\\+?[1-9][0-9]*$/", $page)) {
            datamsg(400, 'page参数错误');
        }
        
        $webconfig = $this->webconfig;
        $pageSize = $webconfig['app_goodlst_num'];
        $offset = ($page - 1) * $pageSize;
        
        $videoModel = new VideoModel();
        $videoList = $videoModel->getVideoList($offset, $pageSize);
        foreach ($videoList as $key => $v) {
            $videoList[$key]['cover_img'] = url_format($v['cover_img'],$webconfig['weburl'],'?imageMogr2/thumbnail/x350');
            $videoList[$key]['video_url'] = url_format($v['video_path'],$webconfig['weburl']);
            $videoList[$key]['goods_img'] = url_format($v['goods_img'],$webconfig['weburl'],'?imageMogr2/thumbnail/150x150');
            $videoList[$key]['shop_logo'] = url_format($v['shop_logo'],$webconfig['weburl'],'?imageMogr2/thumbnail/150x150');
            $videoList[$key]['state'] = 'pause';
            unset($v['video_path']);
            unset($v['status']);
        }
        $data = array(
            'video_list' => $videoList
        );
        datamsg(200, 'success', $data);
        
    }

    public function getPlayVideoList() {
        $tokenRes = $this->checkToken(0);
        if ($tokenRes['status'] == 400) {
            datamsg(400, $tokenRes['mess'], $tokenRes['data']);
        }
        $page = input('post.page', 1);
        if (!preg_match("/^\\+?[1-9][0-9]*$/", $page)) {
            datamsg(400, 'page参数错误');
        }
        $videoId = input('post.video_id');
        if($page == 1 && !isset($videoId)){
            datamsg(400, '视频Id参数错误');
        }


        $webconfig = $this->webconfig;
        $pageSize = $webconfig['app_goodlst_num'];
        $offset = ($page - 1) * $pageSize;

        $videoModel = new VideoModel();
        $videoList = $videoModel->getVideoList($offset, $pageSize, $videoId);
        foreach ($videoList as $key => $v) {
            $videoList[$key]['comment'] = rand(1,10000);
            $videoList[$key]['share'] = rand(1,10000);
            $videoList[$key]['muted'] = "true";
            $videoList[$key]['cover_img'] = url_format($v['cover_img'],$webconfig['weburl'],'?imageMogr2/thumbnail/x350');
            $videoList[$key]['video_url'] = url_format($v['video_path'],$webconfig['weburl']);
            $videoList[$key]['goods_img'] = url_format($v['goods_img'],$webconfig['weburl'],'?imageMogr2/thumbnail/150x150');
            $videoList[$key]['shop_logo'] = url_format($v['shop_logo'],$webconfig['weburl'],'?imageMogr2/thumbnail/150x150');

            $videoList[$key]['state'] = 'pause';
            unset($v['video_path']);
            unset($v['create_time']);
            unset($v['status']);
        }
        $data = array(
            'video_list' => $videoList
        );
        datamsg(200, 'success', $data);

    }

    // 短视频点赞
    public function like(){
        $tokenRes = $this->checkToken();
        if($tokenRes['status'] == 400){
            datamsg(400,$tokenRes['mess']);
        }

        $data = input('post.');
        $data['user_id'] = $tokenRes['user_id'];
        $validate = $this->validate($data,'Video.like');
        if($validate !== true){
            datamsg(400,$validate);
        }
        $videoLikeModel = new VideoLikeModel();
        $doLike =$videoLikeModel->doLike($data['video_id'],$data['user_id']);
        datamsg($doLike['status'],$doLike['mess']);
    }

    // 获取短视频评论列表
    public function getCommentList(){
        $tokenRes = $this->checkToken(0);
        if($tokenRes['status'] == 400){
            datamsg(400,$tokenRes['mess']);
        }

        $data = input('post.');
        $validate = $this->validate($data,'VideoComment.get_comment_list');
        if($validate !== true){
            datamsg(400,$validate);
        }

        $videoCommentModel = new VideoCommentModel();
        $commentList = $videoCommentModel->getCommentList($data['video_id'],$data['page']);
        datamsg(200,'短视频评论列表',$commentList);

    }

    // 获取短视频二级评论列表
    public function getCommentChildList(){
        $tokenRes = $this->checkToken(0);
        if($tokenRes['status'] == 400){
            datamsg(400,$tokenRes['mess']);
        }

        $data = input('post.');
        $validate = $this->validate($data,'VideoComment.get_comment_child_list');
        if($validate !== true){
            datamsg(400,$validate);
        }

        $videoCommentModel = new VideoCommentModel();
        $commentList = $videoCommentModel->getCommentChildList($data['id']);
        datamsg(200,'短视频评论列表',$commentList);

    }

    // 发布评论
    public function addComment(){
        $tokenRes = $this->checkToken();
        if($tokenRes['status'] == 400){ datamsg(400,$tokenRes['mess']); }

        $data = input('post.');
        $data['user_id'] = $tokenRes['user_id'];
        $validate = $this->validate($data,'VideoComment.add_comment');
        if($validate !== true){
            datamsg(400,$validate);
        }
        $videoCommentModel = new VideoCommentModel();
        $add = $videoCommentModel->addComment($data['video_id'],$data['user_id'],$data['content'],$data['pid']);
        datamsg($add['status'],$add['mess'],$add['data']);
    }

    // 删除评论
    public function deleteComment(){
        $tokenRes = $this->checkToken();
        if($tokenRes['status'] == 400){ datamsg(400,$tokenRes['mess']); }

        $data = input('post.');
        $data['user_id'] = $tokenRes['user_id'];
        $validate = $this->validate($data,'VideoComment.delete_comment');
        if($validate !== true){
            datamsg(400,$validate);
        }

        $videoCommentModel = new VideoCommentModel();
        $comment = $videoCommentModel->where('id',$data['id'])->where('user_id',$data['user_id'])->field('id')->find();
        if(!$comment){
            datamsg(400,'删除失败');
        }
        $del = $videoCommentModel->where('id',$data['id'])->delete();
        if($del){
            datamsg(200,'删除成功');
        }else{
            datamsg(400,'删除失败');
        }
    }

    // 分享成功回调
    public function share(){
        $tokenRes = $this->checkToken(0);
        if($tokenRes['status'] == 400){ datamsg(400,$tokenRes['mess']); }

        $data = input('post.');
        $data['user_id'] = $tokenRes['user_id'];
        $validate = $this->validate($data,'Video.share');
        if($validate !== true){
            datamsg(400,$validate);
        }
        $videoModel = new VideoModel();
        $share = $videoModel->where('id',$data['id'])->setInc('share');
        if($share){
            datamsg(200,'分享增加一次成功');
        }else{
             datamsg(400,'分享增加一次失败',['tip_show'=>false]);
        }

    }
}
