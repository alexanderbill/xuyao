<?php 
class Teach_to_stuModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
   		  array('ttedu_beizhu','require','请填写备注信息！',1), 
    ); 
	  
    // 自动填充设置 
    protected $_auto     =     array(  
        array('ttedu_adddate','time',self::MODEL_INSERT,'function'), 
		array('ttedu_shifouchuli','0',self::MODEL_INSERT), 
		array('ttedu_code','time',self::MODEL_INSERT,'function'), 
        ); 

} 
?> 