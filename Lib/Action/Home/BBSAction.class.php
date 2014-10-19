<?php

class BBSAction extends Action
{


public function _initialize(){
		header("Content-Type:text/html; charset=UTF-8");
		import("@.Action.Public.PublicInfo");
		$public=new PublicInfo();
		$public->right_foot();	//读取底部 和 侧边信息
		//判断网站是否开启
		$SWI=$public->set_web_info();//网站基本信息
		if($SWI['ttedu_shifouguanbiweb']==1){
			$this->redirect('Message/msg');//网站关闭，重定向到提示页面
		}
	}
	
public function head_bbs(){
	//获取用户登录信息
	import("@.Action.Public.PublicPerson");
	$person=new PublicPerson();
	$user=$person->user();
	$this->assign("user",$user);
}

//发表回复
public function add_reply()
    {
		$ttedu_reply_content=$_POST['ttedu_reply_content'];
		$ttedu_userid=$_POST['ttedu_userid'];
		$ttedu_mid=$_POST['ttedu_mid'];
		$ttedu_info_id=$_POST['ttedu_info_id'];
		if(!empty($ttedu_reply_content)){
			$TheObj =D('shequ_reply_info');
			$TheObj->Create();
			$TheObj->ttedu_userid=$ttedu_userid;
			$TheObj->ttedu_info_id=$ttedu_info_id;
			$TheObj->ttedu_mid=$ttedu_mid;
			$TheObj->ttedu_reply_content=$ttedu_reply_content;
			$TheObj->ttedu_fbdate=time();
			$TheObj->add();
			$this->redirect('bbs/article/ttedu_id/'.$ttedu_info_id);
		}else{
			echo "<script>alert('请输入回复内容！');history.go(-1);</script>";
		}
		
	}

//发表帖子
public function add_info()
    {
		$ttedu_tiezi_content=$_POST['ttedu_tiezi_content'];
		$ttedu_shequ_title=$_POST['ttedu_shequ_title'];
		$ttedu_zhuti_id=$_POST['ttedu_zhuti_id'];
		$ttedu_userid=$_POST['ttedu_userid'];
		$ttedu_mid=$_POST['ttedu_mid'];
		
		if(empty($ttedu_userid)){
			echo "<script>alert('请先登录！');history.go(-1);</script>";
		}else if(empty($ttedu_tiezi_content)){
			echo "<script>alert('请输入内容！');history.go(-1);</script>";
		}else if(empty($ttedu_shequ_title)){
			echo "<script>alert('请输入标题！');history.go(-1);</script>";
		}else{
			$TheObj =D('shequ_info');
			$TheObj->Create();
			$TheObj->ttedu_fbdate=time();
			$TheObj->ttedu_tiezi_content=$ttedu_tiezi_content;
			$TheObj->ttedu_shequ_title=$ttedu_shequ_title;
			$TheObj->ttedu_userid=$ttedu_userid;
			$TheObj->ttedu_zhuti_id=$ttedu_zhuti_id;
			$TheObj->ttedu_mid=$ttedu_mid;
			$TheObj->add();
			$this->redirect('bbs/article_list/ttedu_zhuti_id/'.$ttedu_zhuti_id);
		}
		
		
		
	}
	
	
public function search_info(){
	$ttedu_shequ_title=$_REQUEST['ttedu_shequ_title'];
	$condition['ttedu_shequ_title'] = array('like', '%'.$ttedu_shequ_title.'%');
	$TheObj =M('shequ_info');
	
	import("@.ORG.Page"); //导入分页类
	$count = $TheObj->where($condition)->count();    //计算总数
	$p = new Page ($count,20);
    $p->setConfig('header','条回复'); 
    $p->setConfig('prev',"<"); 
    $p->setConfig('next','>'); 
    $p->setConfig('first','<<'); 
    $p->setConfig('last','>>'); 
    $page = $p->show ();
    $this->assign( "page", $page );
	
	$shequ_info=$TheObj->where($condition)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询数
	
	$this->assign("shequ_info",$shequ_info);
	
	
	//浏览器显示标题
    $web_title="助教社区——".$shequ_info['ttedu_shequ_title']."";
    $this->assign("web_title",$web_title);
	$this->display();
}	





public function index()
    {
		
		//$this->head_bbs();
		import("@.Action.Public.PublicBBS");
		$bbs=new PublicBBS();
		$shequ_zhuti=$bbs->get_shequ1();
		//$shequ_zhuti=$this->get_shequ1();
	    $this->assign("shequ_zhuti",$shequ_zhuti);
		
		//浏览器显示标题
		$web_title="助教社区---首页----";
		$this->assign("web_title",$web_title);
		$this->display();
	}



public function article_list()
    {
		$ttedu_zhuti_id=$_REQUEST['ttedu_zhuti_id'];
		$TheObj =new Model('shequ_zhuti');
		$shequ_zhuti=$TheObj->where('ttedu_id='.$ttedu_zhuti_id)->find();
		$this->assign("shequ_zhuti",$shequ_zhuti);
		
		//浏览器显示标题
		$web_title="助教社区——".$shequ_zhuti['ttedu_zhuti_topic']."";
		$this->assign("web_title",$web_title);
		
		import("@.Action.Public.PublicBBS");
		$bbs=new PublicBBS();
		$shequ_info=$bbs->get_shequ2($ttedu_zhuti_id);
		//$shequ_info=$this->get_shequ2($ttedu_zhuti_id);
	    $this->assign("shequ_info",$shequ_info);
		
		//获取用户登录信息
		import("@.Action.Public.PublicPerson");
		$person=new PublicPerson();
		$user=$person->user();
		$this->assign("user",$user);
		
		
		$this->display();
	}


public function article()
    {
		$ttedu_id=$_REQUEST['ttedu_id'];
		$TheObj =new Model('shequ_info');
		$shequ_info=$TheObj->where('ttedu_id='.$ttedu_id)->find();
		
		//获取作者
		import("@.Action.Public.PublicPerson");
		$person=new PublicPerson();
		$shequ_info['person']= $person->person($shequ_info['ttedu_userid'],$shequ_info['ttedu_mid']);
		$this->assign("shequ_info",$shequ_info);
		
		//浏览器显示标题
		$web_title="助教社区——".$shequ_info['ttedu_shequ_title']."";
		$this->assign("web_title",$web_title);
		
		//获取用户登录信息
		import("@.Action.Public.PublicPerson");
		$person=new PublicPerson();
		$user=$person->user();
		$this->assign("user",$user);
		
		import("@.Action.Public.PublicBBS");
		$bbs=new PublicBBS();
		$shequ_reply_info=$bbs->get_shequ3($ttedu_id);
		//$shequ_reply_info=$this->get_shequ3($ttedu_id);
	    $this->assign("shequ_reply_info",$shequ_reply_info);
		
		$this->display();
	}



}
?>