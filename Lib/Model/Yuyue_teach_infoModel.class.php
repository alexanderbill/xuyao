<?php 
class Yuyue_teach_infoModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
   	  array('ttedu_lianxiren','require','称呼不能为空！',1), 
   	  array('ttedu_mob','require','请填写手机号码！',1), 
   	  array('ttedu_qq','require','请填写QQ号码！',1), 
   	  array('ttedu_weizhi','require','请选择你所在区域！',1), 
   	  array('ttedu_diqumiaoshu','require','请填写你的家庭详细地址！',1), 
   	  array('ttedu_xueke','require','请填写求教学科！',1), 
   	  array('ttedu_shangkeshijian','require','请填写可上课时间！',1), 
   	  array('ttedu_xueyuanmiaoshu','require','请填写学员基本情况！',1), 
   	  array('ttedu_jiaoshiyaoqiu','require','请填写对教师的要求！',1), 
   	  array('ttedu_shoufeiyaoqiu','require','请填写薪资要求！',1), 
      ); 
	  
    // 自动填充设置 
    protected $_auto     =     array(  
        array('ttedu_adddate','time',self::MODEL_INSERT,'function'), 
		array('ttedu_code','time',self::MODEL_INSERT,'function'), 
		array('ttedu_shifouchuli','0',self::MODEL_INSERT), 
        ); 

} 
?> 