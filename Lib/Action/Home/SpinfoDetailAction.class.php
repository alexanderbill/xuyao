<?php

class SpinfoDetailAction extends Action
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


public function videolist()
    {
      //浏览器显示标题
	  $web_title="视频列表信息";
	  $this->assign("web_title",$web_title);
	  
	  
	  $TheObj =new Model('spbtype_info');//实例化模型类
	  $spbtype_info=$TheObj->findAll();
	  $this->assign('spbtype_info',$spbtype_info);//根据模板变量赋值
	  
	  $mfsearch=$_REQUEST['mfsearch'];
	  if($mfsearch=="ok"){
	  	$list=$_SESSION['list'];
		$this->assign('spinfo_detail',$list);
		$this->display();
		return;
	  }
	  
	  
	  
	  
	  $ttedu_spbtype_id=$_REQUEST['ttedu_spbtype_id'];
	  if(!empty($ttedu_spbtype_id)){
	  	$condition['ttedu_spbtype_id']=$ttedu_spbtype_id;
	  }
	  $TheObj =new Model('spinfo_detail');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->where($condition)->count();    //计算总数 
	  $p = new Page ($count, 12 );
	  $spinfo_detail=$TheObj->where($condition)->limit($p->firstRow.','.$p->listRows)->order('ttedu_sppaixu asc')->findAll(); //查询
	  
	  $this->assign('ttedu_spbtype_id',$ttedu_spbtype_id);
	  $this->assign('spinfo_detail',$spinfo_detail);//根据模板变量赋值
	  $p->setConfig('header','条信息'); 
      $p->setConfig('prev',"<"); 
      $p->setConfig('next','>'); 
      $p->setConfig('first','<<'); 
      $p->setConfig('last','>>'); 
      $page = $p->show ();
	  $this->assign( "page", $page ); 
		 
	  $this->display();
    }   
   


public function videodetail()
	{
		$ttedu_id=$_REQUEST['ttedu_id'];
		$jishu=$_REQUEST['jishu'];
		if(!empty($ttedu_id)){
			$TheObj =new Model('spinfo_detail');//实例化模型类
			$spinfo_detail=$TheObj->where("ttedu_id=".$ttedu_id)->find(); //查询
			$this->assign("spinfo_detail",$spinfo_detail);
			
			  //浏览器显示标题
			  $web_title="视频——".$spinfo_detail['ttedu_sptitle']."----";
			  $this->assign("web_title",$web_title);
			
			
			
			$ttedu_spbtype_id=$spinfo_detail['ttedu_spbtype_id'];
			$this->assign('ttedu_spbtype_id',$ttedu_spbtype_id);
			
			$TheObj =new Model('spbtype_info');//实例化模型类
			$spbtype_info=$TheObj->findAll(); //查询
			$this->assign("spbtype_info",$spbtype_info);
			
			$TheObj =new Model('shiping_jishu');//实例化模型类
			$shiping_jishu=$TheObj->where("ttedu_spinfo_id=".$ttedu_id)->findAll(); //查询
			$this->assign("shiping_jishu",$shiping_jishu);
			
			$TheObj =new Model('shiping_jishu');//实例化模型类
			$shiping_jishu1=$TheObj->where("ttedu_spinfo_id=".$ttedu_id)->limit('0,1')->find(); //查询
			
			if($jishu==0){
				$this->assign("jishu",$shiping_jishu1['ttedu_id']);
			}else{
				$this->assign("jishu",$jishu);
			}
			
			$this->display();
		}else{
			echo "<script>alert('参数错误！');history.go(-1);</script>";
		}
	
	}



}
?>