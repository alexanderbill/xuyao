<?php
session_start();
class MemberAction extends Action{
	
		
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
		
		$userid=$_SESSION['userid'];
		$mid=$_SESSION['mid'];
		
		if(empty($userid) or empty($mid)){
			$this->redirect('Index/index');//session为空  跳转到首页登录
		}
		
		$member=$this->member();
		if($mid==1){
			//浏览器显示标题
			$web_title="教师会员中心-".$member['ttedu_username'];
			$this->assign("web_title",$web_title);
		}else if($mid==2){
			//浏览器显示标题
			$web_title="学生会员中心-".$member['ttedu_username'];
			$this->assign("web_title",$web_title);
		}
	}
	
	public function member(){
		
		$userid=$_SESSION['userid'];
		$mid=$_SESSION['mid'];
		if($mid==1){
			$TheObj =new Model('teach_info');
			$map['ttedu_id']=$userid;
			$member=$TheObj->where($map)->find();
			$this->assign("member",$member);
		}else if($mid==2){
			$TheObj =new Model('huiyuan_info');
			$map['ttedu_id']=$userid;
			$member=$TheObj->where($map)->find();
			$this->assign("member",$member);
		}
		
		return $member;
	}
	//
	public function index(){
		$this->member();
		$this->display();
	}
	
	
	//订单详情
	public function edu_infodetail(){
		$this->member();
		
		$TheObj =new Model('yuyue_teach_info');
		$ttedu_id=$_REQUEST['ttedu_id'];
		$map['ttedu_id']=$ttedu_id;
		$yuyue_teach_info=$TheObj->where($map)->find();
		$this->assign("yuyue_teach_info",$yuyue_teach_info);
		
		$TheObj =new Model('teach_info');
		$map2['ttedu_id']=$yuyue_teach_info['ttedu_teach_id'];
		$member=$TheObj->where($map2)->find();
		$this->assign("teacher",$member);
		
		$this->display();
	}
	
	//---------学生会员管理----------------
	//我的家教信息
	public function huiyuan_jjxx(){
		$member=$this->member();
		
		$TheObj=new Model('jiajiao_info');
		$map['ttedu_huiyuan_id']=$member['ttedu_id'];
		$jiajiao_info=$TheObj->where($map)->order('ttedu_id desc')->findAll(); //查询数
		$this->assign("jiajiao_info",$jiajiao_info);
		
		$this->display();
	}
	
	//联系记录
	public function huiyuan_znxx(){
		$member=$this->member();
		
		
		$TheObj=new Model('lianxi_jilu');
		$map['ttedu_userid']=$member['ttedu_id'];
		$map['ttedu_mid']=2;
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
		$lianxi_jilu=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询数
		$this->assign("lianxi_jilu",$lianxi_jilu);
		
		$this->display();
	}
	
	
	//我的预约
	public function huiyuan_wdyy(){
		$member=$this->member();
		
		
		$TheObj=new Model('teach_to_stu');
		$map['ttedu_huiyuan_id']=$member['ttedu_id'];
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
		$this->assign("teach_to_stu",$teach_to_stu);
		
		
		$TheObj=new Model('yuyue_teach_info');
		$map2['ttedu_stuid']=$member['ttedu_id'];
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
		$this->assign("yuyue_teach_info",$yuyue_teach_info);
		
		$this->display();
	}
	
	//评论教师
	public function huiyuan_pinglun(){
		$member=$this->member();
		$ttedu_teachid=$_REQUEST['ttedu_teachid'];
		
		$this->assign("ttedu_teachid",$ttedu_teachid);
		
		$this->display();
	}
	
	//评论教师
	public function pinglun(){
	  $TheObj= D("teach_pingun"); 
	  if(!$TheObj->create()){//自动验证
	  	$err=$TheObj->getError();
		echo "<script>alert('".$err."');history.go(-1);</script>";
	  }else{
	   	$result=$TheObj->add();//写入数据库
		$this->redirect('huiyuan_wdyy');//成功后重定向
	  }
		
	}
	
	
	
	
	
	//---------教师会员管理----------------
	//主页
	public function welcome(){
		$this->member();
		$this->display();
	}
	//星级教员介绍
	public function xjjyjs(){
		$this->display();
	}
	//申请金牌家教
	public function sqjpjj(){
		$this->display();
	}
	//投诉建议
	public function tsjy(){
		$this->member();
		$this->display();
	}
	
	public function add_liuyan(){
		$ttedu_title=$_POST['ttedu_title'];
		$ttedu_content=$_POST['ttedu_content'];
		if(empty($ttedu_title)){
			echo "<script>alert('标题不能为空！');history.go(-1);</script>";
		}else if(empty($ttedu_content)){
			echo "<script>alert('内容不能为空！');history.go(-1);</script>";
		}else{
			$TheObj =D('set_liuyan');
			$TheObj->Create();
			$TheObj->ttedu_lydate=time();
			$TheObj->add();
			echo "<script>alert('留言成功！');</script>";
			$this->redirect(tsjy);
		}
		
	}
	
	
	//站内信息
	public function znxx(){
		$member=$this->member();
		
		//留言回复
		$TheObj=new Model('set_liuyan');
		$map['ttedu_username']=$member['ttedu_username'];
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
		$set_liuyan=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询数
		$this->assign("set_liuyan",$set_liuyan);
		//学员评论
		
		$this->display();
	}
	
	//订单记录
	public function ddjl(){
		$member=$this->member();
		
		
		$TheObj=new Model('teach_to_stu');
		$map['ttedu_teachid']=$member['ttedu_id'];
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
		$this->assign("teach_to_stu",$teach_to_stu);
		
		
		$TheObj=new Model('yuyue_teach_info');
		$map2['ttedu_teach_id']=$member['ttedu_id'];
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
		$this->assign("yuyue_teach_info",$yuyue_teach_info);
		
		$this->display();
	}
	
	//金额充值
	public function jecz(){
		$member=$this->member();
		
		
		
		$TheObj=new Model('set_yinghang_info');
		$set_yinghang_info=$TheObj->findAll();
		$this->assign("set_yinghang_info",$set_yinghang_info);
		
		
		//充值记录
		$TheObj=new Model('chongzhi_detail');
		$map['ttedu_user_id']=$member['ttedu_id'];
		$map['ttedu_states']=1;
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
		$chongzhi_detail=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询数
		$this->assign("chongzhi_detail",$chongzhi_detail);
		
		$this->display();
	}
	
	//充值--跳转支付接口
	public function add_chongzhi(){
		$chongzhi_type=$_POST['chongzhi_type'];
		$bankid=$_POST['bankid'];
		if($chongzhi_type==1){
			echo "<script>window.location.href='/alipay/index.php'</script>";
		}else if($chongzhi_type==2){
			echo "<script>window.location.href='/tenpay/index.php'</script>";
		}else if($chongzhi_type==3){
			if(!empty($bankid)){
				echo "<script>window.open('/chinabank/chinabank.php?bankid=".$bankid."')</script>";
			}else{
				echo "<script>alert('请先选择充值银行！');history.go(-1);</script>";
			}
		}
	}
	
	//身份审核
	public function sfsh(){
		$member=$this->member();
		
		//已审核的教师记录
		$TheObj=new Model('teach_info');
		$map['ttedu_shengheishifoutongguo']=1;
		import("@.ORG.Page"); //导入分页类
		$count = $TheObj->where($map)->count();    //计算总数
		$p = new Page ($count,30);
		$p->setConfig('header','条信息'); 
		$p->setConfig('prev',"<"); 
		$p->setConfig('next','>'); 
		$p->setConfig('first','<<'); 
		$p->setConfig('last','>>'); 
		$page = $p->show ();
		$this->assign( "page", $page );
		$teach_info=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询数
		$this->assign("teach_info",$teach_info);
		
		$this->display();
	}
	
	//身份审核
	public function update_shenfenzheng(){
		$ttedu_shenfenzheng=$_POST['ttedu_shenfenzheng'];
		if(!empty($ttedu_shenfenzheng)){
			$member=$this->member();
			$TheObj=M('teach_info');
			$TheObj->ttedu_id=$member['ttedu_id'];
			$TheObj->ttedu_shenfenzheng=$ttedu_shenfenzheng;
			$TheObj->ttedu_shengyujinge=$_POST['ttedu_shengyujinge']-5;
			$TheObj->save();
			echo "<script>alert('资料提交成功！');</script>";
			$this->redirect(sfsh);
		}else{
			echo "<script>alert('请认真填写身份证号码！');history.go(-1);</script>";
		}
	}
	
	//星级会员
	public function gjhy(){
		$this->member();
		
		//星级教师会员记录
		$TheObj=new Model('teach_info');
		$map['ttedu_shifoushengji']=array('neq', '0');
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
		$teach_info=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询数
		$this->assign("teach_info",$teach_info);
		
		$this->display();
	}
	
	//星级会员--升级
	public function up_gjhy(){
		$queren=$_POST['queren'];
		$ttedu_shifoushengji_time=$_POST['ttedu_shifoushengji_time'];
		if($_POST['yuge']>=$ttedu_shifoushengji_time*10)
		{
		if(!empty($queren)){
			$member=$this->member();
			$TheObj=M('teach_info');
			$TheObj->ttedu_id=$member['ttedu_id'];
			$TheObj->ttedu_shifoushengji=1;
			$TheObj->ttedu_shifoushengji_time=$ttedu_shifoushengji_time;
			$TheObj->ttedu_shengyujinge=$_POST['ttedu_shengyujinge']-$ttedu_shifoushengji_time*10;
			$TheObj->ttedu_huiyuanjieshushijian=time();
			$TheObj->save();
			echo "<script>alert('升级成功！')</script>";
			$this->redirect(gjhy);
		}else{
			echo "<script>alert('请先阅读确认相关内容！');history.go(-1);</script>";
		}
		}
		else 
		{echo "<script>alert('你的剩余金额不足！');history.go(-1);</script>";
		}
		
	}
	
	//联系记录
	public function lxjl(){
		$member=$this->member();
		
		$TheObj=new Model('lianxi_jilu');
		$map['ttedu_userid']=$member['ttedu_id'];
		$map['ttedu_mid']=1;
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
		$lianxi_jilu=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询数
		$this->assign("lianxi_jilu",$lianxi_jilu);
		
		$this->display();
	}
	
	//修改密码
	public function xgmm(){
		$member=$this->member();
		
		$this->display();
	}
	
	//修改密码
	public function update_password(){
		$member=$this->member();
		
		$old_pass=$_POST['old_pass'];
		$new_password=$_POST['new_password'];
		$renew_password=$_POST['renew_password'];
		
		$TheObj=new Model('teach_info');
		$map['ttedu_id']=$member['ttedu_id'];
		$map['ttedu_password']=$old_pass;
		$teach_info=$TheObj->where($map)->find(); //查询数
		
		if(!empty($teach_info)){
			if(empty($new_password)){
				echo "<script>alert('请输入新密码！');history.go(-1);</script>";
			}
			
			if($new_password==$renew_password){
				$TheObj=M('teach_info');
				$TheObj->ttedu_id=$member['ttedu_id'];
				$TheObj->ttedu_password=$new_password;
				$TheObj->save();
				echo "<script>alert('密码修改成功！');</script>";
				$this->redirect(jlxg);
			}else{
				echo "<script>alert('你两次输入的密码不一致！');history.go(-1);</script>";
			}
		}else{
			echo "<script>alert('请正确输入原始密码！');history.go(-1);</script>";
		}
		
	}
	
	
	//修改密码
	public function jlxg(){
		$member=$this->member();
		$this->assign("teach_info",$member);
		$this->display();
	}
	
	//修改教师简历
	public function update_member_teh()
    {
      $TheObj =D("teach_info");
	  if($TheObj->Create()){
	  	  //$TheObj->ttedu_id=$_POST['ttedu_id'];
		  $TheObj->ttedu_shengheixiugai=1;
		  $TheObj->save(); // 保存当前数据对象
		  echo "<script>alert('修改成功，等待审核！');</script>";
		  $this->redirect('jlxg');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }
	
	//个人照片
	public function grzp(){
		$member=$this->member();
		//教师个人照片数量
		$TheObj=new Model('pic_zj');
		$map['ttedu_teachid']=$member['ttedu_id'];
		$map['ttedu_typename']=0;
		$pic_zj = $TheObj->where($map)->findAll();    //查询全部
		$this->assign("pic_zj",$pic_zj);
		$count = $TheObj->where($map)->count();    //计算总数
		$this->assign("count",$count);
		$this->assign("count2",$member['ttedu_yxzhaopiancounts']-$count);
		
		$this->display();
	}
	
	//证件照片
	public function zjzp(){
		$member=$this->member();
		//教师个人照片数量
		$TheObj=new Model('pic_zj');
		$map['ttedu_teachid']=$member['ttedu_id'];
		$map['ttedu_typename']=array('neq', '0');
		$pic_zj = $TheObj->where($map)->findAll();    //查询全部
		$this->assign("pic_zj",$pic_zj);
		$count = $TheObj->where($map)->count();    //计算总数
		$this->assign("count",$count);
		$this->assign("count2",$member['ttedu_yxzhengjiancounts']-$count);
		
		$this->display();
	}
	
	//上传照片
	public function up_photo(){
	  $count2=$_POST['count2'];
	  if(empty($count2)){
	  	echo "<script>alert('你的照片上传数量已经达到上限！');history.go(-1);</script>";
	  }
	  
	  $TheObj =D("pic_zj");
	  if($TheObj->Create()){
	  	  if (!empty($_FILES)) { 
		  	$ttedu_pic = $this->_upload();
			if (!empty($ttedu_pic)){
			  
				$TheObj->ttedu_pic=$ttedu_pic;
				$TheObj->add();
				echo "<script>alert('照片上传成功！');</script>";
				 $this->redirect('jlxg');
			}
			else{
				echo "<script>alert('请先选择图片');history.go(-1);</script>";
			}
		 }
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	}
	
	//删除照片
	public function delete_photo(){
	  $TheObj= new Model("pic_zj"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
      $result=$TheObj->delete($ttedu_id);
      $this->redirect('jlxg');
	}
	
	
	
	
	protected function _upload() { 
        import("@.ORG.UploadFile"); 
        $upload = new UploadFile(); 
        //设置上传文件大小 
        $upload->maxSize = 3292200; 
        //设置上传文件类型 
        $upload->allowExts = explode(',', 'jpg,gif,png,jpeg'); 
        //设置附件上传目录 
        $upload->savePath = 'Public/Uploads/'; 
        //设置需要生成缩略图，仅对图像文件有效 
        $upload->thumb = false;  //是否需要对图片文件进行缩略图处理，默认为false

        // 设置引用图片类库包路径 
        $upload->imageClassPath = '@.ORG.Image'; 
        //设置需要生成缩略图的文件后缀 
      //  $upload->thumbPrefix = 'm_,s_';  //生产2张缩略图 
        //设置缩略图最大宽度 
       // $upload->thumbMaxWidth = '400,100'; //缩略图的最大宽度，多个使用逗号分隔

        //设置缩略图最大高度 
       // $upload->thumbMaxHeight = '400,1000'; //缩略图的最大高度，多个使用逗号分隔

        //设置上传文件规则 
        $upload->saveRule = uniqid; 
        //删除原图 
        $upload->thumbRemoveOrigin = true; 
        if (!$upload->upload()) { 
            //捕获上传异常 
            $this->error($upload->getErrorMsg()); 
        } else { 
            //取得成功上传的文件信息 
            $uploadList = $upload->getUploadFileInfo(); 
            import("@.ORG.Image"); 
            //给m_缩略图添加水印, Image::water('原文件名','水印图片地址') 
             Image::water($uploadList[0]['savepath'].'m_'.$uploadList[0]['savename'], 'Public/Images/logo2.png'); 
            $_POST['image'] = $uploadList[0]['savename']; 
        } 
        
		return $_POST['image']; 
		
    } 	
	
	
	
}
?>