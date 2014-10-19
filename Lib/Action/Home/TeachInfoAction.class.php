<?php
// 本文档自动生成，仅供测试运行
class TeachInfoAction extends Action
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

public function xingjijiaoyuan(){
	import("@.Action.Public.PublicInfo");
	$public=new PublicInfo();
	
	//语文教师
	$map3['ttedu_zuinanshoukemu']=array('like', '%语文%');
	$map3['ttedu_shifoushengji']=array('neq', 0);
	//$map3['ttedu_mqshengfei']=array('like', '%教师%');
	$this->assign("yuwenjiaoshi",$public->getInfoMap('teach_info',$map3,9));
	
	//数学教师
	$map4['ttedu_zuinanshoukemu']=array('like', '%数学%');
	$map4['ttedu_shifoushengji']=array('neq', 0);
	//$map4['ttedu_mqshengfei']=array('like', '%教师%');
	$this->assign("shuxuejiaoshi",$public->getInfoMap('teach_info',$map4,9));
	
	//英语教师
	$map5['ttedu_zuinanshoukemu']=array('like', '%英语%');
	$map5['ttedu_shifoushengji']=array('neq', 0);
	//$map5['ttedu_mqshengfei']=array('like', '%教师%');
	$this->assign("yingyujiaoshi",$public->getInfoMap('teach_info',$map5,9));
} 

   

public function zuo_edu()
    {
      $web_title="做家教";
	  $this->assign("web_title",$web_title);
	  $this->display();
    }
	
public function tehdetail()
    {
	 Load('extend');
      $this->xingjijiaoyuan();	
	  
	  $id = $_REQUEST["id"];
      $TheObj = M("teach_info");
	  $TheObj = $TheObj->where("ttedu_id=".$id)->find();
	  
	  if($TheObj) {
		  $this->assign("teach_info",$TheObj);
		  
		  $web_title="教员  ".$TheObj['ttedu_chenfu']."  详细信息";
		  $this->assign("web_title",$web_title);
		  
		  
		  $ttedu_renjiaoxueke=$TheObj['ttedu_renjiaoxueke'];
		  $ttedu_jiajiaodiqu=$TheObj['ttedu_jiajiaodiqu'];
		  $ttedu_mqshengfei=$TheObj['ttedu_mqshengfei'];
		  $ttedu_sex=$TheObj['ttedu_sex'];
		  $ttedu_biyexuexiao=$TheObj['ttedu_biyexuexiao'];
		  //echo $ttedu_renjiaoxueke."---".$ttedu_jiajiaodiqu."---".$ttedu_mqshengfei."---".$ttedu_sex;
		  $condition['ttedu_renjiaoxueke'] = array('like', '%'.$ttedu_renjiaoxueke.'%');
		  $condition['ttedu_jiajiaodiqu'] = array('like', '%'.$ttedu_jiajiaodiqu.'%');
		  $condition['ttedu_mqshengfei'] = array('like', '%'.$ttedu_mqshengfei.'%');
		  $condition['ttedu_sex'] = array('like', '%'.$ttedu_sex.'%');
		  $condition['ttedu_biyexuexiao'] = array('like', '%'.$ttedu_biyexuexiao.'%');
		  $condition['_logic']='and';
		  
		  $TheObj =new Model('teach_info');//实例化模型类
		  $teach_more=$TheObj->where($condition)->limit('0,5')->order('ttedu_shifoushengji desc')->findAll(); //查询
		  import("@.Action.Public.PublicInfo");
	     $public=new PublicInfo();
	 
	      $SWI=$public->set_web_info();//网站基本信息
		  
		  $this->assign("teach_more",$teach_more);
		  $this->assign("web_info",$SWI);
		  
		  $this->display();
	  }else{
	      $this->redirect("tehlist");
	  }
	  
    }
	
public function zhuce_teh()
    {
      
	  $web_title="新教员 注册";
	  $this->assign("web_title",$web_title);
	  $this->display();
    }
	
	public  function checkuser()
	{
	
	
	   if(!empty($_POST['ttedu_username'])) {
			$teach_info	=	M("teach_info");
			if($teach_info->getByttedu_username($_POST['ttedu_username'])) {
				$this->error('用户名已经被占用');
			}else{
				$this->success('用户名可以使用!');
			}
		}else{
			$this->error('用户名必须');
		}
	   
	   
	  $this->display();
	}
public function tehlist()
    {
	 Load('extend');
      $this->xingjijiaoyuan();	
	  
	  $web_title="教员列表信息";
	  $this->assign("web_title",$web_title);
	  
	  $mfsearch=$_REQUEST['mfsearch'];
	  if($mfsearch=="ok"){
	  	$list=$_SESSION['list'];
		$this->assign('teach_info',$list);
		$this->display();
		return;
	  }
	  
	  
	  
	  	$TheObj =new Model('teach_info');//实例化模型类
		import("@.ORG.Page"); //导入分页类
		$count = $TheObj->where($condition)->count();    //计算总数 
		$p = new Page ($count, 15 );
		$condition['_logic']='and';
		$teach_info=$TheObj->where($condition)->limit($p->firstRow.','.$p->listRows)->order('ttedu_shifoushengji desc')->findAll(); //查询
	  
	  
	  $this->assign('teach_info',$teach_info);//根据模板变量赋值
	  
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
      $TheObj= D("teach_info"); 
		
	  if(!$TheObj->create()){//自动验证
	  	$err=$TheObj->getError();
		echo "<script>alert('".$err."');history.go(-1);</script>";
	  }else{
	  	
		  $TheObj->Create();//创建数据对象
		  $TheObj->ttedu_shifouyuyue=0;
		  
		  $ttedu_mqshengfei1=$_POST["ttedu_mqshengfei1"];
		  $ttedu_mqshengfei2=$_POST["ttedu_mqshengfei2"];
		  $ttedu_mqshengfei3=$_POST["ttedu_mqshengfei3"];
		  if(!empty($ttedu_mqshengfei1)){
			$TheObj->ttedu_mqshengfei=$ttedu_mqshengfei1;
		  }else if(!empty($ttedu_mqshengfei2)){
			$TheObj->ttedu_mqshengfei=$ttedu_mqshengfei2;
		  }else if(!empty($ttedu_mqshengfei3)){
			$TheObj->ttedu_mqshengfei=$ttedu_mqshengfei3;
		  }
		  
		  $ttedu_biyexuexiao1=$_POST["ttedu_biyexuexiao1"];
		  $ttedu_biyexuexiao2=$_POST["ttedu_biyexuexiao2"];
		  $ttedu_biyexuexiao3=$_POST["ttedu_biyexuexiao3"];
		  if(!empty($ttedu_biyexuexiao1)){
			$TheObj->ttedu_biyexuexiao=$ttedu_biyexuexiao1;
		  }else if(!empty($ttedu_biyexuexiao2)){
			$TheObj->ttedu_biyexuexiao=$ttedu_biyexuexiao2;
		  }else if(!empty($ttedu_biyexuexiao3)){
			$TheObj->ttedu_biyexuexiao=$ttedu_biyexuexiao3;
		  }
		  $TheObj->ttedu_zhucedate=time();
		 // echo "<script>alert('".$_POST['ttedu_renjiaoxueke']."');</script>";
		  
		  $result=$TheObj->add();//写入数据库
		  
		  $_SESSION['userid']=$result;
		  $_SESSION['mid']=1;
		  $_SESSION['username']=$_POST['ttedu_chenfu'];
		 
		  $this->redirect('JiajiaoInfo/edu_info');//成功后重定向
		
	  }
    }
	

}
?>