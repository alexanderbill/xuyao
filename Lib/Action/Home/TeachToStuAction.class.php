<?php

class TeachToStuAction extends Action
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
	

public function member(){
	$userid=$_SESSION['userid'];
	$mid=$_SESSION['mid'];
	
	if($mid==1){	//教师
		$TheObj =new Model('teach_info');
		$map['ttedu_id']=$userid;
		$member=$TheObj->where($map)->find();
		$this->assign("member",$member);
	}else if($mid==2){	//学生
		
	}
	return $member;
}


public function teach_to_stu(){
	$member=$this->member();
	
    if(empty($member)){
 	  	echo "<script>alert('请先登录！');history.go(-1);</script>";
    }else{
	   
	  $ttedu_teachid=$member['ttedu_id'];
	  	
	  $TheObj= D("teach_to_stu"); 
	  if(!$TheObj->create()){//自动验证
		$err=$TheObj->getError();
		echo "<script>alert('".$err."');history.go(-1);</script>";
	  }else{
	  	$TheObj->Create();//创建数据对象
		
		$TheObj->ttedu_teachid=$ttedu_teachid;
		
		$result=$TheObj->add();//写入数据库
		echo "<script>alert('预约成功！');</script>";
		$this->redirect('Index/index');//成功后重定向
	  }
    }
	
}




}
?>