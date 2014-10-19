<?php
// 本文档自动生成，仅供测试运行
class HuiyuanInfoAction extends Action
{
 
public function _initialize(){
	header("Content-Type:text/html; charset=UTF-8");
	
	$admin=$_SESSION['admin'];
	if(empty($admin)){
		$this->redirect('Login/login');
	}
}   
 
    
public function admin_member_stu()
    {
      $TheObj =new Model('huiyuan_info');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->count();    //计算总数 
	  $p = new Page ($count, 15 );
	  
	  $huiyuan_info=$TheObj->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询
	  
	  
	  $this->assign('huiyuan_info',$huiyuan_info);//根据模板变量赋值
	  
	  $p->setConfig('header','条信息'); 
      $p->setConfig('prev',"<"); 
      $p->setConfig('next','>'); 
      $p->setConfig('first','<<'); 
      $p->setConfig('last','>>'); 
      $page = $p->show ();
	  $this->assign( "page", $page ); 
		 
	  $this->display();
    }
	
	
	
public function update_member_stu()
    {
      $ttedu_id = $_REQUEST["ttedu_id"];
      $TheObj =new  Model("huiyuan_info");
	  $TheObj = $TheObj->where("ttedu_id=".$ttedu_id)->find();
	  
	  $this->assign("huiyuan_info",$TheObj);
	  $this->display();
    }
	

public function update()
    {
      $TheObj =D("huiyuan_info");
	  if($TheObj->Create()){
	  	  $TheObj->ttedu_id=$_POST['ttedu_id'];
		  if(!empty($_POST['ttedu_password'])){
		  	$TheObj->ttedu_password=stripslashes($_POST['ttedu_password']);
		  }
		  $TheObj->ttedu_sex=stripslashes($_POST['ttedu_sex']);
		  $TheObj->ttedu_old=stripslashes($_POST['ttedu_old']);
		  $TheObj->ttedu_birth=stripslashes($_POST['ttedu_birth']);
		  $TheObj->ttedu_zuoji=stripslashes($_POST['ttedu_zuoji']);
		  $TheObj->ttedu_qq=stripslashes($_POST['ttedu_qq']);
		  $TheObj->ttedu_sex=stripslashes($_POST['ttedu_sex']);
		  $TheObj->ttedu_sex=stripslashes($_POST['ttedu_sex']);
		  
		  $TheObj->save(); // 保存当前数据对象
		  $this->redirect('admin_member_stu');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }
	
		
	

public function checkEnv()
    {
        load('pointer',THINK_PATH.'/Tpl/Autoindex');//载入探针函数
        $env_table = check_env();//根据当前函数获取当前环境
        echo $env_table;
    }

}
?>