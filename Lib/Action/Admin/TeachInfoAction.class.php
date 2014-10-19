<?php
// 本文档自动生成，仅供测试运行
class TeachInfoAction extends Action
{
    
public function _initialize(){
	header("Content-Type:text/html; charset=UTF-8");
	
	$admin=$_SESSION['admin'];
	if(empty($admin)){
		$this->redirect('Login/login');
	}
}
	
public function detail_member_teh()
    {
      
      $TheObj =new  Model("teach_info");
	  
	  $ttedu_id = $_REQUEST["ttedu_id"];
	  if(!empty($ttedu_id)){
	  	$condition['ttedu_id'] = $ttedu_id;
		$ttedu_teachid=$ttedu_id;
	  }
	  
	  
	  $ttedu_id = $_POST["ttedu_id"];
	  if(!empty($ttedu_id)){
	  	$condition['ttedu_id'] = $ttedu_id;
		$ttedu_teachid=$ttedu_id;
	  }
	  
	  $ttedu_shenfenzheng = $_POST["ttedu_shenfenzheng"];
	  if(!empty($ttedu_shenfenzheng)){
	  	$condition['ttedu_shenfenzheng'] = $ttedu_shenfenzheng;
	  }
	  
	  $ttedu_shouxuandianhua = $_POST["ttedu_shouxuandianhua"];
	  if(!empty($ttedu_shouxuandianhua)){
	  	$condition['ttedu_shouxuandianhua'] = $ttedu_shouxuandianhua;
	  }
	  
	  $ttedu_qq = $_POST["ttedu_qq"];
	  if(!empty($ttedu_qq)){
	  	$condition['ttedu_qq'] = $ttedu_qq;
	  }
	  
	  $ttedu_chenfu = $_POST["ttedu_chenfu"];
	  if(!empty($ttedu_chenfu)){
	  	$condition['ttedu_chenfu'] = $ttedu_chenfu;
	  }
	  
	  $ttedu_renjiaoxuexiao=$_POST["ttedu_renjiaoxuexiao"];
	  if(!empty($ttedu_renjiaoxuexiao)){
	  	$condition['ttedu_renjiaoxuexiao'] = array('like', '%'.$ttedu_renjiaoxuexiao.'%');
	  }
	  
	  $TheObj = $TheObj->where($condition)->find();
	  
	  //教师评论
	  $this->get_pinglun($ttedu_teachid);
	  
	  if($TheObj) {
		  $this->assign("teach_info",$TheObj);
		  
		  $this->display();
	  }else{
	      $this->redirect("admin_member_teh");
	  }
    }


public function get_pinglun($ttedu_teachid){
	  $TheObj =new  Model("teach_pingun");
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->where("ttedu_teachid=".$ttedu_teachid)->count();    //计算总数 
	  $p = new Page ($count, 10 );
	  $p->setConfig('header','条信息'); 
	  $p->setConfig('prev',"<"); 
	  $p->setConfig('next','>'); 
	  $p->setConfig('first','<<'); 
	  $p->setConfig('last','>>'); 
	  $page = $p->show ();
	  $this->assign( "page", $page ); 
	  $teach_pingun = $TheObj->where("ttedu_teachid=".$ttedu_teachid)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll();
	  
	   if($teach_pingun){
			foreach($teach_pingun as $key => $value){
				$id = $value['ttedu_id']; 
				$list[$id]['ttedu_id']= $value['ttedu_id']; 
				$list[$id]['ttedu_jibie']= $value['ttedu_jibie'];
				$list[$id]['ttedu_content']= $value['ttedu_content'];
				$list[$id]['ttedu_adddate']= $value['ttedu_adddate'];
				$list[$id]['ttedu_userid']= $value['ttedu_userid'];
				$list[$id]['ttedu_teachid']= $value['ttedu_teachid'];
				
				//人员信息
				import("@.Action.Public.PublicPerson");
	  			$person=new PublicPerson();
				$list[$id]['person']= $person->person($value['ttedu_userid'],2);
			}
		  }
	  
	  $this->assign( "teach_pingun", $list );
}



public function update_member_teh()
    {
      $ttedu_id = $_REQUEST["ttedu_id"];
      $TheObj =new  Model("teach_info");
	  $TheObj = $TheObj->where("ttedu_id=".$ttedu_id)->find();
	  
	  $this->assign("teach_info",$TheObj);
	  $this->display();
    }	

public function admin_photo_teh()
    {
      $ttedu_id = $_REQUEST["ttedu_id"];
      $TheObj =new  Model("pic_zj");
	  $pic_zj = $TheObj->where("ttedu_teachid=".$ttedu_id." and ttedu_typename=0")->findAll();
	  
	  $this->assign("ttedu_id",$ttedu_id);
	  $this->assign("pic_zj",$pic_zj);
	  $this->display();
    }	
	
public function admin_photo_teh2()
    {
      $ttedu_id = $_REQUEST["ttedu_id"];
      $TheObj =new  Model("pic_zj");
	  $pic_zj = $TheObj->where("ttedu_teachid=".$ttedu_id." and ttedu_typename>0")->findAll();
	  
	  $this->assign("ttedu_id",$ttedu_id);
	  $this->assign("pic_zj",$pic_zj);
	  $this->display();
    }		

	
	
public function update()
    {
      $TheObj =D("teach_info");
	  if($TheObj->Create()){
	  	  $TheObj->ttedu_id=$_POST['ttedu_id'];
		  if(!empty($_POST['ttedu_password'])){
		  	$TheObj->ttedu_password=stripslashes($_POST['ttedu_password']);
		  }
		  
		  
		  $TheObj->save(); // 保存当前数据对象
		  $this->redirect('admin_member_teh');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }

public function pingjia()
    {
      $ttedu_id = $_REQUEST["ttedu_id"];
      $TheObj =new  Model("teach_info");
	  $TheObj = $TheObj->where("ttedu_id=".$ttedu_id)->find();
	  
	  
	  $this->redirect("TeachInfo/detail_member_teh/ttedu_id/".$ttedu_id);
    }

	
public function admin_member_teh()
    {
      $TheObj =new Model('teach_info');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->count();    //计算总数 
	  $p = new Page ($count, 15 );
	  
	  $teach_info=$TheObj->limit($p->firstRow.','.$p->listRows)->order('ttedu_shifoushengji desc')->findAll(); //查询
	  
	  
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
	
//-------------教师修改审核------------------


public function up_shengheixiugai()
    {
      $ttedu_id=$_REQUEST['ttedu_id'];
	  
	  $TheObj =M("teach_info");
	  $map['ttedu_id']=$ttedu_id;
	  $teach_info=$TheObj->where($map)->find();
	  $ttedu_yuanlaijieshao=$teach_info['ttedu_yuanlaijieshao'];
	  
	  $TheObj->ttedu_id=$ttedu_id;
	  $TheObj->ttedu_shengheixiugai=0;
	  $TheObj->ttedu_xiangxijieshao=$ttedu_yuanlaijieshao;
	  $TheObj->save(); // 保存当前数据对象
	  $this->redirect('admin_audit_update');
    }



public function detail_audit_update()
    {
      $ttedu_id = $_REQUEST["ttedu_id"];
      $TheObj =new  Model("teach_info");
	  $TheObj = $TheObj->where("ttedu_id=".$ttedu_id)->find();
	  
	  $this->assign("teach_info",$TheObj);
	  $this->display();
    }	


public function admin_audit_update()
    {
      $TheObj =new Model('teach_info');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->where('ttedu_shengheixiugai=1')->count();    //计算总数 
	  $p = new Page ($count, 15 );
	  
	  $teach_info=$TheObj->where('ttedu_shengheixiugai=1')->limit($p->firstRow.','.$p->listRows)->order('ttedu_shifoushengji desc')->findAll(); //查询
	  
	  
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



//----------------教师注册审核-------------------------


public function admin_audit_regist()
    {
      $TheObj =new Model('teach_info');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->where('ttedu_shengheishifoutongguo=0')->count();    //计算总数 
	  $p = new Page ($count, 15 );
	  
	  $teach_info=$TheObj->where('ttedu_shengheishifoutongguo=0')->limit($p->firstRow.','.$p->listRows)->order('ttedu_shifoushengji desc')->findAll(); //查询
	  
	  
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
	

public function up_shengheishifoutongguo()
    {
      $TheObj =M("teach_info");
	  $TheObj->ttedu_id=$_REQUEST['ttedu_id'];
	  $TheObj->ttedu_shengheishifoutongguo=1;
	  $TheObj->save(); // 保存当前数据对象
	  $this->redirect('admin_member_teh');
    }


//--------------教师联系记录-----------	

public function delete_lianxi_jilu()
    {
      $TheObj =M("teach_info");
	  $TheObj->ttedu_id=$_REQUEST['ttedu_id'];
	  $TheObj->ttedu_shengheishifoutongguo=1;
	  $TheObj->save(); // 保存当前数据对象
	  $this->redirect('admin_member_teh');
    }
	
	
	
public function add_info_msg(){
	$ttedu_userid=$_REQUEST['ttedu_id'];
	$ttedu_mid=$_REQUEST['ttedu_mid'];
	//人员信息
	import("@.Action.Public.PublicPerson");
	$person=new PublicPerson();
	$persons= $person->person($ttedu_userid,$ttedu_mid);
	$this->assign("persons", $persons );
	$this->assign("ttedu_userid", $ttedu_userid );
	$this->assign("ttedu_mid", $ttedu_mid ); 
	 
	$this->display();
}

public function insert_info_msg(){
	$ttedu_userid=$_POST['ttedu_userid'];
	$ttedu_mid=$_POST['ttedu_mid'];
	$ttedu_type=$_POST['ttedu_type'];
	$ttedu_content=$_POST['ttedu_content'];
	
	$TheObj =M('lianxi_jilu');
	$TheObj->ttedu_userid=$ttedu_userid;
	$TheObj->ttedu_mid=$ttedu_mid;
	$TheObj->ttedu_type=$ttedu_type;
	$TheObj->ttedu_content=$ttedu_content;
	$TheObj->ttedu_adddate=time();
	$TheObj->add();
	$this->redirect('TeachInfo/admin_info_msg/ttedu_id/'.$ttedu_userid.'/ttedu_mid/'.$ttedu_mid);
}
	
		
public function admin_info_msg(){
	  $ttedu_userid=$_REQUEST['ttedu_id'];
	  $ttedu_mid=$_REQUEST['ttedu_mid'];
	  $map['ttedu_userid']=$ttedu_userid;
	  $map['ttedu_mid']=$ttedu_mid;
	  
	  $btype =new Model('lianxi_jilu');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $btype->where($map)->count();    //计算总数 
	  $p = new Page ($count, 20 );
	  $p->setConfig('header','条信息'); 
	  $p->setConfig('prev',"<"); 
	  $p->setConfig('next','>'); 
	  $p->setConfig('first','<<'); 
	  $p->setConfig('last','>>'); 
	  $page = $p->show ();
	  $this->assign( "page", $page ); 
	  
	  
	  $lianxi_jilu=$btype->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询
	  if($lianxi_jilu){
		foreach($lianxi_jilu as $key => $value){
			$id = $value['ttedu_id']; 
			$list[$id]['ttedu_id']= $value['ttedu_id']; 
			$list[$id]['ttedu_mid']= $value['ttedu_mid'];
			$list[$id]['ttedu_content']= $value['ttedu_content'];
			$list[$id]['ttedu_adddate']= $value['ttedu_adddate'];
			$list[$id]['ttedu_type']= $value['ttedu_type'];
			
			//人员信息
			import("@.Action.Public.PublicPerson");
			$person=new PublicPerson();
			$list[$id]['person']= $person->person($value['ttedu_userid'],$value['ttedu_mid']);
		}
	  }
	  
	  $this->assign( "lianxi_jilu", $list );
	  
	  $this->display();
}	


}
?>