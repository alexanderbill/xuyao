<?php 
class Btype_downModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
   	  array('ttedu_btype_name','require','类型名不能为空！',1), 
      array('ttedu_btype_name','','类型名已存在！',1,'unique',self::MODEL_INSERT),
      ); 
	  
    // 自动填充设置 
    protected $_auto     =     array(  
        array('ttedu_bfbdate','time',self::MODEL_BOTH,'function'), 
        ); 

} 
?> 