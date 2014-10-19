<?php 
class Shequ_zhutiModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
   	  array('ttedu_zhuti_topic','require','名称不能为空！',1), 
      array('ttedu_zhuti_topic','','名称已存在！',1,'unique',self::MODEL_BOTH),
      ); 
	  
    // 自动填充设置 
    protected $_auto     =     array(  
        array('ttedu_adddate','time',self::MODEL_BOTH,'function'), 
        ); 

} 
?> 