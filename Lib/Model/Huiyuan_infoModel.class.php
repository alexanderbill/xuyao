<?php 
class Huiyuan_infoModel extends Model { 
    // 自动验证设置 
   protected $_validate     =     array( 
      array('ttedu_username','require','用户名不能为空！',1,'regex',self::MODEL_INSERT), 
      array('ttedu_username','','该用户名已存在！',1,'unique',self::MODEL_INSERT),
	  array('ttedu_password','require','密码不能为空！',1,'regex',self::MODEL_INSERT), 
	  array('ttedu_password2','ttedu_password','您两次输入的秘密不一致！',1,'confirm'),
	  array('ttedu_shouji','require','请输入手机号码！',0),
	  array('ttedu_email','email','请正确输入邮箱地址！',0),
	  
      ); 
	  
   
    // 自动填充设置 
    protected $_auto     =     array( 
       // array('status','1',self::MODEL_INSERT), 
        array('ttedu_adddate','time',self::MODEL_INSERT,'function'), 
        ); 

} 
?> 