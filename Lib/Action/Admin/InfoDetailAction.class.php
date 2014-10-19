<?php
// 本文档自动生成，仅供测试运行
class InfoDetailAction extends Action
{


public function _initialize(){
	header("Content-Type:text/html; charset=UTF-8");
	
	$admin=$_SESSION['admin'];
	if(empty($admin)){
		$this->redirect('Login/login');
	}
}  

    
public function add_info()
    {
		$TheObj =new Model('btype_info');//实例化模型类
		$btype_info=$TheObj->select();
		$this->assign("btype_info",$btype_info);
		$this->display();
    }
	
public function info_detail()
    {
		$ttedu_id=$_REQUEST['ttedu_id'];
		if(!empty($ttedu_id)){
			$TheObj =new Model('btype_info');//实例化模型类
			$btype_info=$TheObj->select();
			$this->assign("btype_info",$btype_info);
			
			$TheObj =new Model('info_detail');//实例化模型类
			$info_detail=$TheObj->where("ttedu_id=".$ttedu_id)->find(); //查询
			$this->assign("info_detail",$info_detail);
			$this->display();
		}else{
			echo "<script>alert('参数错误！');history.go(-1);</script>";
		}
    }
	
	
public function info_list()
    {
		$TheObj =new Model('btype_info');//实例化模型类
		$btype_info=$TheObj->select();
		$this->assign("btype_info",$btype_info);
		
		
		$btype_id=$_REQUEST['btype_info'];
		$condition['ttedu_btype_id']=$btype_id;
		
		$TheObj =new Model('info_detail');
		import("@.ORG.Page"); //导入分页类
		if(!empty($btype_id)){
			$count = $TheObj->where($condition)->count();    //计算总数 
	    	$p = new Page ($count, 20 );
			$info_detail=$TheObj->where($condition)->limit($p->firstRow.','.$p->listRows)->order('ttedu_paixu asc')->findAll(); //查询
		}else{
			$count = $TheObj->count();    //计算总数
	    	$p = new Page ($count, 20 ); 
			$info_detail=$TheObj->limit($p->firstRow.','.$p->listRows)->order('ttedu_paixu asc')->findAll(); //查询
		}
		
		
		$page = $p->show ();
	    $this->assign( "page", $page ); 
		$this->assign("info_detail",$info_detail);
		
		$this->display();
    }
	
public function info_delete()
    {
	  $TheObj= new Model("info_detail"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
      $result=$TheObj->delete($ttedu_id);
      $this->redirect('info_list');
    }


public function insert()
    {
	  $TheObj= D("info_detail"); 
      $TheObj->Create();//创建数据对象
	  
	  if (!empty($_FILES)) { 
		$ttedu_pic = $this->_upload();
		if (!empty($ttedu_pic)){
			$TheObj->ttedu_pic = $ttedu_pic; 
		}
	  }
	  
      $result=$TheObj->add();//写入数据库
      $this->redirect('add_info');
    }
		
	
public function update()
    {
	  $TheObj= m("info_detail"); 
	  
	  $ttedu_id = $_POST["ttedu_id"];
	  $ttedu_title = $_POST["ttedu_title"];
	  $ttedu_btype_id = $_POST["ttedu_btype_id"];
	  $ttedu_paixu = $_POST["ttedu_paixu"];
	  $ttedu_content = $_POST["ttedu_content"];
	  
	  $TheObj->ttedu_id = $ttedu_id;
	  $TheObj->ttedu_title = $ttedu_title;
	  $TheObj->ttedu_btype_id = $ttedu_btype_id;
	  $TheObj->ttedu_paixu = $ttedu_paixu;
	  $TheObj->ttedu_content = $ttedu_content;
	  
	  
	  if (!empty($_FILES)) { 
		$ttedu_pic = $this->_upload();
		if (!empty($ttedu_pic)){
			$TheObj->ttedu_pic = $ttedu_pic; 
		}
	  }
	  
      $TheObj->save(); // 保存当前数据对象
      $this->redirect('info_list');
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
	
	
	public function checkEnv()
    {
        load('pointer',THINK_PATH.'/Tpl/Autoindex');//载入探针函数
        $env_table = check_env();//根据当前函数获取当前环境
        echo $env_table;
    }

}
?>