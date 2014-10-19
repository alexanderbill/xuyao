<?php
// 本文档自动生成，仅供测试运行
class BBSAction extends Action
{

public function _initialize(){
	header("Content-Type:text/html; charset=UTF-8");
	
	$admin=$_SESSION['admin'];
	if(empty($admin)){
		$this->redirect('Login/login');
	}
}  


public function admin_bbs_tiezi()
    {
		
		$TheObj =new Model('shequ_zhuti');//实例化模型类
		$shequ_zhuti=$TheObj->select();
		$this->assign("shequ_zhuti",$shequ_zhuti);
		
		
	  $ttedu_zhuti_id=$_REQUEST['ttedu_zhuti_id'];
	  
	  import("@.Action.Public.PublicBBS");
	  $bbs=new PublicBBS();
	  $shequ_info=$bbs->get_shequ2($ttedu_zhuti_id);
	  $this->assign("shequ_info",$shequ_info);
	  
	  $this->display();
    }


public function add_tiezi()
    {
		$TheObj =new Model('shequ_zhuti');//实例化模型类
		$shequ_zhuti=$TheObj->select();
		$this->assign("shequ_zhuti",$shequ_zhuti);
		
		$this->display();
    }
	

public function insert_tiezi()
    {
		  $TheObj= D("shequ_info"); 
		  if($TheObj->Create()){
			  $result=$TheObj->add();//写入数据库
			  $this->redirect('add_tiezi');
		  }else{
			  $err=$TheObj->getError();
			  echo "<script>alert('".$err."');history.go(-1);</script>";
		  }
    }
	

public function xiugai_tiezi()
    {
        $ttedu_id=$_REQUEST['ttedu_id'];
		if(!empty($ttedu_id)){
			$TheObj =new Model('shequ_zhuti');//实例化模型类
			$shequ_zhuti=$TheObj->select();
			$this->assign("shequ_zhuti",$shequ_zhuti);
			
			$TheObj =new Model('shequ_info');//实例化模型类
			$shequ_info=$TheObj->where("ttedu_id=".$ttedu_id)->find(); //查询
			$this->assign("shequ_info",$shequ_info);
			$this->display();
		}else{
			echo "<script>alert('参数错误！');history.go(-1);</script>";
		}
    } 

public function update_shifouzhiding()
    {
	  $TheObj=new Model("shequ_info"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
	  $shifouzhiding=$_REQUEST['shifouzhiding'];
	  if(!empty($ttedu_id)){
	  	  $TheObj->ttedu_id=$ttedu_id;
		  $TheObj->ttedu_shifouzhiding=$shifouzhiding;
		  $TheObj->save(); // 保存当前数据对象
		  $this->redirect('admin_bbs_tiezi');
	  }
    }

public function update_tiezi()
    {
	  $TheObj= D("shequ_info"); 
	  
	  if($TheObj->Create()){
		  $TheObj->save(); // 保存当前数据对象
		  $this->redirect('admin_bbs_tiezi');
	   }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }


public function delete_tiezi()
    {
      $TheObj= new Model("shequ_info"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
      $result=$TheObj->delete($ttedu_id);
	  
	  $TheObj= new Model("shequ_reply_info");
	  $result=$TheObj->where('ttedu_info_id='.$ttedu_id)->delete();
      $this->redirect('admin_bbs_tiezi');
    }



public function shequ_reply_info()
    {
	  $ttedu_info_id=$_REQUEST['ttedu_info_id'];
	  
	  import("@.Action.Public.PublicBBS");
	  $bbs=new PublicBBS();
	  $shequ_reply_info=$bbs->get_shequ3($ttedu_info_id);
	  
	  $this->assign('shequ_reply_info',$shequ_reply_info);//根据模板变量赋值
	  
	  $this->display();
    }


public function delete_reply()
    {
	  $ttedu_id=$_REQUEST['ttedu_id'];
      $TheObj= new Model("shequ_reply_info");
      $result=$TheObj->delete($ttedu_id);
	  
	  
	  $ttedu_info_id=$_REQUEST['ttedu_info_id'];
      $this->redirect('bbs/shequ_reply_info/ttedu_info_id/'.$ttedu_info_id);
    }





	
	

    
public function admin_bbs_bankuai()
    {
		
		import("@.Action.Public.PublicBBS");
		$bbs=new PublicBBS();
		$shequ_zhuti=$bbs->get_shequ1();
		//$TheObj =new Model('shequ_zhuti');//实例化模型类
		//$shequ_zhuti=$TheObj->select();
		
		$this->assign("shequ_zhuti",$shequ_zhuti);
		$this->display();
    }
	
public function add_bankuai()
    {
	  $TheObj= D("shequ_zhuti"); 
	  
	  if($TheObj->Create()){
	  	  $result=$TheObj->add();//写入数据库
		  $this->redirect('admin_bbs_bankuai');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }
	

public function update_bankuai()
    {
	  $TheObj= D("shequ_zhuti"); 
	  
	  if($TheObj->Create()){
	  	  $result=$TheObj->save();//写入数据库
		  $this->redirect('admin_bbs_bankuai');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }
	

public function delete_bankuai()
    {
	  $TheObj= new Model("shequ_zhuti"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
      $result=$TheObj->delete($ttedu_id);
	  
      $this->redirect('admin_bbs_bankuai');
    }
	
		

}
?>