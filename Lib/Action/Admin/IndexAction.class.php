<?php
session_start();
// 本文档自动生成，仅供测试运行
class IndexAction extends Action
{

public function _initialize(){
	header("Content-Type:text/html; charset=UTF-8");
	
	$admin=$_SESSION['admin'];
	if(empty($admin)){
		$this->redirect('Login/login');
	}
}  



public function index(){
	$this->display();
}

public function left(){
	$this->assign( "admin", $_SESSION['admin']);
	$this->display();
}
public function menu(){
	$this->assign( "admin", $_SESSION['admin']);
	$this->display();
}


public function other_admin_ly(){
	//留言回复
	$TheObj=new Model('set_liuyan');
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
	$this->display();
}

public function up_ly()
{
  $TheObj =M('set_liuyan');//实例化模型类
  $TheObj->ttedu_id=$_POST['ttedu_id']; 
  $TheObj->ttedu_hfmessage=$_POST['ttedu_hfmessage'];
  $TheObj->ttedu_hfdate=time();
  
  $TheObj->save();
  $this->redirect('other_admin_ly');
}


public function other_admin_ad(){
	//留言回复
	$TheObj=new Model('ad');
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
	$ad=$TheObj->where($map)->limit($p->firstRow.','.$p->listRows)->order('ttedu_id desc')->findAll(); //查询数
	$this->assign("ad",$ad);
	$this->display();
}

public function add_ad()
{
  $this->display();
}

public function detail_ad()
{
  $TheObj =new Model('ad');//实例化模型类
  $ttedu_id=$_REQUEST['ttedu_id'];
  $ad=$TheObj->where('ttedu_id='.$ttedu_id)->find();
  $this->assign("ad",$ad);
  $this->display();
}

public function update_ad()
{
  $TheObj =new Model('ad');//实例化模型类
	$ttedu_adtitle=$_POST['ttedu_adtitle'];
	$ttedu_adaddress=$_POST['ttedu_adaddress'];
	if(empty($ttedu_adtitle)){
		echo "<script>alert('请输入广告名称');history.go(-1);</script>";
	}
	if(empty($ttedu_adaddress)){
		echo "<script>alert('请输入链接地址');history.go(-1);</script>";
	}
	if (!empty($_FILES)) { 
		$ttedu_pic = $this->_upload();
		if (!empty($ttedu_pic)){
			$TheObj->ttedu_adpic = $ttedu_pic; 
		}
	  }
	$TheObj->ttedu_adtitle=$ttedu_adtitle;
  	$TheObj->ttedu_adaddress=$ttedu_adaddress;
  	$TheObj->ttedu_id=$_POST['ttedu_id'];
	$TheObj->ttedu_adwidth=$_POST['ttedu_adwidth'];
  	$TheObj->ttedu_adheight=$_POST['ttedu_adheight'];
  	$TheObj->ttedu_weizhi=$_POST['ttedu_weizhi'];
  	$TheObj->ttedu_shifouxianshi=$_POST['ttedu_shifouxianshi'];
	$TheObj->ttedu_adddate=time();
  
  $TheObj->save();
  $this->redirect('other_admin_ad');
}

public function insert_ad(){
	$TheObj =new Model('ad');//实例化模型类
	$ttedu_adtitle=$_POST['ttedu_adtitle'];
	$ttedu_adaddress=$_POST['ttedu_adaddress'];
	if(empty($ttedu_adtitle)){
		echo "<script>alert('请输入广告名称');history.go(-1);</script>";
	}
	if(empty($ttedu_adaddress)){
		echo "<script>alert('请输入链接地址');history.go(-1);</script>";
	}
	if (!empty($_FILES)) { 
		$ttedu_pic = $this->_upload();
		if (!empty($ttedu_pic)){
			$TheObj->ttedu_adpic = $ttedu_pic; 
		}
	  }
	$TheObj->ttedu_adtitle=$ttedu_adtitle;
  	$TheObj->ttedu_adaddress=$ttedu_adaddress;
  	$TheObj->ttedu_adwidth=$_POST['ttedu_adwidth'];
  	$TheObj->ttedu_adheight=$_POST['ttedu_adheight'];
  	$TheObj->ttedu_weizhi=$_POST['ttedu_weizhi'];
  	$TheObj->ttedu_shifouxianshi=$_POST['ttedu_shifouxianshi'];
	$TheObj->ttedu_adddate=time();
	$TheObj->add();
	$this->redirect('other_admin_ad');
}	


	
public function other_admin_link(){
	$TheObj =new Model('set_youqing');//实例化模型类
	$set_youqing=$TheObj->findAll();
	$this->assign( "set_youqing", $set_youqing ); 
	$this->display();
}

public function update_link()
{
  $TheObj =M('set_youqing');//实例化模型类
  $TheObj->ttedu_id=$_POST['ttedu_id']; 
  $TheObj->ttedu_webname=$_POST['ttedu_webname'];
  $TheObj->ttedu_website=$_POST['ttedu_website'];
  $TheObj->ttedu_weblogo=$_POST['ttedu_weblogo'];
  $TheObj->ttedu_showtype=$_POST['ttedu_showtype'];
  $TheObj->ttedu_neiyesite=$_POST['ttedu_neiyesite'];
  
  $TheObj->save();
  $this->redirect('other_admin_link');
}

public function delete_link(){
	$TheObj =new Model('set_youqing');//实例化模型类
	$ttedu_id=$_REQUEST['ttedu_id'];
	$TheObj->delete($ttedu_id);
	$this->redirect('other_admin_link');
}

public function add_link(){
	$TheObj =new Model('set_youqing');//实例化模型类
	$ttedu_webname=$_POST['ttedu_webname'];
	$ttedu_website=$_POST['ttedu_website'];
	if(empty($ttedu_webname)){
		echo "<script>alert('请输入站点名称');history.go(-1);</script>";
	}
	if(empty($ttedu_website)){
		echo "<script>alert('请输入站点地址');history.go(-1);</script>";
	}
	$TheObj->ttedu_webname=$ttedu_webname;
  	$TheObj->ttedu_website=$ttedu_website;
  	$TheObj->ttedu_weblogo=$_POST['ttedu_weblogo'];
  	$TheObj->ttedu_showtype=$_POST['ttedu_showtype'];
  	$TheObj->ttedu_neiyesite=$_POST['ttedu_neiyesite'];
	$TheObj->add();
	$this->redirect('other_admin_link');
}	


	//图片上传
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