<?php 
class Teach_pingunModel extends Model { 
    // 自动验证设置 
   protected $_validate     =     array( 
	  array('ttedu_content','require','请输入评论内容！',0),
	  
      ); 
	  
   
    // 自动填充设置 
    protected $_auto     =     array( 
       // array('status','1',self::MODEL_INSERT), 
        array('ttedu_adddate','time',self::MODEL_INSERT,'function'), 
        ); 

} 
?> 