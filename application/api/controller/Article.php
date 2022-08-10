<?php
namespace app\api\controller;
use app\api\controller\Common;
use think\Db;

class Article extends Common
{

	//通过标题获取文章信息
    public function getArticleByTitle(){
        // 验证token
	    $tokenRes = $this->checkToken(0);
	    if($tokenRes['status'] == 400){
		    datamsg(400, $tokenRes['mess'], $tokenRes['data']);
	    }
        $title = input('post.title');
        // dump(input('post.'));
        if(!empty($title)){
            $article = db('news')->where(['ar_title'=>$title])->find();
            if($article){
	            datamsg(200, '获取文章信息成功', $article);
            }else{
	            datamsg(400, '获取文章信息失败', array('status' => 400));
            }
        }
    }
	//通过id标识获取文章信息
    public function getArticleById(){
        // 验证token
	    $tokenRes = $this->checkToken(0);
        if($tokenRes['status'] == 400){
        	datamsg(400, $tokenRes['mess'], $tokenRes['data']);
        }
        $id = input('post.id');
        if(!empty($id)) {
	        $article = db('news')->find($id);
	        if ($article) {
		        datamsg(200, '获取文章信息成功', $article);
	        } else {
		        datamsg(400, '获取文章信息失败', array('status' => 400));
	        }
        }
    }
	//通过tag标识获取文章信息
	public function getArticleByTag()
	{
		// 验证token
		$tokenRes = $this->checkToken(0);
		if ($tokenRes['status'] == 400) {
			datamsg(400, $tokenRes['mess'], $tokenRes['data']);
		}
		$tag = input('post.tag');
		// dump(input('post.'));
		if (!empty($tag)) {
			$article = db('news')->where('tag', $tag)->find();
			if ($article) {
				datamsg(200, '获取文章信息成功', $article);
			} else {
				datamsg(400, '获取文章信息失败', array('status' => 400));
			}
		}
	}
}
