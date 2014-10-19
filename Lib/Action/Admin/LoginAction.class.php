<?php
session_start();
// 本文档自动生成，仅供测试运行
class LoginAction extends Action
{

public function _initialize(){
	header("Content-Type:text/html; charset=UTF-8");
	
}  

//--------登录--------------

public function login(){
	$admin=$_SESSION['admin'];
	if(!empty($admin)){
		$this->redirect('Index/index');
	}
	$this->display();
}

public function logout(){
	$_SESSION['admin']='';
	$this->redirect('login');
}

public function loginpass(){
	$ttedu_musers=$_POST['ttedu_musers'];
	$ttedu_mpassword=$_POST['ttedu_mpassword'];
	$map['ttedu_musers']=$ttedu_musers;
	$map['ttedu_mpassword']=$ttedu_mpassword;
	
	$TheObj=new Model('manager_users');
	$admin=$TheObj->where($map)->find();
	if(!empty($admin)){
		$_SESSION['admin']=$admin;
		$this->redirect('Index/index');
	}else{
		echo "<script>alert('用户名或密码错误！');history.go(-1);</script>";
	}
}


//--------登录结束-------------


	
}
?>