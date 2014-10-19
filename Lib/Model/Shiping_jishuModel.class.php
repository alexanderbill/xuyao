<?php 
class Shiping_jishuModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
   	  array('ttedu_jishu','require','名称不能为空！',1), 
      //array('ttedu_jishu','','名称已存在！',1,'unique',self::MODEL_BOTH),
	  array('ttedu_bofangdizhi','require','请输入视频播放地址！',1),
	  array('ttedu_spinfo_id','require','视频ID不能为空！',1),
      ); 
	  
    // 自动填充设置 
    protected $_auto     =     array(  
        //array('ttedu_spbfbdate','time',self::MODEL_BOTH,'function'), 
        ); 

} 
?> 