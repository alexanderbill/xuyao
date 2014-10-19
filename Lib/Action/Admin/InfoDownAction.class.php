<?php

class InfoDownAction extends Action
{


public function _initialize(){
	header("Content-Type:text/html; charset=UTF-8");
	
	$admin=$_SESSION['admin'];
	if(empty($admin)){
		$this->redirect('Login/login');
	}
}  


public function deletesourse()
    {
      $TheObj= new Model("info_down"); 
	  $ttedu_id=$_REQUEST['ttedu_id'];
      $result=$TheObj->delete($ttedu_id);
      $this->redirect('admin_sourse');
    }
	
	
public function insert()
    {
      $TheObj= D("info_down"); 
      if($TheObj->Create()){
		  if (!empty($_FILES)) { 
		  	$uploads = $this->_upload();
			if (!empty($uploads['image'])){
				$TheObj->ttedu_pic = $uploads['image']; 
				echo "<script>alert('ok1');</scrip>";
			}
			if (!empty($uploads['fujian'])){
				$TheObj->ttedu_fujian = $uploads['fujian']; 
				 echo "<script>alert('ok2');</scrip>";
				
			}
		  }
		  $result=$TheObj->add();//写入数据库
		  $this->redirect('add_sourse');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }

public function add_sourse()
    {
        $TheObj =new Model('btype_down');//实例化模型类
		$btype_down=$TheObj->select();
		$this->assign("btype_down",$btype_down);
		
		$this->display();
    } 
 
public function update()
    {
	  $TheObj= D("info_down"); 
	  
	  if($TheObj->Create()){
		  $TheObj->ttedu_id = $_POST["ttedu_id"];
		  $TheObj->ttedu_title = $_POST["ttedu_title"];
		  $TheObj->ttedu_btype_id = $_POST["ttedu_btype_id"];
		  $TheObj->ttedu_paixu = $_POST["ttedu_paixu"];
		  $TheObj->ttedu_content = $_POST["ttedu_content"];
		  if (!empty($_FILES)) { 
		  	$uploads = $this->_upload();
			if (!empty($uploads['image'])){
				$TheObj->ttedu_pic = $uploads['image']; 
			}
			if (!empty($uploads['fujian'])){
				$TheObj->ttedu_fujian = $uploads['fujian']; 
			}
		  }
		  $TheObj->save(); // 保存当前数据对象
		  $this->redirect('admin_sourse');
	   }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
	  
    }
 
 
public function sourse_detail()
    {
        $ttedu_id=$_REQUEST['ttedu_id'];
		if(!empty($ttedu_id)){
			$TheObj =new Model('btype_down');//实例化模型类
			$btype_down=$TheObj->select();
			$this->assign("btype_down",$btype_down);
			
			$TheObj =new Model('info_down');//实例化模型类
			$info_down=$TheObj->where("ttedu_id=".$ttedu_id)->find(); //查询
			$this->assign("info_down",$info_down);
			$this->display();
		}else{
			echo "<script>alert('参数错误！');history.go(-1);</script>";
		}
    }   
   
public function admin_sourse()
    {
      
	  $TheObj =new Model('btype_down');//实例化模型类
	  $btype_down=$TheObj->findAll();
	  $this->assign('btype_down',$btype_down);//根据模板变量赋值
	  
	  
	  
	  $ttedu_btype_id=$_REQUEST['ttedu_btype_id'];
	  if(!empty($ttedu_btype_id)){
	  	$condition['ttedu_btype_id']=$ttedu_btype_id;
	  }
	  $TheObj =new Model('info_down');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->where($condition)->count();    //计算总数 
	  $p = new Page ($count, 15 );
	  $info_down=$TheObj->where($condition)->limit($p->firstRow.','.$p->listRows)->order('ttedu_paixu asc')->findAll(); //查询
	  
	  $this->assign('info_down',$info_down);//根据模板变量赋值
	  $p->setConfig('header','条信息'); 
      $p->setConfig('prev',"<"); 
      $p->setConfig('next','>'); 
      $p->setConfig('first','<<'); 
      $p->setConfig('last','>>'); 
      $page = $p->show ();
	  $this->assign( "page", $page ); 
		 
	  $this->display();
    }   
   
   
   
   
	
public function admin_sourse_type()
    {
      $TheObj =new Model('btype_down');//实例化模型类
	  import("@.ORG.Page"); //导入分页类
	  $count = $TheObj->count();    //计算总数 
	  $p = new Page ($count, 15 );
	  
	  $btype_down=$TheObj->limit($p->firstRow.','.$p->listRows)->order('ttedu_id ')->findAll(); //查询
	  
	  
	  $this->assign('btype_down',$btype_down);//根据模板变量赋值
	  
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
      
	  $TheObj =D('btype_down');//实例化模型类
	  if($TheObj->Create()){
		  $result=$TheObj->add();//写入数据库
		  $this->redirect('admin_sourse_type');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
    }		



public function updatetype()
    {
      
	  $TheObj =D('btype_down');//实例化模型类
	  if($TheObj->Create()){
		  $result=$TheObj->save();//写入数据库
		  $this->redirect('admin_sourse_type');
	  }else{
	  	  $err=$TheObj->getError();
		  echo "<script>alert('".$err."');history.go(-1);</script>";
	  }
    }

public function deletetype()
    {
      
	  $TheObj =new Model('btype_down');//实例化模型类
	  $TheObj->ttedu_id=$_REQUEST['ttedu_id'];
	  
	  $TheObj->delete();
	  $this->redirect('admin_sourse_type');
    }
	


	
	
	//图片上传
	protected function _upload() { 
        import("@.ORG.UploadFile"); 
        $upload = new UploadFile(); 
        //设置上传文件大小 
        $upload->maxSize = 32922000; 
        //设置上传文件类型 
        $upload->allowExts = explode(',', 'jpg,gif,png,jpeg,rar,doc,xls,txt'); 
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
            $uploads['image'] = $uploadList[0]['savename']; 
			$uploads['fujian'] = $uploadList[1]['savename'];
        } 
        
		return $uploads; 
		
    } 
	
	
	
public function checkEnv()
    {
        load('pointer',THINK_PATH.'/Tpl/Autoindex');//载入探针函数
        $env_table = check_env();//根据当前函数获取当前环境
        echo $env_table;
    }

}
?>