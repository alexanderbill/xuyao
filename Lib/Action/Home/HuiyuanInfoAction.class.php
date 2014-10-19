<?php
// 本文档自动生成，仅供测试运行
class HuiyuanInfoAction extends Action
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
	
	
public function xuesheng_zhuce(){
	$this->display();
}
	
	public  function checkuser()
	{
	
	
	   if(!empty($_POST['ttedu_username'])) {
			$teach_info	=	M("huiyuan_info");
			if($teach_info->getByttedu_username($_POST['ttedu_username'])) {
				$this->error('用户名已经被占用');
			}else{
				$this->success('用户名可以使用!');
			}
		}else{
			$this->error('用户名必须');
		}
		}
	
	

public function huiyuandetail(){
	$id = $_REQUEST["id"];
    $TheObj = M("huiyuan_info");
    $huiyuan_info = $TheObj->where("ttedu_id=".$id)->find();
	$this->assign("huiyuan_info",$huiyuan_info);
	
	//浏览器显示标题
	$web_title="学生会员详情——".$huiyuan_info['ttedu_username'];
	$this->assign("web_title",$web_title);
	
	
	$huiyuan_more = $TheObj->findAll();
	$this->assign("huiyuan_more",$huiyuan_more);
	
	$this->display();
}



	
	
	
	
	 public function insert()
    {
      $TheObj= D("huiyuan_info"); 
	  
	  if(!$TheObj->create()){//自动验证
		$err=$TheObj->getError();
		echo "<script>alert('".$err."');history.go(-1);</script>";
	  }else{
	  	$TheObj->Create();//创建数据对象
	  	$result=$TheObj->add();//写入数据库
		
		$_SESSION['userid']=$result;
		$_SESSION['mid']=2;
		$_SESSION['username']=$_POST['ttedu_username'];
		
	  	$this->redirect('TeachInfo/tehlist');//成功后重定向
	  }
    }
	
	
}
?>