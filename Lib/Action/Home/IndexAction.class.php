<?php
session_start();
class IndexAction extends Action
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
		
		//浏览器显示标题
	    $web_title="---北京站---";
	    $this->assign("web_title",$web_title);
	}
	
	
	public function searchteach(){
		$_SESSION['list']="";
		import("@.Action.Public.PublicInfo");
		$public=new PublicInfo();
		
		$ttedu_biyexuexiao=$_REQUEST['ttedu_biyexuexiao'];
		$ttedu_renjiaoxueke=$_REQUEST['ttedu_renjiaoxueke'];
		$ttedu_jiajiaodiqu=$_REQUEST['ttedu_jiajiaodiqu'];
		if(!empty($ttedu_biyexuexiao)){
			$map['ttedu_biyexuexiao']=array('like', '%'.$ttedu_biyexuexiao.'%');
		}else if(!empty($ttedu_renjiaoxueke)){
			$map['ttedu_renjiaoxueke']=array('like', '%'.$ttedu_renjiaoxueke.'%');
		}else if(!empty($ttedu_jiajiaodiqu)){
			$map['ttedu_jiajiaodiqu']=array('like', '%'.$ttedu_jiajiaodiqu.'%');
		}
		
		$list=$public->getInfoMap('teach_info',$map,20);
		$_SESSION['list']=$list;
		$this->redirect('/TeachInfo/tehlist/mfsearch/ok');//成功后重定向
	}
	
	
	public function mfsearch(){
		$_SESSION['list']="";
		import("@.Action.Public.PublicInfo");
		$public=new PublicInfo();
		
		//$list_name="";
		$list="";
		$redirect_URL="index";
		
		$id=$_POST['id'];
		$subject=$_POST['subject'];
		$teach_place=$_POST['teach_place'];
		$teach_subject=$_POST['teach_subject'];
		$gender=$_POST['gender'];
		$gender2=$_POST['gender2'];
		$school=$_POST['school'];
		$educational_level=$_POST['educational_level'];
		$titles=$_POST['titles'];
		$types=$_POST['types'];
		
		if($types==1 or $types==2 or $types==10){	//	老师
			if(!empty($id)  and $id!='教员编号'){
				$map['ttedu_id']=$id;
			}else{
				if(!empty($subject)){
					$map['ttedu_renjiaoxueke']=array('like', '%'.$subject.'%');
				}
				if(!empty($teach_place)){
					$map['ttedu_jiajiaodiqu']=array('like', '%'.$teach_place.'%');
				}
				if(!empty($gender)){
					$map['ttedu_sex']=array('like', '%'.$gender.'%');
				}
				if(!empty($school)){
					$map['ttedu_biyexuexiao']=array('like', '%'.$school.'%');
				}
				if(!empty($educational_level)){
					$map['ttedu_mqshengfei']=array('like', '%'.$educational_level.'%');
				}else if($types==1){
					$map['ttedu_mqshengfei']=array('like', '%教师%');
				}else if($types==2){
					$map['ttedu_mqshengfei']=array('like', '%学生%');
				}
			}
			
			//$list_name="teach_info";
			$list=$public->getInfoMap('teach_info',$map,20);
			$redirect_URL="/TeachInfo/tehlist";
		}else if($types==3){	//资料下载
			if(!empty($id)  and $id!='资料编号'){
				$map['ttedu_id']=$id;
			}else{
				if(!empty($subject)){
					$map['ttedu_btype_id']=$subject;
				}
				if(!empty($titles)  and $titles!='资料标题'){
					$map['ttedu_title']=array('like', '%'.$titles.'%');
				}
			}
			$list=$public->getInfoMap('info_down',$map,30);
			$redirect_URL="/InfoDown/downloadlist";
		}else if($types==4){	//视频
			if(!empty($id)  and $id!='视频编号'){
				$map['ttedu_id']=$id;
			}else{
				if(!empty($subject)){
					$map['ttedu_spbtype_id']=$subject;
				}
				if(!empty($titles) and $titles!='视频名称'){
					$map['ttedu_sptitle']=array('like', '%'.$titles.'%');
				}
			}
			$list=$public->getInfoMap('spinfo_detail',$map,12);
			$redirect_URL="/SpinfoDetail/videolist";
		}else if($types==5){	//助教咨询
			if(!empty($id)  and $id!='信息编号'){
				$map['ttedu_id']=$id;
			}else{
				if(!empty($subject)){
					$map['ttedu_btype_id']=$subject;
				}
				if(!empty($titles) and $titles!='信息标题'){
					$map['ttedu_title']=array('like', '%'.$titles.'%');
				}
			}
			$list=$public->getInfoMap('info_detail',$map,30);
			$redirect_URL="/InfoDetail/infolist";
		}else if($types==6){	//家教信息
			if(!empty($id)  and $id!='信息编号'){
				$map['ttedu_id']=$id;
			}else{
				if(!empty($teach_subject) and $teach_subject!='请输入求教学科'){
					$map['ttedu_nianjikemu']=array('like', '%'.$teach_subject.'%');
				}
				if(!empty($teach_place)){
					$map['ttedu_shoukediqu']=array('like', '%'.$teach_place.'%');
				}
				if(!empty($gender)){
					$map['ttedu_sex']=array('like', '%'.$gender.'%');
				}
				if(!empty($gender2)){
					$map['ttedu_techersex']=array('like', '%'.$gender2.'%');
				}
			}
			$list=$public->getInfoMap('jiajiao_info',$map,30);
			$redirect_URL="/JiajiaoInfo/edu_info";
		}
		
		//$this->assign($list_name,$list);
		$_SESSION['list']=$list;
		$this->redirect($redirect_URL.'/mfsearch/ok');//成功后重定向
	}
	
	
	
	public function index(){
	     Load('extend');
		import("@.Action.Public.PublicInfo");
		$public=new PublicInfo();
	  
		$SWI=$public->set_web_info();//网站基本信息
		$this->assign("webinfo",$SWI);
		//助教公告
		//$this->assign("zhujiaogonggao",$public->getInfo('info_detail','ttedu_btype_id',17,4));
		//新闻动态
		//$this->assign("xinwendongtai",$public->getInfo('info_detail','ttedu_btype_id',15,4));
		//小学教育
		//$this->assign("xiaoxuejiaoyu",$public->getInfo('info_detail','ttedu_btype_id',18,4));
		//初中教育
		//$this->assign("chuzhongjiaoyu",$public->getInfo('info_detail','ttedu_btype_id',19,4));
		//高中教育
		//$this->assign("gaozhongjiaoyu",$public->getInfo('info_detail','ttedu_btype_id',20,4));
		//中考咨询
		//$this->assign("zhongkaozixun",$public->getInfo('info_detail','ttedu_btype_id',21,5));
		//高考咨询
		//$this->assign("gaokaozixun",$public->getInfo('info_detail','ttedu_btype_id',22,5));
		//常见问题
		$this->assign("changjianwenti",$public->getInfo('info_detail','ttedu_btype_id',23,7));
		//心灵沟通
		$this->assign("xinlingoutong",$public->getInfo('info_detail','ttedu_btype_id',24,7));
		//好书推荐
		$this->assign("haoshutuijian",$public->getInfo('info_detail','ttedu_btype_id',25,11));
		//家教之路
		$this->assign("jiajiaozhilu",$public->getInfo('info_detail','ttedu_btype_id',26,7));
		
		
		//教学视频
		$this->assign("jiaoxueshipin",$public->getInfo('spinfo_detail','','',7));
		//资料下载
		$this->assign("ziliaoxiazai",$public->getInfo('info_down','','',11));
		//家教信息
		$this->assign("jiajiaoxinxi",$public->getInfo('jiajiao_info','','',10));
		
		
		//专业教师
		$map1['ttedu_mqshengfei']=array('like', '%教师%');
		$this->assign("zhuanyejiaoshi",$public->getInfoMap('teach_info',$map1,10));
		
		//大学生教师
		$map2['ttedu_mqshengfei']=array('like', '%学生%');
		$this->assign("daxueshengjiaoshi",$public->getInfoMap('teach_info',$map2,10));
		
		//语文教师
		$map3['ttedu_zuinanshoukemu']=array('like', '%语文%');
		$map3['ttedu_shifoushengji']=array('neq', 0);
		//$map3['ttedu_mqshengfei']=array('like', '%教师%');
		$this->assign("yuwenjiaoshi",$public->getInfoMap('teach_info',$map3,10));
		
		//数学教师
		$map4['ttedu_zuinanshoukemu']=array('like', '%数学%');
		$map4['ttedu_shifoushengji']=array('neq', 0);
		//$map4['ttedu_mqshengfei']=array('like', '%教师%');
		$this->assign("shuxuejiaoshi",$public->getInfoMap('teach_info',$map4,10));
		
		//英语教师
		$map5['ttedu_zuinanshoukemu']=array('like', '%英语%');
		$map5['ttedu_shifoushengji']=array('neq', 0);
		//$map5['ttedu_mqshengfei']=array('like', '%教师%');
		$this->assign("yingyujiaoshi",$public->getInfoMap('teach_info',$map5,10));
		
		$this->display();
	}
}
?>