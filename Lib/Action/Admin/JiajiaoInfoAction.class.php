<?php
// 本文档自动生成，仅供测试运行
class JiajiaoInfoAction extends Action
{


public function _initialize(){
	header("Content-Type:text/html; charset=UTF-8");
	
	$admin=$_SESSION['admin'];
	if(empty($admin)){
		$this->redirect('Login/login');
	}
}  
    
	
public function admin_info_edu()
    {
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
	  $ttedu_id = $_REQUEST["ttedu_id"];
      $TheObj = M("jiajiao_info");
	  $TheObj = $TheObj->where("ttedu_id=".$ttedu_id)->find();
	  
	  if($TheObj) {
		  $this->assign("jiajiao_info",$TheObj);
		  $this->display();
	  }else{
	      $this->redirect("admin_info_edu");
	  }
    }
	
public function update_info_edu()
    {
	  $ttedu_id = $_REQUEST["ttedu_id"];
      $TheObj = M("jiajiao_info");
	  $TheObj = $TheObj->where("ttedu_id=".$ttedu_id)->find();
	  
	  if($TheObj) {
		  $this->assign("jiajiao_info",$TheObj);
		  
		  $week_rmb=$TheObj['ttedu_meizhoucishu'] * $TheObj['ttedu_meicishijian'] * $TheObj['ttedu_meixiaoshibaochou'] ;
		  $month_rmb=$week_rmb * 4;
		  $month_rmb20=$week_rmb * 4 * 0.2;
		  $this->assign("week_rmb",$week_rmb);
		  $this->assign("month_rmb",$month_rmb);
		  $this->assign("month_rmb20",$month_rmb20);
		  
		  $this->display();
	  }else{
	      $this->redirect("admin_info_edu");
	  }
    }
	
	
public function update()
    {
	  $TheObj= m("jiajiao_info"); 
	  
	  $ttedu_id = $_POST["ttedu_id"];
	  $ttedu_shifouqiangzhishoufei = $_POST["ttedu_shifouqiangzhishoufei"];
	  $ttedu_jieshaofeiyong = $_POST["ttedu_jieshaofeiyong"];
	  $ttedu_lianxifangshimoshi = $_POST["ttedu_lianxifangshimoshi"];
	  $ttedu_techerid = $_POST["ttedu_techerid"];
	  $TheObj->ttedu_id=$ttedu_id;
	  $TheObj->ttedu_shifouqiangzhishoufei=$ttedu_shifouqiangzhishoufei;
	  $TheObj->ttedu_jieshaofeiyong=$ttedu_jieshaofeiyong;
	  $TheObj->ttedu_lianxifangshimoshi=$ttedu_lianxifangshimoshi;
	  $TheObj->ttedu_techerid=$ttedu_techerid;
	  
	  $TheObj->save(); // 保存当前数据对象
      $this->redirect('admin_info_edu');
    }
	
public function delete()
    {
	  $TheObj= new Model("jiajiao_info"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
      $result=$TheObj->delete($ttedu_id);
      $this->redirect('admin_info_edu');
    }
	
	
	
	
//---------------订单信息管理--------------------	
	
public function delete_yuyue_teach_info()
    {
	  $TheObj= new Model("yuyue_teach_info"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
      $result=$TheObj->delete($ttedu_id);
      $this->redirect('admin_order');
    }	
	
public function delete_teach_to_stu()
    {
	  $TheObj= new Model("teach_to_stu"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
      $result=$TheObj->delete($ttedu_id);
      $this->redirect('admin_order');
    }
	
	
	
public function t_up_shifouchuli()
    {
	  $TheObj= new Model("teach_to_stu"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
	  $ttedu_shifouchuli=$_REQUEST['shifouchuli'];
      $TheObj->ttedu_id=$ttedu_id;
	  $TheObj->ttedu_shifouchuli=$ttedu_shifouchuli;
	  $TheObj->save();
      $this->redirect('admin_order');
    }
	
public function y_up_shifouchuli()
    {
	  $TheObj= new Model("yuyue_teach_info"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
	  $ttedu_shifouchuli=$_REQUEST['shifouchuli'];
      $TheObj->ttedu_id=$ttedu_id;
	  $TheObj->ttedu_shifouchuli=$ttedu_shifouchuli;
	  $TheObj->save();
      $this->redirect('admin_order');
    }


public function yuyue_teach_info()
    {
	  $TheObj= new Model("yuyue_teach_info"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
	  $map['ttedu_id']=$ttedu_id;
	  $TheObj = $TheObj->where($map)->find();
      $this->assign( "jiajiao_info", $TheObj );
	  $this->display();
    }

public function admin_order2(){

	$TheObj=new Model('yuyue_teach_info');
	//$map2['ttedu_stuid']=$member['ttedu_id'];
	import("@.ORG.Page"); //导入分页类
	$count = $TheObj->where($map2)->count();    //计算总数
	$p = new Page ($count,10);
	$p->setConfig('header','条信息'); 
	$p->setConfig('prev',"<"); 
	$p->setConfig('next','>'); 
	$p->setConfig('first','<<'); 
	$p->setConfig('last','>>'); 
	$page = $p->show ();
	$this->assign( "page2", $page );
	$yuyue_teach_info=$TheObj->where($map2)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询数
	if($yuyue_teach_info){
		foreach($yuyue_teach_info as $key => $value){
			$id = $value['ttedu_id']; 
			$list2[$id]['ttedu_id']= $value['ttedu_id']; 
			$list2[$id]['ttedu_code']= $value['ttedu_code'];
			$list2[$id]['ttedu_lianxiren']= $value['ttedu_lianxiren'];
			$list2[$id]['ttedu_teach_id']= $value['ttedu_teach_id'];
			$list2[$id]['ttedu_stuid']= $value['ttedu_stuid'];
			$list2[$id]['ttedu_adddate']= $value['ttedu_adddate'];
			$list2[$id]['ttedu_shifouchuli']= $value['ttedu_shifouchuli'];
			
			//人员信息
			import("@.Action.Public.PublicPerson");
			$person=new PublicPerson();
			$list2[$id]['person1']= $person->person($value['ttedu_teach_id'],1);
			$list2[$id]['person2']= $person->person($value['ttedu_stuid'],2);
		}
	  }
	$this->assign("yuyue_teach_info",$list2);
	$this->display();
}
	
	
public function admin_order()
    {
        $TheObj=new Model('teach_to_stu');
		//$map['ttedu_huiyuan_id']=$member['ttedu_id'];
		import("@.ORG.Page"); //导入分页类
		$count = $TheObj->where($map)->count();    //计算总数
		$p = new Page ($count,10);
		$p->setConfig('header','条信息'); 
		$p->setConfig('prev',"<"); 
		$p->setConfig('next','>'); 
		$p->setConfig('first','<<'); 
		$p->setConfig('last','>>'); 
		$page = $p->show ();
		$this->assign( "page", $page );
		$teach_to_stu=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询数
		if($teach_to_stu){
		foreach($teach_to_stu as $key => $value){
			$id = $value['ttedu_id']; 
			$list[$id]['ttedu_id']= $value['ttedu_id']; 
			$list[$id]['ttedu_teachid']= $value['ttedu_teachid'];
			$list[$id]['ttedu_jiajiaoid']= $value['ttedu_jiajiaoid'];
			$list[$id]['ttedu_code']= $value['ttedu_code'];
			$list[$id]['ttedu_adddate']= $value['ttedu_adddate'];
			$list[$id]['ttedu_shifouchuli']= $value['ttedu_shifouchuli'];
			
			//人员信息
			import("@.Action.Public.PublicPerson");
			$person=new PublicPerson();
			$list[$id]['person']= $person->person($value['ttedu_teachid'],1);
		}
	  }
		$this->assign("teach_to_stu",$list);
		
		
		$this->display();
    }

}
?>