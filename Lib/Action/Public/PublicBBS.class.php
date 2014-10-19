<?php

class PublicBBS extends Action
{


//查询板块
public function get_shequ1(){
	$TheObj =new Model('shequ_zhuti');
	$shequ_zhuti=$TheObj->order('ttedu_paixu asc')->findAll();
	
	if($shequ_zhuti){
		foreach($shequ_zhuti as $key => $value){
			$id = $value['ttedu_id']; 
			$list[$id]['ttedu_id']= $value['ttedu_id']; 
			$list[$id]['ttedu_zhuti_topic']= $value['ttedu_zhuti_topic'];
			$list[$id]['ttedu_adddate']= $value['ttedu_adddate'];
			$list[$id]['ttedu_paixu']= $value['ttedu_paixu'];
			
			$list[$id]['shequ_info']= $this->get_shequ2($value['ttedu_id']);
			//帖子数量
			$list[$id]['counts']=$this->counts_info($value['ttedu_id']);
		}
	}
	return $list;
}

//查询帖子
public function get_shequ2($ttedu_zhuti_id){
	$TheObj =new Model('shequ_info');
	if(!empty($ttedu_zhuti_id)){
		$map['ttedu_zhuti_id']=$ttedu_zhuti_id;
	}
	
	
	
	import("@.ORG.Page"); //导入分页类
	$count = $TheObj->where($map)->count();    //计算总数
	$p = new Page ($count,20);
    $p->setConfig('header','篇文章'); 
    $p->setConfig('prev',"<"); 
    $p->setConfig('next','>'); 
    $p->setConfig('first','<<'); 
    $p->setConfig('last','>>'); 
    $page = $p->show ();
    $this->assign( "page2", $page );
	
	
	$shequ_info=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_shifouzhiding desc,ttedu_id desc')->findAll();
	
	$counts=0;
	if($shequ_info){
		foreach($shequ_info as $key => $value){
			$id = $value['ttedu_id']; 
			$list[$id]['ttedu_id']= $value['ttedu_id']; 
			$list[$id]['ttedu_shequ_title']= $value['ttedu_shequ_title'];
			$list[$id]['ttedu_tiezi_content']= $value['ttedu_tiezi_content'];
			$list[$id]['ttedu_fbdate']= $value['ttedu_fbdate'];
			$list[$id]['ttedu_shifouzhiding']= $value['ttedu_shifouzhiding'];
			$list[$id]['ttedu_shifouretie']= $value['ttedu_shifouretie'];
			$list[$id]['ttedu_shifoushenghe']= $value['ttedu_shifoushenghe'];
			$list[$id]['ttedu_userid']= $value['ttedu_userid'];
			$list[$id]['ttedu_mid']= $value['ttedu_mid'];
			$list[$id]['ttedu_zhuti_id']= $value['ttedu_zhuti_id'];
			
			$list[$id]['shequ_reply_info']= $this->get_shequ3($value['ttedu_id']);
			//回复数量
			$list[$id]['counts']=$this->counts_reply($value['ttedu_id']);
			//人员信息
			import("@.Action.Public.PublicPerson");
		    $person=new PublicPerson();
			$list[$id]['person']= $person->person($value['ttedu_userid'],$value['ttedu_mid']);
		}
	}
	
	
	return $list;
}

//查询回复
public function get_shequ3($ttedu_info_id){
	$TheObj =new Model('shequ_reply_info');
	if(!empty($ttedu_info_id)){
		$map['ttedu_info_id']=$ttedu_info_id;
	}
	
	
	import("@.ORG.Page"); //导入分页类
	$count = $TheObj->where($map)->count();    //计算总数
	$p = new Page ($count,20);
    $p->setConfig('header','条回复'); 
    $p->setConfig('prev',"<"); 
    $p->setConfig('next','>'); 
    $p->setConfig('first','<<'); 
    $p->setConfig('last','>>'); 
    $page = $p->show ();
    $this->assign( "page3", $page );
	
	
	$shequ_reply_info=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询
	
	if($shequ_reply_info){
		foreach($shequ_reply_info as $key => $value){
			$id = $value['ttedu_id'];
			$list[$id]['ttedu_id']= $value['ttedu_id'];
			$list[$id]['ttedu_reply_content']= $value['ttedu_reply_content'];
			$list[$id]['ttedu_fbdate']= $value['ttedu_fbdate'];
			$list[$id]['ttedu_userid']= $value['ttedu_userid'];
			$list[$id]['ttedu_mid']= $value['ttedu_mid'];
			$list[$id]['ttedu_info_id']= $value['ttedu_info_id'];
			//人员信息
			import("@.Action.Public.PublicPerson");
		    $person=new PublicPerson();
			$list[$id]['person']= $person->person($value['ttedu_userid'],$value['ttedu_mid']);
		}
	}
	
	
	return $list;
}


//查询帖子数量（$ttedu_info_id 为空时  查询全部）
public function counts_info($ttedu_zhuti_id){
	$TheObj =new Model('shequ_info');
	if(!empty($ttedu_zhuti_id)){
		$map['ttedu_zhuti_id']=$ttedu_zhuti_id;
	}
	$counts=$TheObj->where($map)->count();
	return $counts;
}

//查询回复数量（单个帖子）
public function counts_reply($ttedu_info_id){
	$TheObj =new Model('shequ_reply_info');
	$counts=0;
	if(!empty($ttedu_info_id)){
		$map['ttedu_info_id']=$ttedu_info_id;
		$counts=$TheObj->where($map)->count();
	}
	return $counts;
}





}
?>