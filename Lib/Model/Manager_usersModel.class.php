<?php 
class Manager_usersModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
   	  array('ttedu_musers','require','账号不能为空！',1), 
      array('ttedu_musers','','账号已存在！',1,'unique',self::MODEL_BOTH),
	  array('ttedu_mpassword','require','密码不能为空！',1), 
      ); 
	  
    // 自动填充设置 
    protected $_auto     =     array(  
        array('ttedu_adddate','time',self::MODEL_BOTH,'function'), 
        ); 

} 
?> 