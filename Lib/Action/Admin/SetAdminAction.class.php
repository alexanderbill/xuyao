<?php
// 本文档自动生成，仅供测试运行
class SetAdminAction extends Action
{


public function _initialize(){
	header("Content-Type:text/html; charset=UTF-8");
	
	$admin=$_SESSION['admin'];
	if(empty($admin)){
		$this->redirect('Login/login');
	}
} 



public function admin_set_pay(){
	$TheObj =new Model('set_pay_info');//实例化模型类
	$set_pay_info=$TheObj->order('ttedu_paixu asc')->order('ttedu_paixu asc')->findAll();
	$this->assign("set_pay_info",$set_pay_info);
	
	$this->display();
}


public function update_set_pay(){
	$TheObj =new Model('set_pay_info');//实例化模型类
	$ttedu_id=$_REQUEST['ttedu_id'];
	$pay=$TheObj->where('ttedu_id='.$ttedu_id)->find();
	$this->assign("pay",$pay);
	
	$this->display();
}

public function up_set_pay(){
	  $TheObj =D("set_pay_info");
	  if($TheObj->Create()){
	  	  $TheObj->save(); // 保存当前数据对象
		  $this->redirect('admin_set_pay');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	
}






public function set_other_website_info(){
	$TheObj =new Model('set_other_website_info');//实例化模型类
	$set_other_website_info=$TheObj->order('ttedu_paixu asc')->findAll();
	$this->assign("set_other_website_info",$set_other_website_info);
	
	$this->display();
}

public function update_sowi()
{
  $TheObj =M('set_other_website_info');//实例化模型类
  $TheObj->ttedu_id=$_POST['ttedu_id']; 
  $TheObj->ttedu_webname=$_POST['ttedu_webname'];
  $TheObj->ttedu_website=$_POST['ttedu_website'];
  $TheObj->ttedu_paixu=$_POST['ttedu_paixu'];
  $TheObj->ttedu_color=$_POST['ttedu_color'];
  $TheObj->ttedu_states=$_POST['ttedu_states'];
  
  $TheObj->save();
  $this->redirect('set_other_website_info');
}

public function delete_sowi(){
	$TheObj =new Model('set_other_website_info');//实例化模型类
	$ttedu_id=$_REQUEST['ttedu_id'];
	$TheObj->delete($ttedu_id);
	$this->redirect('set_other_website_info');
}

public function add_sowi(){
	$TheObj =new Model('set_other_website_info');//实例化模型类
	$ttedu_webname=$_POST['ttedu_webname'];
	$ttedu_website=$_POST['ttedu_website'];
	if(empty($ttedu_webname)){
		echo "<script>alert('请输入站点名称');history.go(-1);</script>";
	}
	if(empty($ttedu_website)){
		echo "<script>alert('请输入站点地址');history.go(-1);</script>";
	}
	$TheObj->ttedu_webname=$ttedu_webname;
  	$TheObj->ttedu_website=$ttedu_website;
  	$TheObj->ttedu_paixu=$_POST['ttedu_paixu'];
  	$TheObj->ttedu_color=$_POST['ttedu_color'];
  	$TheObj->ttedu_states=$_POST['ttedu_states'];
	$TheObj->add();
	$this->redirect('set_other_website_info');
}	


    
public function admin_set_jiben(){
	$TheObj =new Model('set_web_info');//实例化模型类
	$set_web_info=$TheObj->where('ttedu_id=1')->find();
	$this->assign("set_web_info",$set_web_info);
	
	$TheObj =new Model('set_yinghang_info');//实例化模型类
	$set_yinghang_info=$TheObj->findAll();
	$this->assign("set_yinghang_info",$set_yinghang_info);
	
	$this->display();
}


public function update(){
	$TheObj =D('set_web_info');//实例化模型类
	$TheObj->ttedu_id=1;
	$TheObj->ttedu_webname=$_POST['ttedu_webname']; 
	$TheObj->ttedu_titlename=$_POST['ttedu_titlename'];
	$TheObj->ttedu_website=$_POST['ttedu_website'];
	$TheObj->ttedu_keyword=$_POST['ttedu_keyword'];
	$TheObj->ttedu_description=$_POST['ttedu_description'];
	$TheObj->ttedu_shifouguanbiweb=$_POST['ttedu_shifouguanbiweb'];
	$TheObj->ttedu_guanbiwangzshuom=$_POST['ttedu_guanbiwangzshuom'];
	$TheObj->ttedu_tel=$_POST['ttedu_tel'];
	$TheObj->ttedu_qq=$_POST['ttedu_qq'];
	$TheObj->ttedu_mianduimianfukuan=$_POST['ttedu_mianduimianfukuan'];
	$TheObj->ttedu_contact=$_POST['ttedu_contact'];
	$TheObj->save(); // 保存当前数据对象
	
	$TheObj2 =M('set_yinghang_info');//实例化模型类
	$set_yinghang_info=$TheObj2->findAll();
	$num=1; 
	if($set_yinghang_info){
		foreach($set_yinghang_info as $key => $value){
			$id = $value['ttedu_id'];
			$TheObj_x =D('set_yinghang_info');//实例化模型类
			
			$TheObj_x->ttedu_id= $_POST['ttedu_id'.$num]; 
			$TheObj_x->ttedu_kaihuhang= $_POST['ttedu_kaihuhang'.$num]; 
			$TheObj_x->ttedu_kaihuhangaddress= $_POST['ttedu_kaihuhangaddress'.$num];
			$TheObj_x->ttedu_huming= $_POST['ttedu_huming'.$num];
			$TheObj_x->ttedu_yinhangkatype= $_POST['ttedu_yinhangkatype'.$num];
			$TheObj_x->ttedu_zhanghao= $_POST['ttedu_zhanghao'.$num];
			$TheObj_x->ttedu_shifouxianshi= $_POST['ttedu_shifouxianshi'.$num];
			$TheObj_x->save();
			
			$num=$num+1;
		}
	}
	
	$this->redirect('admin_set_jiben');
}

}
?>