<?php
// 本文档自动生成，仅供测试运行
class JiajiaoInfoAction extends Action
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
  

	public function member(){
		$userid=$_SESSION['userid'];
		$mid=$_SESSION['mid'];
		
		if($mid==1){	//教师
			
		}else if($mid==2){	//学生
			$TheObj =new Model('huiyuan_info');
			$map['ttedu_id']=$userid;
			$member=$TheObj->where($map)->find();
			$this->assign("member",$member);
		}
		
		return $member;
	}
	
	public function qing_edu()
    {
	   $this->member();
	  
	  //浏览器显示标题
		$web_title="请家教";
		$this->assign("web_title",$web_title);
	  
	  $this->display();
    }
	
	
	 public function insert()
    {
      $TheObj= D("jiajiao_info"); 
	  
	  if(!$TheObj->create()){//自动验证
		$err=$TheObj->getError();
		echo "<script>alert('".$err."');history.go(-1);</script>";
	  }else{
	  	$TheObj->Create();//创建数据对象
	  	$TheObj->ttedu_shifouyuyue=0;
	  	$result=$TheObj->add();//写入数据库
	  	$this->redirect('TeachInfo/tehlist');//成功后重定向
	  }
    }
	
	
	
	public function edu_info()
    {
      
	  $mfsearch=$_REQUEST['mfsearch'];
	  if($mfsearch=="ok"){
		$list=$_SESSION['list'];
		$this->assign('jiajiao_info',$list);
		$this->display();
		return;
	  }
	  
	  
	  $TheObj =new Model('jiajiao_info');//实例化模型类
	  
	  
	  $ttedu_id=$_POST["ttedu_id"];
	  $ttedu_nianjikemu=$_POST["ttedu_nianjikemu"];
	  $ttedu_shoukediqu=$_POST["ttedu_shoukediqu"];
	  $ttedu_sex=$_POST["ttedu_sex"];
	  $ttedu_techersex=$_POST["ttedu_techersex"];
	  if ($ttedu_id!=="编号"){
	  	$condition['ttedu_id'] = $ttedu_id;
	  }
	  if ($ttedu_nianjikemu!=="学科"){
	  	$condition['ttedu_nianjikemu'] = array('like', '%'.$ttedu_nianjikemu.'%');
	  }
	  $condition['ttedu_shoukediqu'] = array('like', '%'.$ttedu_shoukediqu.'%');
	  $condition['ttedu_sex'] = array('like', '%'.$ttedu_sex.'%');
	  $condition['ttedu_techersex'] = array('like', '%'.$ttedu_techersex.'%');
	  $condition['_logic']='and';
	  
	  if(!empty($ttedu_id)){
	  	import("@.ORG.Page"); //导入分页类
	    $count = $TheObj->where($condition)->count();    //计算总数 
	    $p = new Page ($count, 15 );
		$jiajiao_info=$TheObj->where($condition)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询
	  }else{
	  	import("@.ORG.Page"); //导入分页类
	  	$count = $TheObj->count();    //计算总数 
	  	$p = new Page ($count, 15 );
		$jiajiao_info=$TheObj->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询
	  }
	  
	  
	  $this->assign('jiajiao_info',$jiajiao_info);//根据模板变量赋值
	  
	  //浏览器显示标题
		$web_title="家教信息列表";
		$this->assign("web_title",$web_title);
		
	  
	  $p->setConfig('header','条信息'); 
      $p->setConfig('prev',"<"); 
      $p->setConfig('next','>'); 
      $p->setConfig('first','<<'); 
      $p->setConfig('last','>>'); 
      $page = $p->show ();
	  $this->assign( "page", $page ); 
		 
	  $this->display();
    }
	
	public function edu_infodetail()
    {
	  $id = $_REQUEST["id"];
      $TheObj = M("jiajiao_info");
	  $TheObj = $TheObj->where("ttedu_id=".$id)->find();
	  
	  if($TheObj) {
		  $this->assign("jiajiao_info",$TheObj);
		  
		  //浏览器显示标题
			$web_title="家教信息详情——".$TheObj['ttedu_nianjikemu'];
			$this->assign("web_title",$web_title);
		  
		  
		  $ttedu_nianjikemu=$TheObj['ttedu_nianjikemu'];
		  $ttedu_shoukediqu=$TheObj['ttedu_shoukediqu'];
		  $ttedu_sex=$TheObj['ttedu_sex'];
		  $ttedu_techersex=$TheObj['ttedu_techersex'];
		  //echo $ttedu_nianjikemu."---".$ttedu_shoukediqu."---".$ttedu_sex."---".$ttedu_techersex;
		  $condition['ttedu_nianjikemu'] = array('like', '%'.$ttedu_nianjikemu.'%');
		  $condition['ttedu_shoukediqu'] = array('like', '%'.$ttedu_shoukediqu.'%');
		  $condition['ttedu_sex'] = array('like', '%'.$ttedu_sex.'%');
		  $condition['ttedu_techersex'] = array('like', '%'.$ttedu_techersex.'%');
		  $condition['_logic']='and';
		  
		  $TheObj =new Model('jiajiao_info');//实例化模型类
		  $jiajiao_more=$TheObj->where($condition)->limit('0,5')->order('ttedu_id desc')->findAll(); //查询
		  $this->assign("jiajiao_more",$jiajiao_more);
		  
		  $this->display();
	  }else{
	      $this->redirect("edu_info");
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