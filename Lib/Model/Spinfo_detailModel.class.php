<?php 
class Spinfo_detailModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
   	  array('ttedu_sptitle','require','名称不能为空！',1), 
      array('ttedu_sptitle','','名称已存在！',1,'unique',self::MODEL_BOTH),
      ); 
	  
    // 自动填充设置 
    protected $_auto     =     array(  
        //array('ttedu_sgdate','time',self::MODEL_BOTH,'function'), 
        ); 

} 
?> 