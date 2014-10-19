<?php
// 本文档自动生成，仅供测试运行
class InfoDetailAction extends Action
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

    
public function edu_news()
    {
		import("@.Action.Public.PublicInfo");
		$public=new PublicInfo();
		
		//助教公告
		$this->assign("zhujiaogonggao",$public->getInfo('info_detail','ttedu_btype_id',17,4));
		//新闻动态
		$this->assign("xinwendongtai",$public->getInfo('info_detail','ttedu_btype_id',15,4));
		//小学教育
		$this->assign("xiaoxuejiaoyu",$public->getInfo('info_detail','ttedu_btype_id',18,4));
		//初中教育
		$this->assign("chuzhongjiaoyu",$public->getInfo('info_detail','ttedu_btype_id',19,4));
		//高中教育
		$this->assign("gaozhongjiaoyu",$public->getInfo('info_detail','ttedu_btype_id',20,4));
		//中考咨询
		$this->assign("zhongkaozixun",$public->getInfo('info_detail','ttedu_btype_id',21,5));
		//高考咨询
		$this->assign("gaokaozixun",$public->getInfo('info_detail','ttedu_btype_id',22,5));
		//常见问题
		$this->assign("changjianwenti",$public->getInfo('info_detail','ttedu_btype_id',23,5));
		//心灵沟通
		$this->assign("xinlingoutong",$public->getInfo('info_detail','ttedu_btype_id',24,5));
		//好书推荐
		$this->assign("haoshutuijian",$public->getInfo('info_detail','ttedu_btype_id',25,10));
		//家教之路
		$this->assign("jiajiaozhilu",$public->getInfo('info_detail','ttedu_btype_id',26,16));
		
		
		//浏览器显示标题
		$web_title="助教咨询——主页";
		$this->assign("web_title",$web_title);
		$this->display();
    }
	
	
public function infodetail()
    {
		$ttedu_id=$_REQUEST['ttedu_id'];
		if(!empty($ttedu_id)){
			$TheObj =new Model('info_detail');//实例化模型类
			$info_detail=$TheObj->where("ttedu_id=".$ttedu_id)->find(); //查询
			$this->assign("info_detail",$info_detail);
			
			//浏览器显示标题
			$web_title="助教咨询——".$info_detail['ttedu_title'];
			$this->assign("web_title",$web_title);
			
			$ttedu_btype_id=$info_detail['ttedu_btype_id'];
			$TheObj =new Model('btype_info');//实例化模型类
			$btype_info=$TheObj->where("ttedu_id=".$ttedu_btype_id)->find(); //查询
			$this->assign("btype_info",$btype_info);
			
			$TheObj =new Model('info_detail');//实例化模型类
			$info_detail_other=$TheObj->where("ttedu_btype_id=".$ttedu_btype_id)->limit(0,5)->findAll(); //查询
			$this->assign("info_detail_other",$info_detail_other);
			
			$this->display();
		}else{
			echo "<script>alert('参数错误！');history.go(-1);</script>";
		}
    }	

public function infolist(){
	  
	  
	  
	  $TheObj =new Model('btype_info');//实例化模型类
	  $btype_info=$TheObj->findAll(); //查询
	  $this->assign("btype_info",$btype_info);
	  
	  $mfsearch=$_REQUEST['mfsearch'];
	  if($mfsearch=="ok"){
		$list=$_SESSION['list'];
		$this->assign('info_detail',$list);
		$this->display();
		return;
	  }
	  
	  
	  //浏览器显示标题
		$web_title="助教咨询——信息列表";
		$this->assign("web_title",$web_title);
	  
	  $TheObj =new Model('info_detail');//实例化模型类
	  $ttedu_id=$_REQUEST['ttedu_id'];
	  if(!empty($ttedu_id)){
	  	$map['ttedu_btype_id']=$ttedu_id;
	  }
	    import("@.ORG.Page"); //导入分页类
	    $count = $TheObj->where($map)->count();    //计算总数
		$p = new Page ($count,20);
		$p->setConfig('header','条信息'); 
		$p->setConfig('prev',"<"); 
		$p->setConfig('next','>'); 
		$p->setConfig('first','<<'); 
		$p->setConfig('last','>>'); 
		$page = $p->show ();
		$this->assign( "page", $page );
		
	  $info_detail=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_paixu desc')->findAll(); //查询
	  $this->assign('ttedu_id',$ttedu_id);
	  $this->assign('info_detail',$info_detail);
	  $this->display();
}	
	

}
?>