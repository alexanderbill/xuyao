<?php
// 本文档自动生成，仅供测试运行
class YuyueTeachInfoAction extends Action
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
			
		}else if($mid==2){	//学生
			$TheObj =new Model('huiyuan_info');
			$map['ttedu_id']=$userid;
			$member=$TheObj->where($map)->find();
			$this->assign("member",$member);
		}
		
		return $member;
	}
	
	public function yuyue_teach_info()
    {
		
	  $member=$this->member();
	  
	  //teachid存在时表示  学生预约老师    为空表示发布家教信息
      $teachid=$_REQUEST['teachid'];
	  $this->assign("teachid",$teachid);
	  if(!empty($member)){
	  	$this->assign("stuid",$member['ttedu_id']);
	  }else{
	  	$this->assign("stuid",0);
	  }
	  
	  
	  $this->display();
    }
	
	
	 public function insert()
    {
      $TheObj= D("yuyue_teach_info"); 
	  
	  if(!$TheObj->create()){//自动验证
		$err=$TheObj->getError();
		echo "<script>alert('".$err."');history.go(-1);</script>";
	  }else{
	  	$TheObj->Create();//创建数据对象
	  	$result=$TheObj->add();//写入数据库
		echo "<script>alert('预约成功！');</script>";
	  	$this->redirect('Index/index');//成功后重定向
	  }
    }
	
	
	
}
?>