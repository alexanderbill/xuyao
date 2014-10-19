<?php 
class Spbtype_infoModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
   	  array('ttedu_spbtype_name','require','类型名不能为空！',1), 
      array('ttedu_spbtype_name','','类型名已存在！',1,'unique',self::MODEL_BOTH),
      ); 
	  
    // 自动填充设置 
    protected $_auto     =     array(  
        array('ttedu_spbfbdate','time',self::MODEL_BOTH,'function'), 
        ); 

} 
?> 