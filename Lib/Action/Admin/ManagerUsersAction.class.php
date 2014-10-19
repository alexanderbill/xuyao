<?php
// 本文档自动生成，仅供测试运行
class ManagerUsersAction extends Action
{

public function _initialize(){
	header("Content-Type:text/html; charset=UTF-8");
		
	$admin=$_SESSION['admin'];
	if(empty($admin)){
		$this->redirect('Login/login');
	}
}
    
public function admin_manager()
    {
      $TheObj =new Model('manager_users');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->count();    //计算总数 
	  $p = new Page ($count, 15 );
	  
	  $manager_users=$TheObj->limit($p->firstRow.','.$p->listRows)->order('ttedu_id asc')->findAll(); //查询
	  
	  
	  $this->assign('manager_users',$manager_users);//根据模板变量赋值
	  
	  $p->setConfig('header','条信息'); 
      $p->setConfig('prev',"<"); 
      $p->setConfig('next','>'); 
      $p->setConfig('first','<<'); 
      $p->setConfig('last','>>'); 
      $page = $p->show ();
	  $this->assign( "page", $page ); 
		 
	  $this->display();
    }


public function insert()
    {
      $TheObj =D('manager_users');//实例化模型类
	  if($TheObj->Create()){
		  $TheObj->add();
		  $this->redirect('admin_manager');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
    }


public function update()
    {
      $TheObj =D('manager_users');//实例化模型类
	  if($TheObj->Create()){
		  $TheObj->save();
		  $this->redirect('admin_manager');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }	

public function delete()
    {
      $TheObj =D('manager_users');//实例化模型类
	  $TheObj->Create();
	  $ttedu_id=$_REQUEST['ttedu_id'];
	  $TheObj->delete($ttedu_id);
	  $this->redirect('admin_manager');
    }
	

}
?>