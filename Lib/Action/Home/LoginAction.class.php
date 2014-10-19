<?php
session_start();
class LoginAction extends Action{
	
	
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
	
	
	public function login(){
		$types=$_REQUEST['types'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$usertype=$_POST['usertype'];
		
		import("@.Action.Public.PublicPerson");
		$person=new PublicPerson();
		$user=$person->login($username,$password,$usertype);
		
		if(!empty($user)){
			echo "<script>alert('登录成功！')</script>";
			
			$_SESSION['userid']=$user['id'];
			$_SESSION['mid']=$user['mid'];
			$_SESSION['username']=$user['name'];
			
			    //保存老师登录信息
			 if($usertype==1)	
			 {
			$User=M('teach_info');
			$time=time();
            $data =array();
			$data['ttedu_logindate']=$time;
			$data['ttedu_username']= $username;
			$data['ttedu_id']=$user['id'];
			echo "<script>alert('修改登录时间！".$data['ttedu_logindate']."')</script>";
			$User->save($data);
			
			}
			 //保存学生登录信息
			else 
			{
			 	$User	=	M('huiyuan_info');
			$time=time();
            $data = array();
			 
			$data['ttedu_logindate']=$time;
			$data['ttedu_username']= $username;
			$data['ttedu_id']=$user['id'];
			$User->save($data);
			}
			
			if($types==1){
				$this->redirect('Index/index');
			}else{
				$this->redirect('Index/index');
			}
		}else{
			echo "<script>alert('用户名或者密码错误！');history.go(-1)</script>";
		}
		
	}
	
	
	
	public function logout(){
		$_SESSION['userid']="";
		$_SESSION['mid']="";
		$_SESSION['username']="";
		$this->redirect('Index/index');
	}
	
	
}
?>