<?php

class InfoDownAction extends Action
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

public function downloadlist()
    {
      $TheObj =new Model('btype_down');//实例化模型类
	  $btype_down=$TheObj->findAll();
	  $this->assign('btype_down',$btype_down);//根据模板变量赋值
	  
	  //浏览器显示标题
		$web_title="资源下载——".$btype_down['ttedu_btype_name']."";
		$this->assign("web_title",$web_title);
	  
	  
	  $mfsearch=$_REQUEST['mfsearch'];
	  if($mfsearch=="ok"){
	  	$list=$_SESSION['list'];
		$this->assign('info_down',$list);
		$this->display();
		return;
	  }
	  
	 
	  
	  
	  $ttedu_btype_id=$_REQUEST['ttedu_btype_id'];
	  if(!empty($ttedu_btype_id)){
	  	$condition['ttedu_btype_id']=$ttedu_btype_id;
	  }
	  $TheObj =new Model('info_down');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->where($condition)->count();    //计算总数 
	  $p = new Page ($count, 15 );
	  $info_down=$TheObj->where($condition)->limit($p->firstRow.','.$p->listRows)->order('ttedu_paixu asc')->findAll(); //查询
	  
	  $this->assign('ttedu_btype_id',$ttedu_btype_id);
	  $this->assign('info_down',$info_down);//根据模板变量赋值
	  $p->setConfig('header','条信息'); 
      $p->setConfig('prev',"<"); 
      $p->setConfig('next','>'); 
      $p->setConfig('first','<<'); 
      $p->setConfig('last','>>'); 
      $page = $p->show ();
	  $this->assign( "page", $page ); 
		 
	  $this->display();
    }   
   


public function downloaddetail()
	{
		$ttedu_id=$_REQUEST['ttedu_id'];
		if(!empty($ttedu_id)){
			$TheObj =new Model('info_down');//实例化模型类
			$info_down=$TheObj->where("ttedu_id=".$ttedu_id)->find(); //查询
			$this->assign("info_down",$info_down);
			
			 //浏览器显示标题
			$web_title="资源下载——".$info_down['ttedu_title']."";
			$this->assign("web_title",$web_title);
			
			
			$ttedu_btype_id=$info_down['ttedu_btype_id'];
			$TheObj =new Model('btype_down');//实例化模型类
			$btype_down=$TheObj->where("ttedu_id=".$ttedu_btype_id)->find(); //查询
			$this->assign("btype_down",$btype_down);
			
			$TheObj =new Model('info_down');//实例化模型类
			$info_detail_other=$TheObj->where("ttedu_btype_id=".$ttedu_btype_id)->limit(0,5)->findAll(); //查询
			$this->assign("info_detail_other",$info_detail_other);
			
			$this->display();
		}else{
			echo "<script>alert('参数错误！');history.go(-1);</script>";
		}
	
	}



}
?>