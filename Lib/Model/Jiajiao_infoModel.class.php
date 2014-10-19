<?php 
class Jiajiao_infoModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
      array('ttedu_chengfu','require','称呼不能为空！',1), 
	  //array('ttedu_zuoji','require','固定电话不能为空！',1), 
	  array('ttedu_shouji','require','移动电话不能为空！',1),
	  //array('ttedu_email','email','请正确输入email！',1),
	  //array('ttedu_shoukediqu','require','请选择你所在区域！',1),
	  array('ttedu_nianjikemu','require','请输入求教学科！',1),
	  array('ttedu_old','require','请输入你的年龄！',
	  //array('ttedu_meizhoucishu','require','每周上课次数不能为空！',1),
	  //array('ttedu_meicishijian','require','每次上课时间不能为空！',1),
	  //array('ttedu_meixiaoshibaochou','require','每小时报酬不能为空！',1),
      ); 
	  
    // 自动填充设置 
    protected $_auto     =     array( 
       // array('status','1',self::MODEL_INSERT), 
        array('ttedu_addtime','time',self::MODEL_INSERT,'function'), 
        ); 

} 
?> 