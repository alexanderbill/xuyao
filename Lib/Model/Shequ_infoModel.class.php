<?php 
class Shequ_infoModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
   	  array('ttedu_shequ_title','require','名称不能为空！',1), 
      array('ttedu_shequ_title','','名称已存在！',0,'unique',self::MODEL_INSERT),
   	  array('ttedu_tiezi_content','require','内容不能为空！',1), 
      ); 
	  
    // 自动填充设置 
    protected $_auto     =     array(  
        array('ttedu_fbdate','time',self::MODEL_INSERT,'function'), 
        ); 

} 
?> 