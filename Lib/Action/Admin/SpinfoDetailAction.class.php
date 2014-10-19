<?php

class SpinfoDetailAction extends Action
{

public function _initialize(){
	header("Content-Type:text/html; charset=UTF-8");
	
	$admin=$_SESSION['admin'];
	if(empty($admin)){
		$this->redirect('Login/login');
	}
}   

public function update_jishu()
    {
      $TheObj= D("shiping_jishu");
	  $ttedu_spinfo_id=$_POST['ttedu_spinfo_id'];
	  
	  if($TheObj->Create()){
	  	  if (!empty($_FILES)) { 
			$ttedu_pic = $this->_upload();
			if (!empty($ttedu_pic)){
				$TheObj->ttedu_pic = $ttedu_pic; 
			}
		  }
		  
		  $TheObj->save();//写入数据库
		  $this->redirect('SpinfoDetail/shipin_detail/ttedu_id/'.$ttedu_spinfo_id);
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }


public function xiugai_jishu()
    {
        $ttedu_id=$_REQUEST['ttedu_id'];
		$TheObj =new Model('shiping_jishu');//实例化模型类
		$shiping_jishu=$TheObj->where("ttedu_id=".$ttedu_id)->find(); //查询
		$this->assign("shiping_jishu",$shiping_jishu);
		
		$ttedu_spinfo_id=$TheObj->ttedu_spinfo_id;
		$TheObj =new Model('spinfo_detail');//实例化模型类
		$spinfo_detail=$TheObj->where("ttedu_id=".$ttedu_spinfo_id)->find(); //查询
		$this->assign("spinfo_detail",$spinfo_detail);
		
		$this->display();
    }

public function insert_jishu()
    {
      $TheObj= D("shiping_jishu");
	  $ttedu_spinfo_id=$_REQUEST['ttedu_spinfo_id'];
	  
	  if($TheObj->Create()){
	  	  if (!empty($_FILES)) { 
			$ttedu_pic = $this->_upload();
			if (!empty($ttedu_pic)){
				$TheObj->ttedu_pic = $ttedu_pic; 
			}
		  }
		  $result=$TheObj->add();//写入数据库
		  $this->redirect('SpinfoDetail/shipin_detail/ttedu_id/'.$ttedu_spinfo_id);
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }


public function add_jishu()
    {
      	$ttedu_id=$_REQUEST['ttedu_spinfo_id'];
		$TheObj =new Model('spinfo_detail');//实例化模型类
		$spinfo_detail=$TheObj->where("ttedu_id=".$ttedu_id)->find(); //查询
		$this->assign("spinfo_detail",$spinfo_detail);
		$this->display();
    }


public function deleteshipin()
    {
       
	  $ttedu_id=$_REQUEST['ttedu_id'];
	  
	  $TheObj= new Model("shiping_jishu"); 
      $result=$TheObj->where('ttedu_spinfo_id='.$ttedu_id)->delete();
	  
	  $TheObj= new Model("spinfo_detail");
      $result=$TheObj->delete($ttedu_id);
      $this->redirect('admin_shipin');
    }


public function update()
    {
	  $TheObj= D("spinfo_detail"); 
	  
	  if($TheObj->Create()){
		  $TheObj->ttedu_id = $_POST["ttedu_id"];
		  $TheObj->ttedu_sptitle = $_POST["ttedu_sptitle"];
		  $TheObj->ttedu_spcontent = $_POST["ttedu_spcontent"];
		  $TheObj->ttedu_sppaixu = $_POST["ttedu_sppaixu"];
		  $TheObj->ttedu_spjishu = $_POST["ttedu_spjishu"];
		  if (!empty($_FILES)) { 
		  	$ttedu_pic = $this->_upload();
			if (!empty($ttedu_pic)){
				$TheObj->ttedu_sppic = $ttedu_pic; 
			}
		  }
		  $TheObj->save(); // 保存当前数据对象
		  $this->redirect('admin_shipin');
	   }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }




public function shipin_detail()
    {
        $ttedu_id=$_REQUEST['ttedu_id'];
		if(!empty($ttedu_id)){
			$TheObj =new Model('spbtype_info');//实例化模型类
			$spbtype_info=$TheObj->select();
			$this->assign("spbtype_info",$spbtype_info);
			
			$TheObj =new Model('spinfo_detail');//实例化模型类
			$spinfo_detail=$TheObj->where("ttedu_id=".$ttedu_id)->find(); //查询
			$this->assign("spinfo_detail",$spinfo_detail);
			
			$ttedu_spinfo_id=$ttedu_id;
			$TheObj =new Model('shiping_jishu');//实例化模型类
			$shiping_jishu=$TheObj->where("ttedu_spinfo_id=".$ttedu_spinfo_id)->findAll(); //查询
			$this->assign("shiping_jishu",$shiping_jishu);
			$this->display();
		}else{
			echo "<script>alert('参数错误！');history.go(-1);</script>";
		}
    }


public function insert()
    {
      $TheObj= D("spinfo_detail"); 
      if($TheObj->Create()){
		  if (!empty($_FILES)) { 
		  	$ttedu_pic = $this->_upload();
			if (!empty($ttedu_pic)){
				$TheObj->ttedu_sppic = $ttedu_pic; 
			}
		  }
		  $result=$TheObj->add();//写入数据库
		  $this->redirect('add_shipin');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }


public function add_shipin()
    {
        $TheObj =new Model('spbtype_info');//实例化模型类
		$spbtype_info=$TheObj->select();
		$this->assign("spbtype_info",$spbtype_info);
		
		$this->display();
    } 



public function admin_shipin()
    {
      
	  $TheObj =new Model('spbtype_info');//实例化模型类
	  $spbtype_info=$TheObj->findAll();
	  $this->assign('spbtype_info',$spbtype_info);//根据模板变量赋值
	  
	  
	  $ttedu_spbtype_id=$_REQUEST['ttedu_spbtype_id'];
	  if(!empty($ttedu_spbtype_id)){
	  	$condition['ttedu_spbtype_id']=$ttedu_spbtype_id;
	  }
	  $TheObj =new Model('spinfo_detail');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->where($condition)->count();    //计算总数 
	  $p = new Page ($count, 15 );
	  $spinfo_detail=$TheObj->where($condition)->limit($p->firstRow.','.$p->listRows)->order('ttedu_sppaixu asc')->findAll(); //查询
	  
	  $this->assign('spinfo_detail',$spinfo_detail);//根据模板变量赋值
	  $p->setConfig('header','条信息'); 
      $p->setConfig('prev',"<"); 
      $p->setConfig('next','>'); 
      $p->setConfig('first','<<'); 
      $p->setConfig('last','>>'); 
      $page = $p->show ();
	  $this->assign( "page", $page ); 
		 
	  $this->display();
    } 






public function admin_shipin_type()
    {
      $TheObj =new Model('spbtype_info');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->count();    //计算总数 
	  $p = new Page ($count, 15 );
	  
	  $spbtype_info=$TheObj->limit($p->firstRow.','.$p->listRows)->order('ttedu_id')->findAll(); //查询
	  
	  
	  $this->assign('spbtype_info',$spbtype_info);//根据模板变量赋值
	  
	  $p->setConfig('header','条信息'); 
      $p->setConfig('prev',"<"); 
      $p->setConfig('next','>'); 
      $p->setConfig('first','<<'); 
      $p->setConfig('last','>>'); 
      $page = $p->show ();
	  $this->assign( "page", $page ); 
		 
	  $this->display();
    }
		


public function addtype()
    {
      
	  $TheObj =D('spbtype_info');//实例化模型类
	  if($TheObj->Create()){
		  $result=$TheObj->add();//写入数据库
		  $this->redirect('admin_shipin_type');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
    }	


public function updatetype()
    {
      
	  $TheObj =D('spbtype_info');//实例化模型类
	  if($TheObj->Create()){
		  $result=$TheObj->save();//写入数据库
		  $this->redirect('admin_shipin_type');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
    }

public function deletetype()
    {
      
	  $TheObj =new Model('spbtype_info');//实例化模型类
	  $TheObj->ttedu_id=$_REQUEST['ttedu_id'];
	  
	  $TheObj->delete();
	  $this->redirect('admin_sourse_type');
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