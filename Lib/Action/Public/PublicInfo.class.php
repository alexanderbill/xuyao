<?php
session_start();
class PublicInfo extends Action
{





//表名   字段名   字段值  条数
public function getInfo($tname,$cname,$cvalue,$counts){
	$TheObj =new Model($tname);//实例化模型类
	if(!empty($cname)){
		$map[$cname]=$cvalue;
	}
	
	if($tname=='teach_info'){
		$order_type='ttedu_shifoushengji desc';
	}else{
		$order_type='ttedu_id desc';
	}
	
	
	if(!empty($counts)){
		import("@.ORG.Page"); //导入分页类
		$countAll = $TheObj->where($map)->count();    //计算总数
		$p = new Page ($countAll,$counts);
		$p->setConfig('header','条信息'); 
		$p->setConfig('prev',"<"); 
		$p->setConfig('next','>'); 
		$p->setConfig('first','<<'); 
		$p->setConfig('last','>>'); 
		$page = $p->show ();
		$this->assign( "page", $page );
		
		$TheObj_return=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order($order_type)->findAll(); //查询数
	}else{
		$TheObj_return=$TheObj->order('ttedu_id desc')->findAll(); //查询数
	}
	return $TheObj_return;
}

//表名   条件  条数
public function getInfoMap($tname,$map,$counts){
	$TheObj =new Model($tname);//实例化模型类
	
	if($tname=='teach_info'){
		$order_type='ttedu_shifoushengji desc';
	}else{
		$order_type='ttedu_id desc';
	}
	
	
	if(!empty($counts)){
		import("@.ORG.Page"); //导入分页类
		$countAll = $TheObj->where($map)->count();    //计算总数
		$p = new Page ($countAll,$counts);
		$p->setConfig('header','条信息'); 
		$p->setConfig('prev',"<"); 
		$p->setConfig('next','>'); 
		$p->setConfig('first','<<'); 
		$p->setConfig('last','>>'); 
		$page = $p->show ();
		$this->assign( "page", $page );
		$TheObj_return=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order($order_type)->findAll(); //查询数
	}else{
		$TheObj_return=$TheObj->where($map)->order('ttedu_id desc')->findAll(); //查询数
	}
	
	return $TheObj_return;
}

public function set_web_info(){
	//网站信息
 

	$TheObj =new Model("set_web_info");//实例化模型类
	$set_web_info=$TheObj->where("ttedu_id=1")->find();
	return $set_web_info;
}


public function right_foot(){
	//--------------侧边--------------
	//助教公告
	$this->assign("r_zhujiaogonggao",$this->getInfo('info_detail','ttedu_btype_id',17,6));
	//常见问题
	$this->assign("r_changjianwenti",$this->getInfo('info_detail','ttedu_btype_id',23,6));
	//好书推荐
	$this->assign("r_haoshutuijian",$this->getInfo('info_detail','ttedu_btype_id',25,6));
	
	//--------------底部--------------
	//友情链接--底部推荐
	$this->assign("set_youqing",$this->getInfo('set_youqing','','',""));
	
	//--------------头部--------------
	//其他站点信息
	$TheObj =new Model("set_other_website_info");//实例化模型类
	$SOWI=$TheObj->order('ttedu_paixu asc')->findAll();
	$this->assign("SOWI",$SOWI);
	//网站信息
	$this->assign("set_web_info",$this->set_web_info());
	//广告
	$TheObj =new Model("ad");//实例化模型类
	$ad=$TheObj->where("ttedu_shifouxianshi=0")->findAll();
	
	
	
	$pics="";
	$links="";
	$texts="";
	if($ad){
		foreach($ad as $key => $value){
			$pics = $pics."Public/Uploads/".$value['ttedu_adpic']."|"; 
			$links = $links.$value['ttedu_adaddress']."|";
			$texts = $texts.$value['ttedu_adtitle']."|";
		}
	}
	
	$this->assign("pics",$pics);
	$this->assign("links",$links);
	$this->assign("texts",$texts);
}




}
?>